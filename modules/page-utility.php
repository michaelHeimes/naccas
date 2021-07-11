<?php
$scroll_link = get_sub_field( 'scroll-to_label' );
$scroll_link = preg_replace( '~[^\pL\d]+~u', '-', $scroll_link );
$scroll_link = strtolower( $scroll_link );
?>

<?php if ( get_sub_field( 'layout' ) != 'event-slider' ): ?>

  <section id="<?php echo $scroll_link; ?>" class="utility layout-<?php the_sub_field( 'layout' ); ?> style-<?php the_sub_field( 'style' ); ?>">
    <div class="container"><!-- .container-fluid for content to be full-width -->
      <div class="row">
        <div class="col col-12">
          <div class="inner gradient">
            <div class="d-flex flex-wrap align-items-stretch">
              
              <?php if ( get_sub_field( 'layout' ) == 'copy' ): ?>
                <div class="col-1 d-none d-md-block text-right">
                  <?php
                  $image = get_sub_field( 'icon' );
                  if ( ! empty( $image ) ): ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                  <?php endif; ?>
                </div>

                <div class="text-wrap col-12 col-md-10 col-lg-10">
                  <h2 class="utility-title"><?php the_sub_field( 'heading' ); ?></h2>
                  <?php the_sub_field( 'copy' ); ?>
                </div>
                <?php
                $link = get_sub_field( 'optional_link_button' );
                if ( $link ):
                  $link_url = $link['url'];
                  $link_title  = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>

                  <div class="col-12 btn-wrap text-center">
                    <a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  </div>
                
                <?php endif; ?>
              
              <?php endif; ?>
              
              <?php if ( get_sub_field( 'layout' ) == 'image-left' || get_sub_field( 'layout' ) == 'image-right' ): ?>
                <?php $image = get_sub_field( 'image' );
                $image_size  = 'utility-img';
                $image_url   = $image['sizes'][ $image_size ];
                if ( $image ): //dont output an empty image tag
                  ?>

                  <div class="img-wrap col-12 col-md-6 col-lg-5">
                    <div class="inner" style="background-image: url(<?php echo $image_url; ?>);"></div>
                  </div>
                <?php endif; ?>

                <div class="text-wrap col-12 col-md-6 col-lg-7">

                  <div class="icon-heading-wrap">

                    <div class="d-none d-md-block">
                      <?php
                      $image = get_sub_field( 'icon' );
                      if ( ! empty( $image ) ): ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                      <?php endif; ?>
                    </div>


                    <h2><?php the_sub_field( 'heading' ); ?></h2>

                  </div>
                  
                  <?php the_sub_field( 'copy' ); ?>
                  
                  <?php
                  $link          = get_sub_field( 'optional_link_button' );
                  if ( $link ):
                    $link_url = $link['url'];
                    $link_title  = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                    <div class="col-12 btn-wrap text-center">
                      <a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                  
                  <?php endif; ?>

                </div>
              
              <?php endif; ?>
              
              <?php if ( get_sub_field( 'layout' ) == 'team-grid' ): ?>
                <div class="col-1 d-none d-md-block">
                  
                  <?php
                  $image = get_sub_field( 'icon' );
                  if ( ! empty( $image ) ): ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                  <?php endif; ?>

                </div>

                <div class="text-wrap col-12 col-md-10 col-lg-9">
                  <h2 class="utility-title"><?php the_sub_field( 'heading' ); ?></h2>
                  <?php the_sub_field( 'copy' ); ?>
                </div>

                <div class="bottom col-12 col-md-11 offset-md-1">
                  <div class="row">
                    
                    <?php
                    
                    $posts = get_sub_field( 'team_cards' );
                    
                    if ( $posts ): ?>
                      <?php
                      foreach ( $posts as $post ):
                        setup_postdata( $post );
                        $modalId = 'card-' . md5( get_the_title() ); ?>

                        <div class="staff-card col col-12 col-md-6 col-lg-3">
                          <div class="staff-card-wrap">
                            <?php
                            $image_id = get_field( 'photo' );
                            if ( $image ): //dont output an empty image tag
                              echo wp_get_attachment_image( $image_id, 'utility-staff-card' );
                            endif; ?>

                            <div class="name-wrap">
                              <span><?php the_title(); ?></span>
                            </div>
                            <a href="#" class="staff-modal-toggle" data-toggle="modal" data-target="#<?php echo $modalId; ?>"></a>
                          </div>
                        </div>

                        <div class="modal fade staff-modal" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modalId; ?>-label" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content rounded-0">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="container-fluid">
                                  <div class="row justify-content-center align-items-center">
                                    <div class="col-12 d-md-none d-lg-block col-lg-3 order-md-last text-center">
                                      <?php
                                      if ( $image ): //dont output an empty image tag
                                        echo wp_get_attachment_image( $image_id, 'utility-staff-card', false,
                                          [ 'class' => 'img-fluid w-100 mb-4' ] );
                                      endif; ?>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-9 order-md-first">
                                      <h2 id="<?php echo $modalId; ?>-label" class="modal-title"><?php the_title(); ?></h2>
                                      <?php the_field( 'bio' ); ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                      <?php endforeach; ?>
                      <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                  </div>
                </div>
                
                <?php
                $link = get_sub_field( 'optional_link_button' );
                if ( $link ):
                  $link_url = $link['url'];
                  $link_title  = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>

                  <div class="col-12 btn-wrap text-center">
                    <a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  </div>
                
                <?php endif; ?>
              
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php if ( get_sub_field( 'layout' ) == 'event-slider' ): ?>
  <section id="<?php echo $scroll_link; ?>" class="utility layout-<?php the_sub_field( 'layout' ); ?> style-<?php the_sub_field( 'style' ); ?>">
    <div class="container"><!-- .container-fluid for content to be full-width -->
      <div class="row">
        <div class="col col-12">
          <div class="inner">
            <div class="d-flex flex-wrap">
              <div class="col-12 col-md-2 col-lg-1 text-right d-none d-md-block">
                <?php
                $image = get_sub_field( 'icon' );
                if ( ! empty( $image ) ): ?>
                  <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php endif; ?>
              </div>

              <div class="text-wrap col-11 col-md-10 col-lg-10">
                <h2 class="utility-title"><?php the_sub_field( 'heading' ); ?></h2>
                <?php the_sub_field( 'copy' ); ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="utility-event-slider-wrap col col-11 col-md-10 offset-md-1 col-lg-auto">
      
      <?php
      
      $es_tax_ID = get_sub_field( 'event_category' );
      
      $args  = [
        'post_type'      => 'events',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'meta_value',
        'meta_key'       => 'start_datetime',
        'tax_query'      => [
          [
            'taxonomy' => 'event_category',
            'terms'    => $es_tax_ID,
          ],
        ],
      ];
      $posts = get_posts( $args );
      $count = 0;
      ?>
      
      <?php if ( $posts ): ?>

        <div class="utility-event-slider">
          
          <?php foreach ( $posts as $post ): ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

              <a href="<?php echo get_permalink(); ?>" class="inner card-inner <?php get_field( 'hero_custom_class' ); ?>">
                
                <?php
                $imgID   = get_field( 'image' );
                $imgSize = "event-card";
                $imgArr  = wp_get_attachment_image_src( $imgID, $imgSize );
                ?>
                <div class="bg" style="background-image: url(<?php echo $imgArr[0]; ?> );"></div>

                <div class="date-time-wrap">
                  
                  <?php $startMonth = date( 'F', strtotime( get_field( 'start_datetime' ) ) );
                  $startDay         = date( 'j', strtotime( get_field( 'start_datetime' ) ) ); ?>
                  <span class="month"><?php echo $startMonth; ?></span>
                  <span class="day"><?php echo $startDay; ?></span>
                  
                  
                  <?php $startTime = date( 'g:ia', strtotime( get_field( 'start_datetime' ) ) ); ?>
                  <span class="time"><?php echo $startTime; ?></span>


                </div>

                <div class="title-wrap blurred-bg">

                  <div class="blur"></div>

                  <h2 class="title"><?php the_field( 'title' ); ?></h2>

                </div>

              </a>

            </article> <?php // end article ?>
          
          <?php endforeach; ?>
          
          <?php wp_reset_postdata(); ?>

        </div>
      
      <?php endif; ?>

    </div>

    <div class="container">
      <div class="row">
        <div class="button-wrap col col-11 col-md-11 offset-md-1">
          <button class='prev'><img src='/wp-content/themes/naccas-theme/library/images/utility-slider-prev.svg' />
          </button>
          <button class='next'><img src='/wp-content/themes/naccas-theme/library/images/utility-slider-next.svg' />
          </button>
        </div>
      </div>
    </div>


  </section>
<?php endif; ?>




























