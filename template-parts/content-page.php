<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shinka-post__main' ); ?>>
		<?php get_template_part( 'template-parts/page/header' ); ?>
			<div class="shinka-post__content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shinka' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				?>
			</div>
		</div>
		<?php get_sidebar(); ?>
		</div>
	</div>
</article>
