<?php
/*
 Template Name: NACCAS Now Page
*/

get_header(); ?>

  <div id="content" class="top-wrapper">
    <div id="inner-content" class="cf middle-wrapper gutters">
      <main id="main" class="cf bottom-wrapper index-wrap" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
        
        <?php get_template_part( 'partials/index', 'hero' ); ?>
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>

          <div class="alm-wrap">
            <?php
            if ( function_exists( 'alm_render' ) ):
              alm_render( [
                'post_type'      => 'publications',
                'container_type' => 'div',
                'scroll'         => 'false',
                'button_label'   => __( 'View More', 'coyotetheme' ),
              ] );
            endif; ?>
          </div>
        
        <?php endwhile; else : ?>
        <?php endif; ?>

      </main>
    </div>
  </div>

<?php
get_footer();