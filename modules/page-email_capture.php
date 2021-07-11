<?php
if ( function_exists( 'gravity_form' ) ):
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link); ?>

<section id="<?php echo $scroll_link;?>"  class="email-capture">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">
			
			<div class="inner col-12">
		
				<div class="content-wrap col-12 text-center">
					
					<div class="inner">
					
						<?php if($heading = get_sub_field('heading')):?> 
						<div>
							<h2><?php echo $heading; ?></h2>
						</div>
						<?php endif;?>
						
						<?php if($copy = get_sub_field('copy')):?> 
						<div class="copy-wrap"><?php echo $copy; ?></div>
						<?php endif;?>
			
						<?php $form_ID = get_sub_field('gravity_form_id'); ?>
												
						<?php gravity_form( $form_ID, false, false, false, '', true );?>
					
					</div>
										
				</div>
			
			</div>
		
		</div>
	</div>
</section>

<?php endif; ?>