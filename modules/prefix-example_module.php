<?php
/**
 * This is a BAREBONES template for a module.
 * Generally, processing of ACF fields would happen at the top
 * while the template code goes under there.
 *
 * If all modules share ACF fields (like fields for element ID and Classes),
 * those should be processed the same. I want to write a helper class for AuCoyote
 * to standardize the way we handle modular builds--how I did Data Society was a
 * "first draft" of that.
 *
 * PLAN
 * Now: You will have access to the current post or a specified post (if passed to the render method)
 * Soon: You will also have access to the "recurring" ACF fields through a Coyote Module object (a Howl?)
 *
 * You'll still be able to process ACF field info as normal.
 */

/** @var \LightningFruit\AuCoyote\AcfFlexModule $_module */
global $_module;
if ( ! isset( $_module ) )
  throw new \Exception( __( 'No global module instance detected!', 'coyotetheme' ), '002');

// Do more ACF prep stuff here, if needed
?>

<section id="<?php echo esc_attr( $_module->getID() ); ?>" class="<?php echo esc_attr( $_module->getClasses() ) ?>">
  <div class="container"><!-- .container-fluid for content to be full-width -->
    <div class="row">

      <div class="col-12 col-md-10">
        <h1><?php the_sub_field( 'title' ); ?></h1>
        <?php the_sub_field( 'content' ); ?>
      </div>

    </div
  </div>
</section>

<?php unset( $_module ); ?>
