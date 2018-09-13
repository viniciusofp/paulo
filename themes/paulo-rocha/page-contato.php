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
<div class="contato-container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="d-none d-lg-flex col-lg-7 align-self-end">
				<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
			</div>
			<div class="col-12 col-lg-5 py-5">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
	
			
<?php endwhile; ?>

<?php
get_footer();
