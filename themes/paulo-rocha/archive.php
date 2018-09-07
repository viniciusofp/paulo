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

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mt-3">

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="blog-post">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				<a href="<?php the_permalink(); ?>">
					<h3 class="mt-3 mb-0"><?php the_title(); ?></h3>
				</a>
				<p class="mb-2"><small><?php echo get_the_date(); ?></small></p>
				<?php the_excerpt(); ?>
			</div>	
			<?php endwhile; ?>
			<!-- pagination here -->
			<div class="pagination-wrapper mb-5">
				<p>Mais posts</p>
				<div class="numbers">
					<?php the_pagination() ?>
				</div>
					
		  </div>
		</div>
		<div class="blog-sidebar col-12 col-md-4">
			<div class="sticky-top pt-3">
				<h3>Categorias</h3>
				<?php wp_list_categories(array(
					'title_li' => '',
					'style' => ''
				)) ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
