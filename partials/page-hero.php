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
					
						<?php if(is_singular('news')):?>
						
							<h1><?php the_title();?></h1>
							
						<?php else:?>
						
							<?php if($smallheading = get_field('hero_small_heading')):?> 
							<div><span><?php echo $smallheading; ?></span></div>
							<?php endif;?>
							
							<?php if($lgheading = get_field('hero_large_heading')):?> 
							<h1><?php echo $lgheading; ?></h1>
							<?php endif;?>
							
							<?php if($subtext = get_field('hero_sub-text')):?> 
							<p><?php echo $subtext; ?></p>
							<?php endif;?>
							
						<?php endif;?>
					
					</div>
										
				</div>			
				
				<?php if ( have_rows('page_modules') ) : ?>
				<div class="scroll-links col col-12 col-md-5">
					<div class="inner">
					<?php while ( have_rows('page_modules') ) : ?> 
						<?php the_row(); ?>
						
						<?php if ( get_row_layout()) : ?>
	
							<?php
								$scroll_link = get_sub_field('scroll-to_label');
								$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
								$scroll_link = strtolower($scroll_link);
							?>
													
							<a href="#<?php echo $scroll_link;?>" class="row">
	
	
								<div class="left">
									<?php 
									
									if($imageWhite = get_sub_field('white_icon')):?>
									
									<img src="<?php echo esc_url($imageWhite['url']); ?>" alt="<?php echo esc_attr($imageWhite['alt']); ?>" />
									
									<?php else:?>
									
									<?php $image = get_sub_field('icon');?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
								</div>
								
								<div class="right">
									<?php the_sub_field('scroll-to_label');?>
								</div>
							</a>
							
							
						<?php endif;?>
						
					<?php endwhile;?>
					</div>
				</div>
				<?php endif;?>
			
			</div>
		</div>
</section>