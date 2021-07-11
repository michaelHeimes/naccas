<?php
	$imgID = get_field('hero_bg_image');
	$imgSize = "full";
	$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );

?>
<section class="hero news-hero <?php get_field('hero_custom_class');?>" style="background-image: url(<?php echo $imgArr[0]; ?> );">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">
		
			<div class="col-12 col-md-5">
				
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
			
			<?php if ( have_rows('page_modules') ) : ?>
			<div class="scroll-links col-12 col-md-5">
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
			<?php endif;?>
		
		</div>
	</div>
</section>