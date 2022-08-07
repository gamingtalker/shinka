<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

/**
 * Page thumbnail variables.
 */
$post_thumbnail_id = get_post_thumbnail_id();
$post_thumbnail_size = 'medium';
$post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
$post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
$post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shinka-post__main' ); ?>>
	<div class="shinka-post__heading">
		<?php the_title( '<h1 class="shinka-post__title">', '</h1>' ); ?>
	</div>
	<div class="shinka-post__content-wrapper">
		<div class="shinka-post__content-container">
			<?php if ( has_post_thumbnail() ): ?>
			<div class="shinka-post__thumbnail">
				<figure class="shinka-post__thumbnail-wrapper">
					<img class="shinka-post__thumbnail-img" src="<?php echo esc_url( $post_thumbnail_src ); ?>"
						srcset="<?php echo esc_attr( $post_thumbnail_srcset ); ?>"
						sizes="(max-width: 768px) 800px, (max-width: 1400px) 1400px, (max-width: 2000px) 2000px"
						alt="<?php the_title(); ?>"
					>
					<?php if ( $post_thumbnail_caption ): ?>
						<figcaption><?php echo esc_html( $post_thumbnail_caption ); ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
			<?php endif; ?>
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
		<?php
		get_sidebar();
		?>
	</div>
	<h3 class="shinka__in-post-title">Contenuti consigliati</h3>
	<div class="shinka__recommended-content">
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
</article>
