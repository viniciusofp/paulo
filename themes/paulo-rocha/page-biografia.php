<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paulo_Rocha
 */

get_header();
?>


<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part('template-parts/content', 'page-header') ?>

<div class="container pb-5">
	<div class="row">
		<div class="col-12 col-lg-4 col-xl-5 mb-4 text-center">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="col-12 col-lg-8 col-xl-7">
			<?php the_content(); ?>
		</div>
	</div>
</div>
			
<?php endwhile; ?>

<?php
get_footer();
