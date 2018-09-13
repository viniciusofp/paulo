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
	<div class="row pt-5">
		<?php if (have_posts()): while ( have_posts() ) : the_post(); ?>
			<div class="col-md-6">
				<div class="blog-post">

					<a href="<?php the_permalink(); ?>">
						<h4 class="mt-3 mb-0"><?php the_title(); ?></h4>
					</a>
					<p class="mb-2"><small><?php echo get_the_date(); ?></small></p>
					<?php echo get_excerpt(); ?>
				</div>	
			</div>
				
		<?php endwhile; else:?>
			<div class="col-12">
				<h2>Não encontramos publicações para a sua busca.</h2>
			</div>
		<?php endif; ?>

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
