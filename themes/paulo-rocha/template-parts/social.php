<?php if (has_post_thumbnail()): 
	$classSocial = 'transformTop';
endif ?>
<div class="social-share <?php echo $classSocial ?>">
	<ul>
		<li><span><i class="fas fa-share"></i></span></li>
		<li><a class="popup-share facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>"><i class="fab fa-facebook-f"></i></a></li>
		<li><a class="popup-share twitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php the_title() ?>&url=<?php the_permalink() ?>&via=jarbas434"><i class="fab fa-twitter"></i></a></li>
		<li><a class="popup-share google-plus" target="_blank" href="http://plus.google.com/share?url=<?php the_permalink() ?>"><i class="fab fa-google-plus-g"></i></a></li>
		<li><a class="popup-share pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&description=&media=<?php the_post_thumbnail_url() ?>"><i class="fab fa-pinterest-p"></i></a></li>
		<li><a class="popup-share linkedin" target="_blank" href="http://linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title() ?>"><i class="fab fa-linkedin-in"></i></a></li>
	</ul>
	<script>
	window.addEventListener('load', function () {
		    $('.popup-share').click(function(e) {
		        e.preventDefault();
		        window.open($(this).attr('href'), 'socialShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
		        return false;
		    });
		});
	</script>
</div>