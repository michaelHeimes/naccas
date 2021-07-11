<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="getting-started" style="background-image: url(<?php echo $imgArr[0]; ?> );">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">
		
			<div class="left col-12 col-lg-8">
				
				<div class="inner">
				
					<?php if($heading = get_sub_field('heading')):?> 
					<h2><?php echo $heading; ?></h2>
					<?php endif;?>
					
					<?php if($copy = get_sub_field('copy')):?> 
					<p><?php echo $copy; ?></p>
					<?php endif;?>
					
				</div>
				
			</div>
		
			<div class="right col-12 col-lg-4">
				
				<div class="inner">
					
					<div class="row">
					
						<?php 
						$image = get_sub_field('icon');
						if( !empty( $image ) ): ?>
						<div class="col-2 d-none d-md-block">
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</div>
						<?php endif; ?>
					
						<?php if($portalHeading = get_sub_field('portal_heading')):?> 
						<div class="col-10">
							<h2><?php echo $portalHeading; ?></h2>
						</div>
						<?php endif;?>
							
						
						<?php if($portalCopy = get_sub_field('portal_copy')):?> 
						<div class="col-12 col-md-10 offset-md-2">
						<p><?php echo $portalCopy; ?></p>
						</div>
						<?php endif;?>
						
						<?php 
						$link = get_sub_field('portal_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <div class="btn-wrap text-center">
						    	<a class="btn hover-btn dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						    </div>
						<?php endif; ?>
					
					</div>
					
				</div>
									
			</div>
		
		</div>
	</div>
</section>
