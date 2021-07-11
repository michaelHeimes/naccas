<?php $modalId = 'card-' . md5( get_the_title() );?>

<div class="single-staff-card col-sm-12 col-md-6">
	<div class="row">

		<div class="col col-12 col-md-6">
			<?php
      $image_id = get_field( 'photo' );
      if ( $image_id ): //dont output an empty image tag
        echo wp_get_attachment_image( $image_id, 'staff-directory-card' );
      endif; ?>
		</div>
		
		<div class="text-wrap col col-12 col-md-6 text-center">
			<span><?php the_title();?></span>
			<span><?php the_field('job_title');?></span>
			<span><a href="mailto:<?php the_field('email_address');?>"><?php the_field('email_address');?></a></span>
			<span><a href="tel:<?php the_field('phone_number');?>"><?php the_field('phone_number');?></a></span>
		</div>
	
	</div>
	
	  <a href="#" class="staff-modal-toggle" data-toggle="modal" data-target="#<?php echo $modalId; ?>"></a>
	
</div>


		
<div class="modal fade staff-modal" id="<?php echo $modalId; ?>" aria-labelledby="<?php echo $modalId; ?>-label">
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
	
