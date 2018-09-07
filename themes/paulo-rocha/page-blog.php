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
		<div class="col-12 col-md-8 col-lg-7 mt-3">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$blogArgs = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
		  	'paged'          => $paged
			);
			$blogQuery = new WP_Query($blogArgs); ?>
			<?php while ( $blogQuery->have_posts() ) : $blogQuery->the_post(); ?>
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
			<?php if ($blogQuery->max_num_pages > 1): ?>
				<div class="pagination-wrapper mb-5">
					<p>Mais posts</p>
					<div class="numbers">
						<?php if (function_exists("pagination")) {
				      pagination($blogQuery->max_num_pages);
				    } ?>
					</div>
			  </div>
			<?php endif ?>
		</div>
		<div class="blog-sidebar col-12 col-md-4 col-lg-5">
			<div class="sticky-top pl-lg-5 pt-5 animated fadeInRight">
				<h4>Categorias</h4>
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
