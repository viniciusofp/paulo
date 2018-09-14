<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paulo_Rocha
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

<!-- 	<?php dynamic_sidebar( 'sidebar-1' ); ?> -->
		<div class="star-footer">
			<?php get_template_part('template-parts/social-media') ?>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-auto text-center align-self-center footer-logo">
					<?php the_custom_logo() ?>
				</div>
				<!-- Menu -->
			  <?php 
			  wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'div',
					'container_class' => 'footer-menu col-12 col-md-auto text-center align-self-center',
					'container_id'    => '',
					'menu_class'      => '',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) ); ?>
			</div>
				
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
