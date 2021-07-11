<!doctype html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="utf-8">
  
  <?php // force Internet Explorer to use the latest rendering engine available ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php wp_title( '' ); ?></title>
  
  <?php // mobile meta (hooray!) ?>
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <?php // icons & favicons ?>
  <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/dist/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/dist/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/dist/images/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/images/site.webmanifest">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/safari-pinned-tab.svg"
        color="#cccccc">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/favicon.ico">
  <meta name="msapplication-TileColor" content="#cccccc">
  <meta name="msapplication-config"
        content="<?php echo get_template_directory_uri(); ?>/dist/images/browserconfig.xml">
  <meta name="theme-color" content="#cccccc">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  
  <?php // wordpress head functions ?>
  <?php wp_head(); ?>
  <?php // end of wordpress head ?>
  
  <?php // drop Google Analytics Here ?>
  <?php // end analytics ?>
  <!-- Facebook Opengraph -->
  <meta property="og:url" content="<?php the_permalink() ?>" />
  <?php if ( is_single() ) { ?>
    <meta property="og:title" content="<?php single_post_title( '' ); ?>" />
    <meta property="og:description" content="<?php echo strip_tags( get_the_excerpt( $post->ID ) ); ?>" />
    <meta property="og:type" content="article" />
    <?php if ( has_post_thumbnail() ) { ?>
      <meta property="og:image"
            content="<?php echo wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) ) ?>" />
    <?php }
    elseif ( function_exists( 'get_field' ) ) {
      if ( get_field( 'default_social_image' ) ) { ?>
        <meta property="og:image" content="<?= get_field( 'default_social_image', 'options' ) ?>" />
      <?php }
    } ?>
  <?php } else { ?>
    <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
    <meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
    <meta property="og:type" content="website" />
    <?php if ( function_exists( 'get_field' ) ) {
      if ( get_field( 'default_social_image' ) ) { ?>
        <meta property="og:image" content="<?= get_field( 'default_social_image', 'options' ) ?>" />
      <?php }
    } ?>
  <?php } ?>
  
  <link rel='dns-prefetch' href='//pro.fontawesome.com' />
  
  <link rel='stylesheet' id='fontawesome-css'  href='//pro.fontawesome.com/releases/v5.12.1/css/all.css?ver=5.12.1' type='text/css' media='all' />

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">


  <header id="site-header" class="container-fluid" role="banner" itemscope itemtype="http://schema.org/WPHeader">
    <div class="row align-items-center">
	    
      <div class="logo-wrap col col-6 col-md-2 d-none d-lg-block">
        <a id="logo" class="navbar-brand" href="<?php echo home_url(); ?>" rel="nofollow">
          <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" />
        </a>
      </div>
      
      <div class="col-12 col-lg-10">
        
        <div class="top row d-none d-lg-flex">
          <div class="col ml-auto text-right">

            <form method="get" id="searchform" action="<?php echo home_url(); ?>/" class="form-inline justify-content-md-end">
              <label class="sr-only" for="search">Search in <?php echo home_url( '/' ); ?></label>
              <input type="hidden" id="searchsubmit" />
              <div class="input-group">
                <input type="text" placeholder="Search" name="s" id="s" class="form-control" />
                <div class="input-group-append">
                  <input type="image" alt="Search" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/magnifier.svg" />
                </div>
              </div>
            </form>
            
            <?php
            if(  $link = get_field( 'member_portal_login', 'option' ) ):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
            
          </div>
                    
        </div>
        
        <div class="desktop-nav-wrap row d-none d-lg-block">
          <div class="col">
            
            <nav class="navbar navbar-expand-md navbar-light" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
              <?php wp_nav_menu( [
                 'container'       => 'div',                           // remove nav container
                 'container_class' => 'collapse navbar-collapse',                 // class of container (should you choose to use it)
                 'container_id'    => 'site-primary-nav',
                 'menu'            => __( 'The Main Menu', 'coyotetheme' ),  // nav name
                 'menu_class'      => 'navbar-nav ml-md-auto',               // adding custom nav class
                 'theme_location'  => 'main-nav',                 // where it's located in the theme
                 'depth'           => 1,                                   // limit the depth of the nav
                 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',                             // fallback function (if there is one)
                 'walker'          => new \WP_Bootstrap_Navwalker(),
               ] );
              ?>
            </nav>
            
		      </div>
        </div>
        
        <div class="mobile-nav-wrap row d-lg-none">
          <div class="logo-wrap col">
            <nav class="navbar navbar-dark justify-content-end navbar-mobile" role="navigation"
                 itemscope itemtype="http://schema.org/SiteNavigationElement">

              <div class="navbar-header">
                <a id="mobile-logo" class="navbar-brand" href="<?php echo home_url(); ?>" rel="nofollow">
                  <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
                  <img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" />
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#site-primary-nav-mobile" aria-controls="site-primary-nav-mobile"
                        aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              
              <?php wp_nav_menu( [
                 'container'       => 'div',                           // remove nav container
                 'container_class' => 'navbar-collapse collapse',                 // class of container (should you choose to use it)
                 'container_id'    => 'site-primary-nav-mobile',
                 'menu'            => __( 'The Main Menu (Mobile)', 'coyotetheme' ),  // nav name
                 'menu_class'      => 'nav navbar-nav',               // adding custom nav class
                 'theme_location'  => 'main-nav-mobile',                 // where it's located in the theme
                 'depth'           => 1,                                   // limit the depth of the nav
                 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',                             // fallback function (if there is one)
                 'walker'          => new \WP_Bootstrap_Navwalker(),
               ] );
              ?>
              
            </nav>
          </div>
        </div>

      </div>
    </div>
  </header>

<div id="site-container" class="formerly_total-page-container">
