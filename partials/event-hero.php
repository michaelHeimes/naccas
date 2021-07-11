<?php
	$imgID = get_field('hero_image');
	$imgSize = "full";
	$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );

?>
<section class="hero event-hero <?php get_field('hero_custom_class');?>" style="background-image: url(<?php echo $imgArr[0]; ?> );">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row inner">
		
			<div class="col col-12 col-md-5">
				
				<div class="text-wrap">
				
					<?php if($hero_date_time = get_field('hero_date_time')):?> 
					<div class="hero-date"><span><?php echo $hero_date_time; ?></span></div>
					<?php endif;?>
					
	<!-- 				<h1><?php the_title() ?></h1> -->
	
					<?php if($title = get_field('title')):?> 
					<h1><?php echo $title; ?></h1>
					<?php endif;?>
					
					<?php if($subtext = get_field('hero_copy')):?> 
					<p><?php echo $subtext; ?></p>
					<?php endif;?> 
				
					<?php 
					$link = get_field('event_link');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
	
						<div class="col-12 btn-wrap text-left">
					    	<a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					    </div>
					<?php endif; ?>
				
				</div>
									
			</div>			
			
			<div class="scroll-links col col-12 col-md-5">
				
				<div class="inner">
								
					<a href="#event-details" class="row">	
						<div class="left">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-right-scroll.svg"/>
						</div>
						
						<div class="right">
							Event Details
						</div>
					</a>

					<a href="#extra-info" class="row">	
						<div class="left">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/bullhorn-scroll.svg"/>
						</div>
						
						<div class="right">
							Extra Info
						</div>
					</a>
					
					<a href="#upcoming-events" class="row">	
						<div class="left">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/layers-scroll.svg"/>
						</div>
						
						<div class="right">
							Upcoming Events
						</div>
					</a>
				
				</div>
						
			</div>
		
		</div>
	</div>
</section>