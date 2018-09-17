<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Paulo_Rocha
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/favicon-16x16.png" sizes="16x16" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<?php if (has_post_thumbnail()): ?>
		<meta property="og:image" content="<?php the_post_thumbnail_url() ?>" />
	<?php else: ?>
		<meta property="og:image" content="<?php echo get_template_directory_uri() ?>/img/slide1.jpg" />
	<?php endif ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<!-- 	Social Bar -->
	<div class="social-bar">
		<div class="container">
			<div class="row">
				<div class="col-12 text-right">
					<?php get_template_part('template-parts/social-media') ?>
				</div>
			</div>
		</div>
	</div>
<!-- Navbar -->

	<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">

		<div class="container">
			<!-- Get the URL of custom logo -->
			<?php 
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
			<a class="navbar-brand" href="<?php echo home_url('/'); ?>"><img src="<?php echo $custom_logo[0]; ?>" alt="" class="my-2"></a>
		  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <!-- Menu -->
		  <?php 
		  wp_nav_menu( array(
				'theme_location'  => 'menu-1',
				'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'bs-example-navbar-collapse-1',
				'menu_class'      => 'navbar-nav ml-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			) ); ?>
			<!-- Search Form -->
 			<div class="ml-2">
				<?php get_search_form(true); ?>
			</div>
		</div> <!-- container end -->
	</nav> <!-- navbar end -->

	<script>
		var lastScrollTop = 0;
		window.addEventListener('load', function () {
			$(window).scroll(function(event){


			   var st = $(this).scrollTop();
			   if (st > lastScrollTop){
			       $('nav.navbar').addClass('smallNav');
			   } else {
			      $('nav.navbar').removeClass('smallNav');
			   }
			   lastScrollTop = st;

			});
			// var navbarWaypoint = $('body').waypoint(function(direction) {
			// 	if (direction == 'down') {
			// 		$('nav.navbar').addClass('smallNav');
			// 	} else {
			// 		$('nav.navbar').removeClass('smallNav');
			// 	}
			// }, {
			//   offset: '58px'
			// })

			$('#searchsubmit').click(function() {
				$('nav.navbar #searchform input[type="text"]').addClass('showSearch').focus();
				setTimeout(function() {
					$('#searchform button').attr('type', 'submit')
				}, 200)
				
			})
		}, false);

	
	</script>

	<div id="content" class="site-content">
