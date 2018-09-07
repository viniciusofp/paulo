<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Paulo_Rocha
 */

get_header();
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div id="homeCarousel" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#homeCarousel" data-slide-to="1"></li>
				    <li data-target="#homeCarousel" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img class="d-block w-100" src="..." alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="..." alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="..." alt="Third slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif ?>

<?php
get_footer();
