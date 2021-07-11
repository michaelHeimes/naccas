<article id="post-<?php the_ID(); ?>" <?php if (is_page_template('page-template-eventsresources.php')):?><?php post_class('cf col col-12 col-md-4 col-lg-4');?><?php else:?><?php post_class('cf col col-12 col-md-6 col-lg-3');endif ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

	<a href="<?php echo get_permalink(); ?>" class="inner card-inner <?php get_field('hero_custom_class');?>">
		
		<?php
			$imgID = get_field('hero_image');
			$imgSize = "event-card";
			$imgArr = wp_get_attachment_image_src( $imgID, $imgSize );
			
			$fb_ImgID = get_field('efb_image', 'option');
			$fb_ImgSize = "event-card";
			$fb_ImgArr = wp_get_attachment_image_src( $fb_ImgID, $fb_ImgSize );			
			
		?>
		<div class="bg" style="background-image: url(<?php if ($imgID): echo $imgArr[0]; else: echo $fb_ImgArr[0]; endif;?> );"></div>
								
		<div class="date-time-wrap">
			
			<?php $startMonth = date('F', strtotime(get_field('start_datetime')));
			$startDay = date('j', strtotime(get_field('start_datetime')));?>
			<span class="month"><?php echo $startMonth;?></span>
			<span class="day"><?php echo $startDay;?></span>

			
			<?php $startTime = date('g:ia', strtotime(get_field('start_datetime')));?>
			<span class="time"><?php echo $startTime;?></span>
			
			
		</div>
		
		<div class="title-wrap blurred-bg">
			
				<div class="blur"></div>
							
			<h2 class="title"><?php the_field('title');?></h2>

		</div>
		
	</a>

</article> <?php // end article ?>