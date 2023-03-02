<?php
/**
 * The template for displaying search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

<div id="main-content" class="shinka-page">
	<div class="shinka-wrapper">
		<div class="shinka-post__main">
			<?php get_template_part( 'template-parts/archive/timeline' ); ?>
		</div>
	</div>
</div>

<?php
get_footer();
