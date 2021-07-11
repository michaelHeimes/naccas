<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="naccas-now text-center">
	<div class="container"><!-- .container-fluid for content to be full-width -->

		<?php if($heading = get_sub_field('heading')):?>
		<div class="row">
			<div class="col col-12 text-left">
				<h2 class="back-slash-heading"><?php echo $heading;?></h2>
			</div>
		</div>
		<?php endif;?>
		
		
		<?php 

		$posts = get_sub_field('publications');
		
		if( $posts ): ?>
		    <div class="publications-wrap row">
		    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		        
				<article id="post-<?php the_ID(); ?>" <?php post_class('cf col col-12 col-md-6 col-lg-3'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
					
					<?php 
					$image = get_field('image');
					if( !empty( $image ) ): ?>
					    <div class="img-wrap">
							<a href="<?php if(get_field('type') == 'file'):?><?php the_field('pdf');?><?php endif;?><?php if(get_field('type') == 'link'):?><?php the_field('outbound_link');?><?php endif;?>" target="_blank">
								
								<?php echo get_the_post_thumbnail($post->ID, 'naccas-now');?>

							</a>
						</div>
					<?php endif; ?>

				
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
