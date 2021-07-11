<?php
$realLink = get_field( 'outbound_link' ) ?: get_permalink();

if( get_post_type() === 'news' || get_post_type() === 'publications' ):?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
		
		<div class="container">
			<div class="d-flex inner">
				
				<div class="left p-2 flex-grow-1 bd-highlight">
					
					<div class="row">
						
					    <div class="img-wrap col col-sm-12 col-md-auto">
							<a href="<?php echo $realLink; ?>">
								<?php echo get_the_post_thumbnail($post->ID, 'index-thumb');?>
							</a>
						</div>
						
						<div class="text-wrap col">
							<h2 class="title"><a href="<?php echo $realLink; ?>"><?php the_title();?></a></h2>
							
							<?php if($excerpt = get_field('excerpt')):?>
								<p><?php echo $excerpt;?></p>
							<?php endif;?>
						</div>
					
					</div>
					
				</div>
				
				<div class="right">
					<div class="post-date"><span><?php $post_date = get_the_date( 'M j, Y' ); echo $post_date;?></span></div>
				</div>
		
			</div>
		</div>
	
	
	</article> <?php // end article ?>

<?php endif;?>

<?php if( get_post_type() === 'events' ):?>

	<?php get_template_part('loop', 'events');?>

<?php endif;?>

<?php if( get_post_type() === 'staff' ):?>

	<?php get_template_part('loop', 'staff');?>

<?php endif;?>