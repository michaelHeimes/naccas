<?php
/*
Author: Lightning Fruit
URL: https://github.com/jamoody

*/

// LOAD Coyote CORE (if you remove this, the theme will break)
require_once( 'vendor/autoload.php' );
require_once( 'library/coyote.php' );
require_once( 'library/check-plugins.php' );
// For some reason this doesn't autoload...
require_once( 'vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
 * LAUNCH Coyote
 * Cry havoc and let slip the dogs of war.
 *********************/

function coyote_hunt()
{
  
  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri().'/dist/styles/editor.css' );
  
  // let's get language support going, if you need it
  load_theme_textdomain( 'coyotetheme', get_template_directory().'/library/i18n' );
  
  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );
  
  // launching operation cleanup
  add_action( 'init', 'coyote_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'coyote_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'coyote_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'coyote_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'coyote_gallery_style' );
  
  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'coyote_scripts_and_styles', 999 );
  // ie conditional wrapper
  
  // launching this stuff after theme setup
  coyote_theme_support();
  
  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'coyote_register_sidebars' );
  
  // cleaning up random code around images
  add_filter( 'the_content', 'coyote_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'coyote_excerpt_more' );
  
} /* end coyote hunt */

// Release the hounds
add_action( 'after_setup_theme', 'coyote_hunt' );

/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
  $content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'coyote-thumb-600', 600, 150, TRUE );
add_image_size( 'coyote-thumb-300', 300, 100, TRUE );
add_image_size( 'index-thumb', 389, 274, TRUE );
add_image_size( 'event-card', 399, 599, TRUE );
add_image_size( 'quote', 398, 416, TRUE );
add_image_size( 'naccas-now', 394, 345, TRUE );
add_image_size( 'utility-staff-card', 306, 268, TRUE );
add_image_size( 'staff-directory-card', 260, 244, TRUE );
add_image_size( 'utility-img', 528, 485, TRUE );
add_image_size( 'home-hero-small', 301, 253, TRUE );
add_image_size( 'home-hero-large', 1473, 775, TRUE );

add_filter( 'image_size_names_choose', 'coyote_custom_image_sizes' );

function coyote_custom_image_sizes( $sizes )
{
  return array_merge( $sizes, [
    'coyote-thumb-600' => __( '600px by 150px' ),
    'coyote-thumb-300' => __( '300px by 100px' ),
  ] );
}

/************* THEME CUSTOMIZE *********************/

function coyote_theme_customizer( $wp_customize )
{
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections
  
  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');
  
  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'coyote_theme_customizer' );

/************* PREVENT SITE DEVESTATION ************/
// This hides CPT UI and ACF from users whose emails don't end in @lightningfruit.com
// If you're a new dev on the site and wondering where these went, this is where!
// It's for site security (i.e., client-proofing) so we suggest you replace the email
// domain with your own, rather than unhooking the function, but hey, your call

// Helper function to check whether a string contains the key domain
/*
function is_safe_cos_dev($email = '') {
  if ($email) {
    if (is_string($email) && strpos($email, 'lightningfruit.com')) {
      return true;
    }
  } else {
    return false;
  }
}

function devastation_proofing() {
  $userdata = wp_get_current_user();
  if ( $userdata ) {
    if (!is_safe_cos_dev($userdata->user_email)) {
      remove_menu_page( 'edit.php?post_type=acf-field-group' );
      remove_menu_page( 'cptui_main_menu' );
    }
  }
}
add_action( 'admin_menu', 'devastation_proofing', 9999 );
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function coyote_register_sidebars()
{
  register_sidebar( [
                      'id'            => 'sidebar1',
                      'name'          => __( 'Sidebar 1', 'coyotetheme' ),
                      'description'   => __( 'The first (primary) sidebar.', 'coyotetheme' ),
                      'before_widget' => '<div id="%1$s" class="widget %2$s">',
                      'after_widget'  => '</div>',
                      'before_title'  => '<h4 class="widgettitle">',
                      'after_title'   => '</h4>',
                    ] );
  
  /*
  For use as needed:

  register_sidebar(array(
    'id' => 'sidebar2',
    'name' => __( 'Sidebar 2', 'coyotetheme' ),
    'description' => __( 'The second (secondary) sidebar.', 'coyotetheme' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  Copy the sidebar.php file and rename it to your sidebar's name.
  So using the above, it would be: sidebar-sidebar2.php
  */
}

