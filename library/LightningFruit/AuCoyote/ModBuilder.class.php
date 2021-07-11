<?php

namespace LightningFruit\AuCoyote;

/**
 * Class AcfFlexModule
 *
 * This is a placeholder for how I want to handle processing modules
 * moving forward. -MJ
 *
 * @package LightningFruit\AuCoyote
 */

class AcfFlexModule
{

  public $module_name, $post_type, $post_object;
  protected $ID, $classes = 'aucoyote-module', $title;

  private $template;
  private $acf_row, $module_path, $template_path, $fallback_path = null, $load_path;
  private $fallback_types = [
    // If it can't find a partial, it will look for
    // an unprefixed default before  descending the hierarchy
    'any', 'post', 'page', 'archive', 'home'
  ];

  public function __construct( array $acf_module, string $post_type = 'any', \WP_Post $post_object = null )
  {
    $this->acf_row     = $acf_module;
    $this->module_name = $this->acf_row['acf_fc_layout'];
    $this->module_path = get_stylesheet_directory() . '/modules/';
    $this->post_type   = $post_type ?: 'any';
    $this->post_object = $post_object;

    // Find the module's template
    // TODO: rewrite with get_template_part
    $this->template = ( 'any' == $this->post_type )
      ? $this->module_name . '.php'
      : $this->post_type . '-' . $this->module_name . '.php';
    $this->template_path = $this->module_path . $this->template;

    if ( ! file_exists( $this->template_path ) ):

      // Get path for fallback template
      foreach ( array_filter( $this->fallback_types, function( $val ) {
        if ( $val != $this->post_type ) return $val;
        else return false;
      } ) as $_type ) {
        $prefix = ( 'any' == $_type ) ? '' : $_type . '-';
        $temp_path = $this->module_path . $prefix . $this->module_name . '.php';
        if ( file_exists( $temp_path ) ) {
          $this->fallback_path = $temp_path;
          break;
        }
      }

      if ( ! $this->fallback_path )
        throw new \ErrorException( __( 'Unable to find any partials for: ' . $this->template, 'coyotetheme' ), '001' );
      else $this->load_path = $this->fallback_path;

    else:
      $this->load_path = $this->template_path;
    endif;

    // Setup "global" ACF data (fields present in all modules)
    // TODO: ...write it
    global $post;
    $this->post_object = $post_object ?: $post;

    $this->ID = @$this->acf_row['developer_fields']['id'] ?: md5(time());
    $this->classes .= " $this->module_name " . @$this->acf_row['developer_fields']['class'];
  }

  public function render( \WP_Post $post_object = null )
  {
    // Uses the current post or specified post object to pass data to template
    // TODO: rewrite with get_template_part
    global $post, $_module;

    $_module = $this;
    $temp_post = $post;
    if ( $post_object ) $post = $post_object;
    @include $this->load_path;
    $post = $temp_post;
    return true;
  }

  /**
   * @return string
   */
  public function getID(): string
  {
    return $this->ID;
  }

  /**
   * @return string
   */
  public function getClasses(): string
  {
    return $this->classes;
  }

  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

}