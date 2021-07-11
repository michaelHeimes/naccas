<section class="documents">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">

			<div class="col col-12">
				
				<div class="inner">
				
					<div class=" header-wrap row">
						<div class="col-2 col-md-1">
							
							<?php 
							$image = get_sub_field('icon');
							if( !empty( $image ) ): ?>
							    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
							
						</div>
						
						<div class="text-wrap col-10">
							<h2><?php the_sub_field('heading');?></h2>
							<?php the_sub_field('copy');?>
						</div>
						
					</div>
									
					<div class="col-11 offset-1">
						<div class="row docs-wrap">
							
						<?php 
						
						$posts = get_sub_field('documents');
						
						if( $posts ): ?>
						    <?php foreach( $posts as $post):?>
						        <?php setup_postdata($post); ?>
						        
								<div class="single-doc col col-12 col-md-4">
									
									<?php if( get_field('type') == 'file' ):?>
									
										<?php
											$file = get_field('pdf');
											if( $file ): ?>
											    <a href="<?php echo $file['url']; ?>" target="_blank"><span><?php the_title() ?></span></a>
											<?php endif; ?>
									
									<?php endif;?>
		
									<?php if( get_field('type') == 'link' ):?>
									
										<?php 
										$link = get_field('outbound_link');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
										    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>	
									
									<?php endif;?>
									
								</div>
	
						    <?php endforeach; ?>
						    <?php wp_reset_postdata();?>
						<?php endif; ?>
												
						</div>
					</div>
					
				</div>
								
			</div>

		</div>
	</div>
</section>