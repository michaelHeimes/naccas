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
					    		<a class="btn hover-btn light" href="/highlights">Return</a>
					    	</div>
							
							</div>
						
						</article>
										
					</div>
				</div>

			</main>


	</div>

</div>

<?php get_footer(); ?>
