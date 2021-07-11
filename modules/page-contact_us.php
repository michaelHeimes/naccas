<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="contact-us dark">
	<div class="container-fluid"><!-- .container-fluid for content to be full-width -->
		<div class="row">
			
			<div class="col-12">
			
				<div class="container">
					
					<div class="row">
				
						<div class="col-12 text-center">
							<h2>Contact Us</h2>
						</div>
	
						<div class="col-12 text-center">
						<?php $i=1; if( have_rows('contact_cards') ):?>
							<div class="staff-cards-wrap row align-items-stretch">
							<?php while ( have_rows('contact_cards') ) : the_row();?>
									
							
								<?php if( have_rows('single_card') ):?>
									<?php while ( have_rows('single_card') ) : the_row();?>	
				
										<?php
										$post_object = get_sub_field('person');
										if( $post_object ): 
										
											$post = $post_object;
											setup_postdata( $post ); 
										
											?>
											<div class="staff-card col-12 col-md-6">
												
												<?php if($heading = get_sub_field('heading')):?>
												<h3 class="heading text-left"><?php echo $heading;?></h3>
												
												<?php else:?>
												
												<h3 class="text-left">&nbsp;</h3>
												
												<?php endif;?>
												
												<div class="row fh">
													
													<div class="col-12">	
														<div class="inner">
															
															<div class="row">
														
																<div class="left col-12 col-md-6">
													
																	<?php the_field('bulletted_list');?>
																	
																</div>
																
																<div class="right col-12 col-md-6 text-left">
																	
																	<a href="mailto:<?php the_field('email_address');?>"><?php the_title();?></a>
																	
																	<div><?php the_field('job_title');?></div>
																													
																</div>
															
															</div>
															
														</div>
													
													</div>
												</div>
												
												
											</div>
										    <?php wp_reset_postdata();?>
										<?php endif; ?>
				
									<?php endwhile;?>
								<?php endif;?>
								
					        <?php if($i % 2 == 0): ?>
				            </div>
				            <div class="staff-cards-wrap row align-items-stretch">
					        <?php endif; ?>
					        <?php $i++; ?>
						
							<?php endwhile;?>
							</div>
						<?php endif;?>
						
						</div>
						
					</div>
					
				</div>
				
			</div>

		</div>
	</div>
</section>