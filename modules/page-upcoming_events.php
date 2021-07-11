<?php
	$scroll_link = get_sub_field('scroll-to_label');
	$scroll_link = preg_replace('~[^\pL\d]+~u', '-', $scroll_link);
	$scroll_link = strtolower($scroll_link);
?>

<section id="<?php echo $scroll_link;?>" class="upcoming-events" style="background-image: url(<?php echo $imgArr[0]; ?> );">
	<div class="container"><!-- .container-fluid for content to be full-width -->
		<div class="row">
			
			<div class="col col-12">
				<h2 class="back-slash-heading">Upcoming Events</h2>
			</div>
			
			<div class="container">
				<div class="row">
			
				<?php
				
				$ue_tax_ID = get_sub_field('event_category');
					
				$args = array(
					'post_type' 	 => 'events',
					'posts_per_page' => 4,
				    'order'          => 'ASC',
				    'orderby'        => 'meta_value',
				    'meta_key'       => 'start_datetime',
				    'meta_type'      => 'DATETIME',
				    'meta_key'       => 'start_datetime',
					    'tax_query' => array(
					      array(
					        'taxonomy' => 'event_category',
					        'terms' => $ue_tax_ID,
					      ),
					    ),				    
					);
				$posts = get_posts($args);
				$count = 0;
				?>
	
				<?php if ($posts): ?>
	
	
					<?php foreach ($posts as $post): ?>
					
						<?php get_template_part('loop', 'events'); ?>
						
					<?php endforeach; ?>
	
					<?php wp_reset_postdata(); ?>
	
	
				<?php endif; ?>
			
				</div>
			</div>
		
		</div>
	</div>
</section>
