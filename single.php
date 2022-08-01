<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

	<div id="main-content" class="shinka-page">
		<div class="shinka-wrapper">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile; // End of the loop.
			?>
		</div>
		<div class="shinka__recommended-content">
			<h3 class="shinka__in-post-title">Contenuti consigliati</h3>
			<article class="shinka__recommended-content-post">
				<div class="shinka__recommended-content-image">
					<a href="#">
						<img class="shinka__recommended-content-thumb" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/Skate-StillWorkingOnIt_3.jpg">
					</a>
				</div>
				<div class="shinka__recommended-content-text">
					<a href="#">
						<h3 class="shinka__recommended-content-title">Atittolo</h3>
					</a>
				</div>
			</article>
			<article class="shinka__recommended-content-post">
				<div class="shinka__recommended-content-image">
					<a href="#">
						<img class="shinka__recommended-content-thumb" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/Skate-StillWorkingOnIt_3.jpg">
					</a>
				</div>
				<div class="shinka__recommended-content-text">
					<a href="#">
						<h3 class="shinka__recommended-content-title">Atittolo</h3>
					</a>
				</div>
			</article>
			<article class="shinka__recommended-content-post">
				<div class="shinka__recommended-content-image">
					<a href="#">
						<img class="shinka__recommended-content-thumb" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/Skate-StillWorkingOnIt_3.jpg">
					</a>
				</div>
				<div class="shinka__recommended-content-text">
					<a href="#">
						<h3 class="shinka__recommended-content-title">Atittolo</h3>
					</a>
				</div>
			</article>
			<article class="shinka__recommended-content-post">
				<div class="shinka__recommended-content-image">
					<a href="#">
						<img class="shinka__recommended-content-thumb" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/Skate-StillWorkingOnIt_3.jpg">
					</a>
				</div>
				<div class="shinka__recommended-content-text">
					<a href="#">
						<h3 class="shinka__recommended-content-title">Atittolo</h3>
					</a>
				</div>
			</article>
		</div>
	</div>
<?php
get_footer();
