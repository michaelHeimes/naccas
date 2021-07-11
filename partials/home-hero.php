<div class="container-fluid">
	<div class="row hero-slider">

		<?php 
		$images = get_field('small_images_slider_images');
		if( $images ): ?>
		    <div class="home-small-images col-3">
		        <?php foreach( $images as $image ): ?>
		            <div>
		                <img src="<?php echo esc_url($image['sizes']['home-hero-small']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		            </div>
		        <?php endforeach; ?>
		    </div>
		<?php endif; ?>

		<div class="home-large-wrap col-9">
			
			<?php 
			$images = get_field('large_images_slider_images');
			if( $images ): ?>
			    <div class="home-large-images">
			        <?php foreach( $images as $image ): ?>
			            <div class="single-large" style="background-image: url(<?php echo esc_url($image['sizes']['home-hero-large']); ?>)">
<!-- 			                <img src="<?php echo esc_url($image['sizes']['home-hero-large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> -->
			            </div>
			        <?php endforeach; ?>
			    </div>
			<?php endif; ?>
			
			<div class="overlay">
				<div class="inner">
					
					<div class="text-wrap">
						<span>Career</span>
						<span>Arts</span>
						<span>&</span>
						<span>Science</span>
					</div>
				</div>
			</div>
			
		</div>

	</div>
</div>
