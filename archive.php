<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>
<div id="main-content" class="shinka-page">
	<div class="shinka-wrapper">
	<?php if ( have_posts() ) : ?>
		<div class="shinka-post__main">
			<?php get_template_part( 'template-parts/archive/timeline' ); ?>
		</div>
	</div>
	<?php else: ?>
		<p class="shinka-inline__paragraph"><?php esc_html_e( 'Nessun risultato trovato.', 'shinka' ); ?></p>
	<?php endif; ?>
</div>
<?php
get_footer();
