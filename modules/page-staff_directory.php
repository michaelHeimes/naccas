<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="staff-directory light">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">
			
			<div class="col col-12">
			
				<div class="inner">
					
					<div class="row">
				
						<div class="col-1 d-none d-md-block text-right">
							<?php 
							$image = get_sub_field('icon');
							if( !empty( $image ) ): ?>
							    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
							
						</div>
						
						<div class="text-wrap col-12 col-md-10 col-lg-10">
							<h2><?php the_sub_field('heading');?></h2>
						</div>
			
						<div class="col-12">
							<div class="row">
								
								<?php 
								
								$posts = get_sub_field('team_cards');
								
								if( $posts ):
                  foreach( $posts as $post):
                    setup_postdata($post);
                    $modalId = 'card-' . md5( get_the_title() ); ?>
										
										<div class="staff-card col-12 col-md-3">
				              <div class="staff-card-wrap">
                        <?php
                        $image_id = get_field('photo');
                        $image_size = 'utility-staff-card';

                        if ($image) //dont output an empty image tag
                          echo wp_get_attachment_image( $image_id, $image_size, false, [ 'class' => 'img-fluid' ] ); ?>

                        <div class="name-wrap text-center">
                          <span><?php the_title();?></span>
                        </div>

                        <a href="#" class="staff-modal-toggle" data-toggle="modal" data-target="#<?php echo $modalId; ?>"></a>
                      </div>
                    </div>

                    <div class="modal fade staff-modal" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modalId; ?>-label" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content rounded-0">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row justify-content-center align-items-center">
                                <div class="col-12 d-md-none d-lg-block col-lg-3 order-md-last text-center">
                                  <?php
                                  if ( $image_id ): //dont output an empty image tag
                                    echo wp_get_attachment_image( $image_id, $image_size, false, [ 'class' => 'img-fluid w-100 mb-4' ] );
                                  endif; ?>
                                </div>
                                <div class="col-12 col-md-12 col-lg-9 order-md-first">
                                  <h2 id="<?php echo $modalId; ?>-label" class="modal-title"><?php the_title(); ?></h2>
                                  <?php the_field( 'bio' ); ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                  
                  <?php endforeach; ?>
								    <?php wp_reset_postdata();?>
								<?php endif; ?>	
								
								<?php if($link = get_sub_field('page_link')):?>
								<div class="btn-wrap col-12 text-center">
							    	<a class="btn hover-btn light" href="<?php echo $link; ?>">View</a>
							    </div>
								<?php endif;?>					
									
							</div>				
						</div>
				
				</div>
				
			</div>

		</div>
	</div>
</section>