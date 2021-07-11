<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="quote-slider-module" style="background-image: url(<?php echo $imgArr[0]; ?> );">
	<div class="container"><!-- .container-fluid for content to be full-width -->
	
		<?php if($heading = get_sub_field('heading')):?>
		<div class="row">
			<div class="col col-12">
				<h2 class="back-slash-heading"><?php echo $heading;?></h2>
			</div>
		</div>
		<?php endif;?>
	
	<?php if( have_rows('slider') ):?>
		<div class="quote-slider">
		<?php while ( have_rows('slider') ) : the_row();?>	
		
		<?php if( have_rows('single_quote') ):?>
			<?php while ( have_rows('single_quote') ) : the_row();?>
			
			<div class="single-quote">	

				<div class="row d-flex align-items-center">
									
					<div class="left col-12 col-md-3 offset-md-1">
						
						<?php $image = get_sub_field('photo'); 
						$image_size = 'quote';
						$image_url = $image['sizes'][$image_size];
						if($image): //dont output an empty image tag ?>
							<img src="<?php echo $image_url; ?>" width="<?php echo $image['sizes']['quote-width']; ?>" height="<?php echo $image['sizes']['quote-height']; ?>" alt="<?php echo $image['caption']; ?>" />
						<?php endif; ?>
						
					</div>
				
					<div class="right col-12 col-md-7">
						
						<?php if($text = get_sub_field('text')):?> 
						
						<p class="quote-text">
							<span class="quote-mark m-t">“</span>
							<?php echo $text; ?>
							<span class="quote-mark m-b">”</span>	
						</p>
						<?php endif;?>
											
					</div>
				
					<div class="col-0 col-md-1"></div>
				
				</div>
				
			</div>
		
			<?php endwhile;?>
		<?php endif;?>
	
		<?php endwhile;?>
		</div>
	<?php endif;?>
	
	

		
	</div>
</section>
