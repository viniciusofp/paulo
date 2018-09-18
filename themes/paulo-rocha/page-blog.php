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

<?php get_template_part('template-parts/content', 'page-header') ?>

<div class="container">
	<div class="row pt-3">
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$blogArgs = array(
			'post_type' => 'post',
			'posts_per_page' => 6,
	  	'paged'          => $paged
		);
		$blogQuery = new WP_Query($blogArgs); ?>
		<?php while ( $blogQuery->have_posts() ) : $blogQuery->the_post(); ?>
			<div class="col-md-6 col-lg-4">
				<div class="blog-post">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
					<a href="<?php the_permalink(); ?>">
						<h4 class="mt-3 mb-0"><?php the_title(); ?></h4>
					</a>
					<p class="mb-2"><small><?php echo get_the_date(); ?></small></p>
					<?php echo get_excerpt(); ?>
				</div>	
			</div>
				
		<?php endwhile; ?>

		<!-- pagination here -->
		<?php if ($blogQuery->max_num_pages > 1): ?>
			<div class="col-12">
				<div class="pagination-wrapper mb-5">
					<p>Mais posts</p>
					<div class="numbers">
						<?php if (function_exists("pagination")) {
				      pagination($blogQuery->max_num_pages);
				    } ?>
					</div>
			  </div>
			</div>
				
		<?php endif ?>
	</div>
</div>

<?php
get_footer();