/************* COMMENT LAYOUT *********************/

// Comment Layout
function coyote_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment; ?>
<div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'cf' ); ?>>
  <article class="cf">
    <header class="comment-author vcard">
      <?php
      echo get_avatar( $comment, $size = '32', $default = 'mystery' );
      ?>
      <?php printf( __( '<cite class="fn">%1$s</cite> %2$s', 'coyotetheme' ), get_comment_author_link(), edit_comment_link( __( '(Edit)', 'coyotetheme' ), '  ', '' ) ) ?>
      <time datetime="<?php echo comment_time( 'Y-m-j' ); ?>">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time( __( 'F jS, Y', 'coyotetheme' ) ); ?> </a>
      </time>

    </header>
    <?php if ( $comment->comment_approved == '0' ) : ?>
      <div class="alert alert-info">
        <p><?php _e( 'Your comment is awaiting moderation.', 'coyotetheme' ) ?></p>
      </div>
    <?php endif; ?>
    <section class="comment_content cf">
      <?php comment_text() ?>
    </section>
    <?php comment_reply_link( array_merge( $args, [ 'depth' => $depth, 'max_depth' => $args['max_depth'] ] ) ) ?>
  </article>
  <?php // </div> is added by WordPress automatically ?>
  <?php
  }
  
  /************* CHANGE GFORMS SUBMIT TO BUTTON *********************/
  add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
  function form_submit_button( $button, $form )
  {
    return "<button class='btn hover-btn dark' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
  }
  
  /*************************
   * JQUERY CDN
   *************************/
  if ( ! is_admin() ) {
    add_action( "wp_enqueue_scripts", "my_jquery_enqueue", 11 );
  }
  function my_jquery_enqueue()
  {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js", FALSE, NULL );
    wp_enqueue_script( 'jquery' );
  }
  
  /*************************
   * ACF OPTIONS PAGE
   *************************/
  
  if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( 'Options' );
  }
  
  function my_acf_init()
  {
    
    acf_update_setting( 'google_api_key', 'AIzaSyAC-rDuHp9utkciggMXb3wCD14qdPFmFF8' );
  }
  
  add_action( 'acf/init', 'my_acf_init' );
  
  /*************************
   * Hide Posts from Admin
   *************************/
  function pw_hide_unused_menu_items()
  {
    remove_menu_page( 'edit.php' );
  }
  
  add_action( 'admin_init', 'pw_hide_unused_menu_items' );

  /*************************
   * Redirect Document posts to attachment/link
   *************************/
  
  function coyote_redirect_naccas_docs()
  {
    if ( is_singular( 'documents' ) ):
      switch ( get_field( 'type' ) ) {
        case 'file':
          $dest = get_field( 'pdf' )['url'];
          break;
        case 'link':
          $dest = get_field( 'link' )['url'];
          break;
        default:
          // Redirect back to home if no file/link is provided
          $dest = home_url();
          break;
      }
      wp_safe_redirect( $dest );
      exit;
    endif;
  }
  add_action( 'template_redirect', 'coyote_redirect_naccas_docs' );
  
  // Exlude certain CPT from search
  function coyote_filter_search_results( $query )
  {
    if ( isset( $query->query['alm_id'] ) && $query->query['alm_id'] === 'alm_search_results' ):
      // instead, remove: staff, post, accordion
      if ( is_array( $query->query_vars['post_type'] ) ):
        foreach ( $query->query_vars['post_type'] as $k=>$post_type ) {
          if ( in_array( $post_type, [ 'post', 'staff', 'accordion' ] ) )
            unset( $query->query_vars['post_type'][ $k ] );
        }
      elseif ( $query->query_vars['post_type'] === 'any' ):
        $query->set( 'post_type', [ 'page', 'documents', 'news', 'publications' ] );
      endif;
    endif;
  }
  add_action( 'pre_get_posts', 'coyote_filter_search_results' );
  
  /* DON'T DELETE THIS CLOSING TAG */ ?>
