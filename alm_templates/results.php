<article id="post-<?php the_ID(); ?>" <?php post_class('cf row align-items-start search-result'); ?> role="article"
  itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
  <div class="col-12">
    <span class="badge badge-info text-uppercase post-type"><?php echo get_post_type(); ?></span>
    <a href="<?php the_permalink(); ?>">
      <h2 class="post-title"><?php the_title(); ?></h2>
    </a>
    <p class="post-date"><?php echo get_the_date(); ?></p>
  </div>
</article> <?php // end article ?>
