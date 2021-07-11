<?php
/*
 Template Name: Page Builder
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

<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

			<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				
				<?php get_template_part('partials/page', 'hero');?>
				
				<div class="container">
					<div class="row">

						<article id="post-<?php the_ID(); ?>" <?php post_class('cf col-12'); ?> role="article">
							
							<div class="inner">
		
								<?php if ( have_rows('news_modules') ) : ?>
								<?php while ( have_rows('news_modules') ) : ?> 
									<?php the_row(); ?>
									
									<?php if ( get_row_layout() == 'content_header' ) : ?>
									
										<?php get_template_part('modules/news', 'content_header');?>
										
									<?php elseif ( get_row_layout() == 'full_width_image' ) : ?>
									
										<?php get_template_part('modules/news', 'full_width_image');?>
			
									<?php elseif ( get_row_layout() == 'pdf_embed' ) : ?>
									
										<?php get_template_part('modules/news', 'pdf_embed');?>
										
									<?php elseif ( get_row_layout() == 'staggered_images' ) : ?>
									
										<?php get_template_part('modules/news', 'staggered_images');?>
										
									<?php elseif ( get_row_layout() == 'text_editor' ) : ?>
									
										<?php get_template_part('modules/news', 'text_editor');?>								
			
									<?php elseif ( get_row_layout() == 'quote' ) : ?>
									
										<?php get_template_part('modules/news', 'quote');?>	
																
									<?php endif;?>
										
								<?php endwhile;?>
								<?php endif;?>
								
							<div class="btn-wrap text-center">
					    		<a class="btn hover-btn dark" href="/highlights">Return</a>
					    	</div>
							
							</div>
						
						</article>
										
					</div>
				</div>

			</main>


	</div>

</div>

<?php get_footer();
