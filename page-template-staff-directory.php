<?php
/*
 Template Name: Staff Directory
 *
 * Oh hey there! Hi! What are you doing here? You want to make a page template? Look at you!
 * You web dev you. Go read the instructions. But the short of it is make a duplicate of this file,
 * keep it in the same directory, call it page_yourname.php, and replace the word "Coyote" after the words "Template Name:"
 * above this paragraph, and voila, you'll have a shiny new page template you can apply on the backend.
 * You can then feel free to modify this php however you see fit. You should make a template for every
 * page that you need granular html/php control over.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php
	get_header(); //Don't take this out. It will break things.  If you don't want a header (and who does), just css it to death.
?>

			<div id="content" class="top-wrapper">

					<div id="inner-content" class="cf middle-wrapper gutters">

						<main id="main" class="cf bottom-wrapper" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							
						<?php
							$imgID = get_field('hero_bg_image');
							$imgSize = "full";
							$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
							
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						
						?>
						<section class="hero <?php get_field('hero_custom_class');?>" style="background-image: url( <?php if(is_singular('news')): echo $url; else: echo $imgArr[0]; endif;?> );">
								<div class="container"><!-- .container-fluid for content to be full-width -->
									<div class="row inner">
									
										<div class="col col-12 col-md-6">
											
											<div class="text-wrap">
											
												<?php if($smallheading = get_field('hero_small_heading')):?> 
												<div><span><?php echo $smallheading; ?></span></div>
												<?php endif;?>
												
												<?php if($lgheading = get_field('hero_large_heading')):?> 
												<h1><?php echo $lgheading; ?></h1>
												<?php endif;?>
												
												<?php if($subtext = get_field('hero_sub-text')):?> 
												<p><?php echo $subtext; ?></p>
												<?php endif;?>
																								
											</div>
																
										</div>			
										
										<div class="scroll-links col col-12 col-md-5">
											<div class="inner">
							
												<?php
													$scroll_link_hours = get_field('oh_scroll-to_label');
													$scroll_link_hours = preg_replace('~[^\pL\d]+~u', '-', $scroll_link_hours );
													$scroll_link_hours = strtolower($scroll_link_hours );
													$scroll_link_directory = get_field('dept_scroll-to_label');
													$scroll_link_directory = preg_replace('~[^\pL\d]+~u', '-', $scroll_link_directory);
													$scroll_link_directory = strtolower($scroll_link_directory);
												?>
											
												<a href="#<?php echo $scroll_link_hours;?>" class="row">
						
													<div class="left">
													
														<?php $image_hours = get_field('oh_icon');?>
														<img src="<?php echo esc_url($image_hours['url']); ?>" alt="<?php echo esc_attr($image_hours['alt']); ?>" />
														
													</div>
													
													<div class="right">
														<?php the_field('oh_scroll-to_label');?>
													</div>
												</a>

												<a href="#<?php echo $scroll_link_hours;?>" class="row">
						
													<div class="left">
													
														<?php $image_directory = get_field('dept_scroll-to_icon');?>
														<img src="<?php echo esc_url($image_directory['url']); ?>" alt="<?php echo esc_attr($image_directory['alt']); ?>" />
														
													</div>
													
													<div class="right">
														<?php the_field('dept_scroll-to_label');?>
													</div>
												</a>
												

											</div>
										</div>
									
									</div>
								</div>
						</section>
						
						<section id="<?php echo $scroll_link_hours;?>" class="utility layout-copy style-purple-gradient">
							<div class="container"><!-- .container-fluid for content to be full-width -->
								<div class="row">
									<div class="col col-12">			
										<div class="inner gradient">
						
											<div class="d-flex flex-wrap">
												
													<div class="col-1 text-right">
														<?php 
														$image = get_field('oh_icon');
														if( !empty( $image ) ): ?>
														    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
														<?php endif; ?>
													</div>
													
													<div class="text-wrap col-11 col-md-10 col-lg-10">
														<h2><?php the_field('oh_heading');?></h2>
														<?php the_field('oh_copy');?>
													</div>
																																	
											</div>
										
										</div>
									</div>
						
								</div>
							</div>
						</section>


						<section id="<?php echo $scroll_link_directory;?>" class="staff-directory-index">
							<div class="container"><!-- .container-fluid for content to be full-width -->
								<div class="row">
									
									<div class="col col-12">
														
										<div class="inner">
							
											<div class="d-flex flex-wrap top">
												
												<div class="col-1 text-right">
													<?php 
													$image = get_field('dept_icon');
													if( !empty( $image ) ): ?>
													    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
													<?php endif; ?>
												</div>
													
												<div class="text-wrap col-11 col-md-10">
													
													<div class="row">
														
														<h2 class="col shrink"><?php the_field('dept_heading');?></h2>
														<form id="filter" action="" method="get">
														<input type="text" id="quicksearch" placeholder="Search" />
														<button type="sumbit" class="submit"><img src="<?php echo get_template_directory_uri(); ?>/library/images/magnifier.svg"/></button>
														</form>

														
													</div>
													
												</div>
	
												<div id="nothing-found-wrap" class="col col-11 col-md-10 offset-md-1">
													<h3>No results found...</h3>
												</div>																																
											</div>
											
											
											<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.5/isotope.pkgd.min.js"></script>
											
											<script>
											jQuery( document ).ready(function($) { 
																								
												// quick search regex
												var qsRegex;
												
												var $container = $('.dflex.grid');
												
												var $deptRows = $('.directory-rows.by-dept');
												
												$container.hide();
												
												// init Isotope
												var $grid = $('.grid').isotope({
													itemSelector: '.single-staff-card',
													layoutMode: 'fitRows',
													percentPosition: true,
													fitRows: {
														columnWidth: '.grid-sizer'
													},

													filter: function() {
														var $this = $(this);
														var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
														return searchResult;
													}
												});

												$('form#filter').on ('submit', function( event ) {
													event.preventDefault();
													var $quicksearch = $('#quicksearch');
													qsRegex = new RegExp( $quicksearch.val(), 'gi' );
													$grid.isotope();	
													
													if( !$($quicksearch).val() ) {
														
												    	$deptRows.show(300);
														$container.hide(300);
														var iso = function(){
															$grid.isotope();
														};
														setTimeout(iso, 500);
														
													} else {
												
														$deptRows.hide(300);
														$container.show(300);
														var iso = function(){
															$grid.isotope();
														};
														setTimeout(iso, 500);
												
													}
																										
												});
												
												$grid.on( 'arrangeComplete', function( event, filteredItems ) {
																										
													// display message box if no filtered items
													if ( !$container.data('isotope').filteredItems.length ) {
														
													  	$('#nothing-found-wrap').show(300);
															
													} else {
														
														$('#nothing-found-wrap').hide(300);		
/*
														$deptRows.hide(300);
														$container.show(300);
														$grid.isotope();	
*/																								  														  	
													}
													
												});
												
												// debounce so filtering doesn't happen every millisecond
												function debounce( fn, threshold ) {
													var timeout;
													threshold = threshold || 100;
													return function debounced() {
													clearTimeout( timeout );
													var args = arguments;
													var _this = this;
													function delayed() {
													fn.apply( _this, args );
													}
													timeout = setTimeout( delayed, threshold );
													};
												}	
												
																								
												
												
											});
											</script>
											
											
											
											
											<?php
											$args = array(
												'post_type' => 'staff',
												'posts_per_page' => -1,
												'order' => 'ASC',
												);
											$posts = get_posts($args);
											$count = 0;
											?>
					
											<?php if ($posts): ?>
												<div class="row directory-rows">
																	
													<div class="single-row col-11 col-md-10 offset-md-1 col-lg-10">
																									
														<div class="dflex grid">
																											
														<?php foreach ($posts as $post): ?>
														
															<?php ob_start();?>
							
															<?php get_template_part('loop', 'staff'); ?>
															
															<?php $content = ob_get_contents();?>
															
															<?php echo $content;?>
							
														<?php endforeach; ?>
														
														</div>
																												
													</div>
													
												</div>
					
												<?php wp_reset_postdata(); ?>
											
											<?php endif; ?>
												
												
												<?php if( have_rows('departments') ):?>
													<?php while ( have_rows('departments') ) : the_row();?>	
													
													<?php if( have_rows('single_department') ):?>
														<?php while ( have_rows('single_department') ) : the_row();?>
															
														<div class="dflex directory-rows by-dept">
																	
															<div class="single-row col-11 col-md-10 offset-md-1 col-lg-10">
																														
																<h3><?php the_sub_field('department_name');?></h3>
																												
																<div class="row">
			
																	<?php 
																	$posts = get_sub_field('staff');
																	
																	if( $posts ): ?>
																	    <?php foreach( $posts as $post):?>
																	        <?php setup_postdata($post); ?>
																	        
																	        <?php get_template_part('loop', 'staff'); ?>
			
																	    <?php endforeach; ?>
																	    <?php wp_reset_postdata();?>
																	<?php endif; ?>
															
																</div>
																														
															</div>
															
														</div>	
											
														<?php endwhile;?>
													<?php endif;?>
												
													<?php endwhile;?>
												<?php endif;?>
												
											
										</div>
										
									</div>
						
								</div>
							</div>
						</section>


						</main>

				</div>

			</div>


<?php
	get_footer(); 
