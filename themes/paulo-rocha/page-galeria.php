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

<div class="container pb-3">
	<div class="row">
	<?php 
	$images = get_field('galeria');
	$count = 0;
	if( $images ): ?>

    <?php foreach( $images as $image ): ?>
      <div class="col-lg-3 col-md-4 col-6 mb-4">

        <img class="modalTrigger" data-slide-to="<?php echo $count ?>" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>"  data-toggle="modal" data-target="#exampleModal" />

        <!-- <p><?php echo $image['caption']; ?></p> -->
      </div>
    <?php $count++; endforeach; ?>

	<?php endif; ?>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    	
			<!-- Carousel -->
			<div id="carouselExampleControls" class="carousel-fade carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<?php
			  		$itemClass = 'active';
			  	?>
			  	 <?php foreach( $images as $image ): ?>

					    <div class="carousel-item <?php echo $itemClass ?>">
					      <img class="d-block w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			          <div class="carousel-caption d-none d-md-block">
							    <p><?php echo $image['caption']; ?></p>
							  </div>
					    </div>

			    <?php $itemClass = ''; endforeach; ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div> <!-- Carousel end -->

    </div>
  </div>
</div>

<script>
	window.addEventListener('load', function () {
	 $('#exampleModal').modal('handleUpdate');
	 $('.modalTrigger').click(function() {
 		$('#carouselExampleControls').carousel( parseInt( $(this).attr('data-slide-to') ) )
	 })

	});
</script>
			
<?php endwhile; ?>

<?php
get_footer();
