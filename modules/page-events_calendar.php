<?php
$scroll_link = get_sub_field('scroll-to_label');
$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
$scroll_link = strtolower($scroll_link); ?>

<section id="<?php echo $scroll_link; ?>" class="events-calendar">
  <div class="container">
    <div class="row">
      
      <?php
      
      $image = get_sub_field( 'events_icon' );
      $copy  = get_sub_field( 'events_copy' );
      
      $posts = get_posts( [
        'post_type'      => 'events',
        'posts_per_page' => -1,
        'meta_key'       => 'start_datetime',
        'orderby'        => 'meta_value',
        'meta_type'      => 'DATETIME',
        'order'          => 'ASC',
      ] );
      
      $group_posts = [];
      
      if ( $posts ) {
        
        foreach ( $posts as $post ) {
          
          $date = get_field( 'start_datetime', $post->ID, FALSE );
          
          $date = new DateTime( $date );
          
          $year  = $date->format( 'Y' );
          $month = $date->format( 'F' );
          
          $group_posts[ $year ][ $month ][] = $post;
          
        }
        
      }
      //			    echo '<pre><code>';
      //			    print_r($group_posts);
      //			    echo '</code></pre>';
      ?>
        <div class="col col-12">
          <div class="event-month-slider">
            <?php foreach ( $group_posts as $yearKey => $years ) :?>
            
              <?php foreach ( $years as $monthKey => $months ) : ?>

              <div class="single-month row">
                <div class="col col-12">

                  <div class="utility layout-copy style-purple-gradient">
                    <div class="row">
                      <div class="col col-12">
                        <div class="inner gradient">

                          <div class="d-flex flex-wrap">

                            <div class="col-1 d-none d-md-block text-right">
                              <?php
                              $image = get_sub_field( 'icon' );
                              if ( ! empty( $image ) ): ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                              <?php endif; ?>
                            </div>

                            <div class="text-wrap col-11 col-md-10 col-lg-10">
                              <h2><?php echo $monthKey; ?> Events</h2>
                              <p><?php the_sub_field( 'copy' ) ?></p>
                            </div>

                          </div>

                        </div>
                      </div>

                    </div>
                  </div>

                </div>

                <div class="container">
                  <div class="row">

                    <div class="grid-wrap col col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">

                      <div class="row">
                        
                        <?php foreach ( $months as $postKey => $post ) : ?>

                          <article id="post-<?php the_ID(); ?>"<?php post_class( 'col-sm-12 col-md-4 col-lg-4' ); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                            <a href="<?php echo get_permalink(); ?>" class="inner card-inner <?php get_field( 'hero_custom_class' ); ?>">
                              		
                              <?php
                              $imgID = get_field('hero_image');
                              $imgSize = "event-card";
                              $imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
                              
                              $fb_ImgID = get_field('efb_image', 'option');
                              $fb_ImgSize = "event-card";
                              $fb_ImgArr = wp_get_attachment_image_src( $fb_ImgID, $fb_ImgSize ); ?>
                              <div class="bg" style="background-image: url(<?php if ($imgID): echo $imgArr[0]; else: echo $fb_ImgArr[0]; endif;?> );"></div>

                              <div class="date-time-wrap">
                                
                                <?php
                                $startMonth = date( 'F', strtotime( get_field( 'start_datetime' ) ) );
                                $startDay   = date( 'j', strtotime( get_field( 'start_datetime' ) ) ); ?>
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

                          </article>
                        
                        <?php endforeach; ?>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
            
            <?php endforeach; ?>
            
            <?php endforeach; wp_reset_postdata();?>
          </div>
        </div>
      
      <div class="container">
        <div class="row">
          <div class="col col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">

            <nav class="event-cal-nav">
              <div class='btn-wrap prev'>
                <button class='btn hover-btn dark slick-arrow slick-prev'>Last Month</button>
              </div>
              <div class='btn-wrap next'>
                <button class='btn hover-btn dark slick-arrow slick-next'>Next Month</button>
              </div>
            </nav>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>