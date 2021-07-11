<section id="<?php echo $scroll_link;?>" class="tiled-highlights">
	<div class="container"><!-- .container-fluid for content to be full-width -->

		<?php if($heading = get_sub_field('heading')):?>
		<div class="row">
			<div class="col col-12">
				<h2 class="back-slash-heading"><?php echo $heading;?></h2>
			</div>
		</div>
		<?php endif;?>
		
		<?php 
		$posts = get_sub_field('highlights');
		if( $posts ): ?>
		    <div class="highlights-wrap row">
		    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		        
				<article id="post-<?php the_ID(); ?>" <?php post_class('cf col'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
					
					<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
					
					<div class="inner" style="background-image: url(<?php echo $backgroundImg[0]; ?> );">
					
						<?php if(get_field('type') == 'post'):?>							
						<a href="<?php echo get_permalink(); ?>">
						<?php endif;?>
							
						<?php if(get_field('type') == 'pdf'):?>
						<a href="<?php the_field('pdf_link'); ?>">
						<?php endif;?>	
						
							<div class="post-date text-right"><span><?php $post_date = get_the_date( 'M j, Y' ); echo $post_date;?></span></div>
							
							
							<div class="title-wrap blurred-bg">
								
								<div class="blur"></div>
																	
								<h3 class="title"><?php the_title();?></h3>
					
							</div>							
							
						</a>

					</div>
				
				</article> <?php // end article ?>
		        
		    <?php endforeach; ?>
		    </div>
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
		
		<?php 
		$link = get_sub_field('see_all_button');
		if( $link ): 
		    $link_url = $link['url'];
		    $link_title = $link['title'];
		    $link_target = $link['target'] ? $link['target'] : '_self';
		    ?>
			<div class="col-12 btn-wrap text-center">
		    	<a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		    </div>
		<?php endif; ?>

	</div>
	
</section>
