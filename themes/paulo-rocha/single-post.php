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
$postID = get_the_ID();
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=292375918224061&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 col-lg-7 mt-3">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="blog-post">
				<div class="text-center">
					<?php the_post_thumbnail(); ?>
				</div>
				<h3 class="mt-3 mb-0"><?php the_title(); ?></h3>
				<p class="mb-2"><small><?php echo get_the_date(); ?></small></p>
				<?php the_content(); ?>
				<div class="comments mt-3">
					<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
				</div>
			</div>	
			<?php endwhile; ?>

		</div>
		<div class="blog-sidebar col-12 col-md-4 col-lg-5">
			<div class="sticky-top pl-lg-5 pt-5 animated fadeInRight">
				<h4>Posts recentes</h4>
				<?php 
				$propostasArgs = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'post__not_in' => array($postID)
				);
				$propostasQuery = new WP_Query($propostasArgs);
				if ( $propostasQuery->have_posts() ): while ( $propostasQuery->have_posts() ): $propostasQuery->the_post(); ?>
						<div class="content">
							<a href="<?php the_permalink() ?>">
								<h5 class="mt-4 mb-0"><?php the_title(); ?></h5>
							</a>	
							<p class="mb-2"><small><?php echo get_the_date() ?></small></p>
						</div>	
				<?php endwhile; wp_reset_postdata(); endif; ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
