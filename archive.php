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
				<div class="shinka-post__heading">
					<?php the_archive_title( '<h1 class="shinka-post__title">', '</h1>' ); ?>
				</div>
				<div class="shinka-archive__timeline-container">
					<div class="shinka-archive__timeline-content">
						<?php while ( have_posts() ) : the_post();
							$post_title = get_the_title();
							$post_url = get_the_permalink();
							$post_image = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
							$post_excerpt = get_the_excerpt();
							$post_date = get_the_date( 'j F Y, H:i' );
						?>
							<div class="shinka-archive__timeline-news">
								<?php if ( $post_image ): ?>
								<div class="shinka-archive__timeline-news-media">
									<a href="<?php echo esc_url( $post_url ); ?>">
										<img class="shinka-archive__timeline-news-image" src="<?php echo esc_url( $post_image ); ?>">
									</a>
								</div>
								<?php endif; ?>
								<div class="shinka-archive__timeline-news-text">
									<p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
									<h2 class="shinka-archive__timeline-news-title">
										<a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a>
									</h2>
									<p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata"><time datetime="<?php the_time( 'c' ); ?>"><?php echo $post_date; ?></time></p>
									<?php if ( $post_excerpt ): ?>
										<p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_excerpt ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
						<div class="shinka-archive__pagination">
							<?php the_posts_pagination( array(
								'mid_size'  => 2,
								'prev_text' => __( '<', 'shinka' ),
								'next_text' => __( '>', 'shinka' ),
							) ); ?>
						</div>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>

<?php
get_footer();
