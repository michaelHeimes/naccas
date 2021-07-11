<section class="staggered-images <?php the_sub_field('layout');?>">
	<div><!-- .container-fluid for content to be full-width -->
						
		<?php if( get_sub_field('layout') == 'two' ):?>
		
			<?php if( have_rows('two_images') ):?>
				<?php while ( have_rows('two_images') ) : the_row();?>	
		<div class="row two-img-wrap">
				
			<div class="left col-12 col-md-6">
				
				<?php 
				$image = get_sub_field('two_left_image');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

			</div>
			
			<div class="right col-12 col-md-6">
				
				<?php 
				$image = get_sub_field('two_right_image');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

			</div>
			
		</div>
			
				<?php endwhile;?>
			<?php endif;?>
		
		<?php endif;?>
		
		
		<?php if( get_sub_field('layout') == 'three' ):?>
		
			<?php if( have_rows('three_images') ):?>
				<?php while ( have_rows('three_images') ) : the_row();?>
				
		<div class="row three-img-wrap">
				
			<div class="left col-12 col-md-4">
				
				<?php 
				$image = get_sub_field('three_left_image');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

			</div>

			<div class="middle col-12 col-md-4">
				
				<?php 
				$image = get_sub_field('three_middle_image');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

			</div>
			
			<div class="right col-12 col-md-4">
				
				<?php 
				$image = get_sub_field('three_right_image');
				if( !empty( $image ) ): ?>
				    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

			</div>
				
		</div>
			
				<?php endwhile;?>
			<?php endif;?>
		
		<?php endif;?>			
			
	</div>
</section>