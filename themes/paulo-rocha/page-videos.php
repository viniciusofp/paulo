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

<div class="container pb-3 pt-3 page-videos">
	<div class="row">

	<?php if( have_rows('videos') ): ?>
		<div class="col-12">
			<h2 class="mb-4 text-primary">Vídeos</h2>
		</div>
		<?php while( have_rows('videos') ): the_row(); 
			// vars
			$video = get_sub_field('video');
			$legenda = get_sub_field('legenda');

			?>
			<div class="col-6 col-md-3 video">
				<?php
				// use preg_match to find iframe src
				preg_match('/src="(.+?)"/', $video, $matches);
				$src = $matches[1];
				$arr = explode("/embed/", $src, 2);
				$arr = explode("?", $arr[1], 2);
				$videoID = $arr[0];
				$videoThumb = 'https://img.youtube.com/vi/' . $videoID. '/mqdefault.jpg'; ?>
				<img src="<?php echo $videoThumb; ?>" alt="" class="img-fluid modalTrigger mb-2" data-src="<?php echo $src ?>&modestbranding=1&autoplay=1" data-toggle="modal" data-target="#exampleModal">
				<p><?php echo $legenda ?></p>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('arquivos') ): ?>
		<div class="col-12">
			<h2 class="mb-4 mt-3 text-primary">Arquivos</h2>
		</div>
		<?php while( have_rows('arquivos') ): the_row(); 
			// vars
			$image = get_sub_field('arquivo');

			?>
			<div class="col-6 col-md-3 arquivo">
					<button class="preview btn btn-primary" data-id="media-<?php echo $image['ID'];?>">Visualizar</button>
        	<iframe id="media-<?php echo $image['ID'];?>" data-src="<?php echo $image['url'];  ?>" alt="" frameborder="0">
        	</iframe>
					<h6><?php echo $image['title'];?></h6>
					<?php if ($image['caption']): ?>
						<p><?php echo $image['caption'];?></p>
					<?php endif ?>
          <a target="_blank" href="<?php echo $image['url']; ?>">
          	<button class="btn btn-primary btn-sm mr-2">DOWNLOAD</button>
          </a>
          <small><?php echo $image['mime_type']; ?></small>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="embed-responsive embed-responsive-16by9">
			  <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
			</div>
    </div>
  </div>
</div>

<script>
window.addEventListener('load', function () {

	// Preview
	$('button.preview').click(function() {
		var mediaID = $(this).attr('data-id');
		var iframe = $('#'+mediaID)
		var iframeURL = iframe.attr('data-src')
		console.log(iframeURL)
		iframe.attr('src', iframeURL)
		$(this).fadeOut();
	})


	// Modal
	$('.modalTrigger').click(function() {
 		var src = $(this).attr('data-src');
 		$('#exampleModal iframe').attr('src', src)
	})

	$('#exampleModal').on('hide.bs.modal', function (e) {
	  $('#exampleModal iframe').attr('src', '')
	})

});
</script>
			
<?php endwhile; ?>

<?php
get_footer();
