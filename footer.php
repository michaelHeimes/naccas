</div> <?php // end #site-container.formerly_total-page-container ?>

<footer id="site-footer" class="" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
  
				<div id="inner-footer" class="cf">
					
					<div class="container">
					
						<div class="row">
							
							<div class="col col-12 col-md-6 col-lg-3">
								<h3><?php the_field('col1_heading', 'option');?></h3>
								<p><?php the_field('col1_copy', 'option');?></p>
							</div>
	
							<div class="col col-12 col-md-6 col-lg-3">
								<h3><?php the_field('col2_heading', 'option');?></h3>
	
								<nav role="navigation">
					              <?php wp_nav_menu( [
					                 'container'       => 'div',                           // remove nav container
					                 'container_class' => 'footer-nav-wrap',                 // class of container (should you choose to use it)
					                 'container_id'    => 'site-footer-nav',
					                 'menu'            => __( 'The Main Menu', 'coyotetheme' ),  // nav name
					                 'menu_class'      => 'nav footer-nav',               // adding custom nav class
					                 'theme_location'  => 'footer-links',                 // where it's located in the theme
					                 'before'          => '',                                 // before the menu
					                 'after'           => '',                                  // after the menu
					                 'link_before'     => '',                            // before each link
					                 'link_after'      => '',                             // after each link
					                 'depth'           => 0,                                   // limit the depth of the nav
					                 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',                             // fallback function (if there is one)
					                 'walker'          => new \WP_Bootstrap_Navwalker(),
					               ] ); ?>
								</nav>
							</div>
							
							<div class="col col-12 col-md-6 col-lg-3">
								<h3><?php the_field('col3_heading', 'option');?></h3>
								<p><?php the_field('col3_copy', 'option');?></p>
								
								<div class="social-wrap">
									<ul>
									<?php if( $facebook = get_field('facebook_link', 'option')):?>
										<li><a href="<?php echo $facebook;?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									<?php endif;?>
									<?php if( $twitter = get_field('twitter_link', 'option')):?>
										<li><a href="<?php echo $twitter;?>" target="_blank"><i class="fab fa-twitter"></i></a></a></li>
									<?php endif;?>
									<?php if( $instagram = get_field('instagram_link', 'option')):?>
										<li><a href="<?php echo $instagram;?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
									<?php endif;?>
									<?php if( $linkedin = get_field('linkedin_link', 'option')):?>
										<li><a href="<?php echo $linkedin;?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
									<?php endif;?>
									</ul>
								</div>
								
							</div>
							
							<div class="col col-12 col-md-6 col-lg-3">
								<h3><?php the_field('col4_heading', 'option');?></h3>
								<p><?php the_field('address', 'option');?></p>
								<p>Phone: <?php the_field('phone_number', 'option');?></p>
								<p>Fax: <?php the_field('fax_number', 'option');?></p>
								<p>Email: <?php the_field('email_address', 'option');?></p>
							
							</div>						
												
						</div>

					</div>

  </div>

</footer>

<?php // all js scripts are loaded in library/coyote.php ?>
<?php wp_footer(); ?>

</body>

</html> <!-- end of site. time for a beer! -->

