<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="accordion <?php get_sub_field('layout');?> <?php get_sub_field('style');?>">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">

			<div class="header col col-12">
					
				<div class="inner">
					
					<div class="row">
				
						<div class="col-2">
							
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
					
				</div>
				
			</div>
			
			
			<div class="body col col-12">
				<div class="inner">
					<div class="row">
						
						<div class="pre-acc-copy-wrap col col-8 offset-2">
							<?php the_field('pre-accordion_copy');?>
						</div>
						
						<div class="col col-10 offset-1">
							
							<?php 
							$posts = get_sub_field('accordions');
							if( $posts ): $counter = 1;?>
							    <div class="accordion" id="accordion-<?php echo get_row_index();?>">
							    <?php foreach( $posts as $post):?>
							        <?php setup_postdata($post); ?>
							        
									<div class="card">
										
										<div class="card-header <?php if ( $counter === 1 ) echo 'open'; ?>" id="heading-<?php echo $counter;?>">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $counter;?>" aria-expanded="true" aria-controls="collapse-<?php echo $counter;?>">
													<?php the_title();?>
												</button>
											</h2>
										</div>
									
										<div id="collapseOne" class="collapse <?php if ( $counter === 1 ) echo 'show'; ?>"
										aria-labelledby="heading-<?php echo $counter;?>" data-parent="#accordion-<?php echo get_row_index();?>">
											<div class="card-body">
												
												<?php if( have_rows('content_rows') ):?>
													<?php while ( have_rows('content_rows') ) : the_row();?>	
													
													<?php if( have_rows('single_row') ):?>
														<?php while ( have_rows('single_row') ) : the_row();?>	
														
															<?php if( get_sub_field('layout') == 'text' ):?>
															
																<div class="row text-row">
																	
																	<div class="col col-12">
																      
																		<?php the_sub_field('copy');?>
																	
																	</div>
																
																</div>
																			      
															<?php endif;?>     
												
															<?php if( get_sub_field('layout') == 'table' ):?>
															
																<?php if( have_rows('table_rows') ):?>
																	<?php while ( have_rows('table_rows') ) : the_row();?>	
																
																		<?php if( have_rows('single_table_row') ):?>
																			<?php while ( have_rows('single_table_row') ) : the_row();?>	
																			
																			<div class="row table-row">    
																				<div class="col col-3">
																					<?php the_sub_field('left_cell');?>
																				</div>
																				
																				<div class="col col-9">
																					<?php the_sub_field('right_cell');?>
																				</div>							      
																			</div>							
																		
																			<?php endwhile;?>
																		<?php endif;?>
																
																	<?php endwhile;?>
																<?php endif;?>
												
															<?php endif;?> 					
													
														<?php endwhile;?>
													<?php endif;?>
												
													<?php endwhile;?>
												<?php endif;?>
	
											</div>
										</div>
										
									</div>
							  
							    <?php $counter++; endforeach; ?>
							    </div>
							    <?php wp_reset_postdata();?>
							<?php endif; ?>

						</div>
					</div>
					
				</div>
			</div>
				
		</div>
	</div>
</section>