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

	<!-- Slider -->
	<div class="container-fluid homeSlider">
		<div class="row">
			<div class="col-12">
				<?php 
				$images = get_field('slider');
				if( $images ): ?>
				<div id="homeCarousel" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				  	<?php
		        $activeClass = 'active';
		        $count = 0;
		        foreach( $images as $image ): ?>
					    <li data-target="#homeCarousel" data-slide-to="<?php echo $count; ?>" class="<?php echo $activeClass ?>"></li>
		        <?php $activeClass = ''; $count++; endforeach; ?>
				  </ol>
				  <div class="carousel-inner">
		        <?php
		        $activeClass = 'active';
		        foreach( $images as $image ): ?>
						    <div class="carousel-item <?php echo $activeClass ?>">
						      <img class="d-block w-100" src="<?php echo $image['url'] ?>" alt="First slide">
						    </div>
		        <?php $activeClass = ''; endforeach; ?>
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
				<?php endif; ?>
			</div> <!-- col-12 end -->
		</div> <!-- row end -->
	</div> <!-- container end -->

<!-- 	Propostas -->
<div class="homePropostas">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="mt-5 mb-5 text-center">O que Paulo Rocha quer para o Pará ?</h1>
			</div>
		</div>
		<div class="row mt-1 mt-lg-4">
			<?php 
				$propostasArgs = array(
					'post_type' => 'propostas',
					'posts_per_page' => -1
				);
				$propostasQuery = new WP_Query($propostasArgs);
				if ( $propostasQuery->have_posts() ): while ( $propostasQuery->have_posts() ): $propostasQuery->the_post(); ?>
					<div class="proposta-item col-12 col-sm-6 col-lg-3">
						<a href="<?php the_permalink() ?>">
							<div class="proposta-thumbnail">
								<?php the_post_thumbnail('thumbnail') ?>
							</div>
						</a>
						<a href="<?php the_permalink() ?>">
							<h5 class="text-center"><?php the_title(); ?></h5>
						</a>
						
					</div>
			<?php endwhile; wp_reset_postdata(); endif; ?>
		</div>
	</div>
</div>

<!-- Blog -->
<div class="homeBlog">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-5">
				<h2>Blog</h2>
				<p class="lead">Acompanhe as últimas notícias sobre o candidato Paulo Rocha</p>
			</div>
		</div>
		<div class="row">
			<?php 
			$propostasArgs = array(
				'post_type' => 'post',
				'posts_per_page' => 3
			);
			$propostasQuery = new WP_Query($propostasArgs);
			if ( $propostasQuery->have_posts() ): while ( $propostasQuery->have_posts() ): $propostasQuery->the_post(); ?>
				<div class="col-12 col-md-4">
					<div class="blog-item">
						<a href="<?php the_permalink() ?>">
							<div class="blog-thumbnail">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail('thumbnail') ?>
								</a>
							</div>
						</a>
						<div class="content">
							<a href="<?php the_permalink() ?>">
								<h5><?php the_title(); ?></h5>
							</a>	
							<p class="mb-2"><small><?php echo get_the_date() ?></small></p>
							<?php the_excerpt(); ?>
						</div>			
					</div>
				</div>
		<?php endwhile; wp_reset_postdata(); endif; ?>
			<div class="col-12 text-center">
				<a href="<?php echo home_url('/blog') ?>">
					<button class="btn btn-danger">Leia mais</button>
				</a>
			</div>
		</div> <!-- row end -->
	</div> <!-- container end -->
</div>



<!-- Video Section -->
<div class="homeVideo">
	<div class="imgbg">
		<div class="container-fluid">
			<div class="row">
				<div class="texto col-12 col-xl-6 mb-3 align-self-center">
					<h3 class="mb-3"><?php the_field('video_title') ?></h3>
					<?php the_field('video_content') ?>
				</div>
				<div class="video col-12 col-xl-6 align-self-center">
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="<?php the_field('video_url') ?>?rel=0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div> <!-- container end -->
	</div> <!-- .imgbg end -->
</div>

<!-- Sobre Section -->

<div class="homeSobre">
	<div class="container-fluid">
		<div class="row">
			<div class="texto col-12 col-lg-8">
				<p class="lead"><?php the_field('sobre_linhafina') ?></p>
				<h2><?php the_field('sobre_title') ?></h2>
				<?php the_field('sobre_content') ?>
				<a href="<?php echo home_url('/biografia') ?>"><button class="btn btn-danger">Leia mais</button></a>
			</div>
			<div class="foto col-12 col-lg-4 align-self-center">
				<img src="<?php the_field('sobre_foto') ?>" alt="">
				
			</div>
		</div>
	</div>
</div>
<script>
	window.addEventListener('load', function () {
		var propostasWaypoint = $('.homePropostas').waypoint(function(direction) {
			$('.homePropostas').addClass('animated fadeInUp')
		}, {
		  offset: '80%'
		})
		var blogWaypoint = $('.homeBlog').waypoint(function(direction) {
			$('.blog-item').addClass('animated fadeInUp')
		}, {
		  offset: '80%'
		})
		var videoWaypoint = $('.homeVideo').waypoint(function(direction) {
			$('.homeVideo .texto').addClass('animated fadeInLeft')
			$('.homeVideo .video').addClass('animated fadeInRight')
		}, {
		  offset: '80%'
		})
		var sobreWaypoint = $('.homeSobre').waypoint(function(direction) {
			$('.homeSobre .texto').addClass('animated fadeInUp')
			$('.homeSobre .foto').addClass('animated fadeIn')
		}, {
		  offset: '80%'
		})
	}, false);
</script>
<?php endwhile; endif ?>

<?php
get_footer();
