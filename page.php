<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							
							<?php if (is_front_page()):?>
							
								<?php get_template_part('partials/home', 'hero');?>
								
								<?php else:?>
								
								<?php get_template_part('partials/page', 'hero');?>
								
							<?php endif;?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
															
								<?php get_template_part('page', 'modules');?>
								
							</article>


						</main>

				</div>

			</div>

<?php get_footer(); ?>
