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

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<style>
	html {
		margin-top: 0!important;
	}
</style>
</body>
</html>
