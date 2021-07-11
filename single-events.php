<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

				<?php get_template_part('partials/event', 'hero');?>
				
				<div class="share-wrap">
					<div class="container">
						
						<div class="row">							
							<div class="detail-card col col-12 col-md-6">
						
								<ul class="social-share">		
									<li>Share:</li>
									<li>
										<a class="twitter customer share"
										href="//twitter.com/share?url=<?php the_permalink() ?>"
										title="Twitter share" target="_blank">
										<i class="fab fa-twitter"></i></a>
									</li>
									
									<li>
										<a class="facebook customer share"
										href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"
										title="Facebook share" target="_blank">
										<i class="fab fa-facebook-f"></i></a>
									</li>
									
									<li>
										<a class="linkedin customer share"
										href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"
										title="linkedin Share" target="_blank">
										<i class="fab fa-linkedin-in"></i></a>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
					
				</div>

				<div id="event-details">
					
					<div class="container">
						<div class="row heading-wrap">
							
							<div class="col-1 text-right">
								<img src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-right.svg"/>
							</div>
							
							<div class="text-wrap col-11 col-md-10 col-lg-10">
								<h2>Event Details</h2>
							</div>
							
						</div>
					</div>

					<div class="container">
						<div class="row">							
							<div class="detail-card col col-12 col-md-6">

								<div class="inner">
										<div class="row">
									
											<div class="col-2 text-right">
												<img src="<?php echo get_template_directory_uri(); ?>/library/images/location.svg"/>
											</div>
											
											<div class="text-wrap col-10 col-md-10 col-lg-10">
												<h2>Event Location</h2>
												
												<div class="location"><span><?php the_field('event_location');?></span></div>
												
												<div class="address"><span><?php the_field('event_address');?></span></div>
																					
											</div>
									
										</div>
								</div>
								
							</div>

							<div class="detail-card right col col-12 col-md-6">
								<div class="row">
									<div class="col col-12">
										<div class="inner">
											<div class="row">
												<div class="col-2 text-right">
													<img src="<?php echo get_template_directory_uri(); ?>/library/images/dark-calendar.svg"/>
												</div>
												
												<div class="text-wrap col-10 col-md-10 col-lg-10">
													<h2>Date & Time</h2>
													
													<div class="location"><span><?php the_field('days_and_year');?></span></div>
													
													<div class="address"><span><?php the_field('times');?></span></div>
													
													<?php 
													$link = get_field('event_link');
													if( $link ): 
													    $link_url = $link['url'];
													    $link_title = $link['title'];
													    $link_target = $link['target'] ? $link['target'] : '_self';
													    ?>
									
														<div class="col-12 btn-wrap text-center">
													    	<a class="btn hover-btn light" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
													    </div>
													<?php endif; ?>	
																							
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							
              <?php
              $location = get_post_meta( get_the_ID(), 'map', true );
              if ( ! empty ( $location )  ): ?>
							<div class="map-wrap col col-12">
								<div class="map" style="width: 100%; height: 640px;
                  background-image: url(<?php echo 'https://maps.googleapis.com/maps/api/staticmap?center='
                  . urlencode( $location['lat'] . ',' . $location['lng'] )
                  . '&zoom=13&size=1640x464&style=element:geometry%7Ccolor:0xf5f5f5&style=element:labels.icon%7Cvisibility:off&style=element:labels.text.fill%7Ccolor:0x616161&style=element:labels.text.stroke%7Ccolor:0xf5f5f5&style=feature:administrative.land_parcel%7Celement:labels.text.fill%7Ccolor:0xbdbdbd&style=feature:poi%7Celement:geometry%7Ccolor:0xeeeeee&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:poi.park%7Celement:geometry%7Ccolor:0xe5e5e5&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:road%7Celement:geometry%7Ccolor:0xffffff&style=feature:road.arterial%7Celement:labels.text.fill%7Ccolor:0x757575&style=feature:road.highway%7Celement:geometry%7Ccolor:0xdadada&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0x616161&style=feature:road.local%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&style=feature:transit.line%7Celement:geometry%7Ccolor:0xe5e5e5&style=feature:transit.station%7Celement:geometry%7Ccolor:0xeeeeee&style=feature:water%7Celement:geometry%7Ccolor:0xc9c9c9&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x9e9e9e&markers=color:0xB39F6C%7C' .  urlencode( $location['lat'] . ',' . $location['lng'] ) . '&key=AIzaSyAC-rDuHp9utkciggMXb3wCD14qdPFmFF8';
                  ?>);"></div>
							</div>
              <?php endif; ?>
														
							
							<div id="extra-info" class="col col-12">
								<div class="container">
									<div class="row inner">
										
										<div class="col-1 text-right">
											<img src="<?php echo get_template_directory_uri(); ?>/library/images/bullhorn.svg"/>
										</div>
										
										<div class="text-wrap col-11 col-md-10 col-lg-10">
											<h2>Extra Information</h2>
											<?php the_field('description');?>
										</div>

										
									</div>										
								</div>
							</div>
							
							
							<section id="upcoming-events" class="upcoming-events col col-12">
								<div class="container"><!-- .container-fluid for content to be full-width -->
									<div class="row">
										
										<div class="col col-12">
											<h2 class="back-slash-heading">Upcoming Events</h2>
										</div>
									
										<?php
										$args = array(
											'post_type' 	 => 'events',
											'posts_per_page' => 4,
										    'order'          => 'ASC',
										    'orderby'        => 'meta_value',
										    'meta_key'       => 'start_datetime',
										    'meta_type'      => 'DATETIME',
											);
										$posts = get_posts($args);
										$count = 0;
										?>
							
										<?php if ($posts): ?>
							
							
											<?php foreach ($posts as $post): ?>
											
												<?php get_template_part('loop', 'events'); ?>
												
											<?php endforeach; ?>
							
											<?php wp_reset_postdata(); ?>
							
							
										<?php endif; ?>
									
							
									
									</div>
								</div>
							</section>
							
							<div class="back-wrap text-center col col-12">
								
								<a href="/events-resources/">Back to Events</a>
								
							</div>
							
				
						</div>
					</div>
					
				</div>
					

			</main>

	</div>

</div>

<?php get_footer(); ?>
