<section class="content-header">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">
			
			<div class="col-12 col-xl-6">
				<?php if( $heading = get_sub_field('heading')):?>
				<h2><?php echo $heading;?></h2>
				<?php endif;?>
			</div>

			<div class="col-12 col-xl-6">
				

						
			<ul class="social-share">		
				<li>Share:</li>
				<li>
					<a class="twitter customer share"
					href="//twitter.com/share?url=<?php the_permalink() ?>"
					title="Twitter share" target="_blank">
					<i class="fab fa-twitter"></i></a>
				</li>
				
				<li>
					<a class="facebook customer share"
					href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"
					title="Facebook share" target="_blank">
					<i class="fab fa-facebook-f"></i></a>
				</li>
				
				<li>
					<a class="linkedin customer share"
					href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"
					title="linkedin Share" target="_blank">
					<i class="fab fa-linkedin-in"></i></a>
				</li>
			</ul>


			</div>
			
			<div class="date-wrap col-12">
				<?php $post_date = get_the_date( 'n/j/Y' ); echo $post_date;?>
			</div>

		</div>
	</div>
</section>