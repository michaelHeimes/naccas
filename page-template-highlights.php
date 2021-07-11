<?php
/*
 Template Name: Highlights Page
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

				<main id="main" class="cf bottom-wrapper index-wrap" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
					
					<?php get_template_part('partials/index', 'hero');?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<?php
								// the content (as in the stuff you type into the big box on the backend)
								the_content();?>
								
						<div class="alm-wrap">
								
							<?php

								echo do_shortcode('[ajax_load_more post_type="news" taxonomy="news_categories" taxonomy_terms="highlights" taxonomy_operator="IN" container_type="div" scroll="false" button_label="View More"]');

							?>
							
						</div>


					<?php endwhile; else : ?>



					<?php endif; ?>
					
					
					<section class="email-capture">
						<div class="container">
							<div class="row">
								
								<div class="inner col-12">
							
									<div class="content-wrap col-12 text-center">
										
										<div class="inner">
										
											<?php if($heading = get_field('ach_link_heading')):?> 
											<div>
												<h2><?php echo $heading; ?></h2>
											</div>
											<?php endif;?>
											
											<?php if($copy = get_field('ach_link_copy')):?> 
											<div class="copy-wrap"><?php echo $copy; ?></div>
											<?php endif;?>
											
											<?php 
											$link = get_field('ach_link_link');
											if( $link ): 
											    $link_url = $link['url'];
											    $link_title = $link['title'];
											    $link_target = $link['target'] ? $link['target'] : '_self';
											    ?>											
											<div class="btn-wrap col-12 text-center">
										    	<a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										    </div>
											<?php endif; ?>
																					
										</div>
															
									</div>
								
								</div>
							
							</div>
						</div>
					</section>
					
					

				</main>

				<?php

					//Uncomment get_sidebar() fer yer sidebar. Shocking, I know.
				/*
					get_sidebar();
				*/
				?>

		</div>

	</div>


<?php
	get_footer(); 