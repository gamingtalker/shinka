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
			<div class="shinka-post__heading">
				<h1 class="shinka-post__title"><?php printf( esc_html__( 'Risultati per: %s', 'shinka' ), get_search_query() ); ?></h1>
			</div>
			<div class="shinka-archive__timeline-container">
				<div class="shinka-archive__timeline-content">
					<div class="shinka-inline-search__wrapper">
						<form role="search" method="get" id="search-form" class="shinka-search__form" action="/">
							<input type="search" class="shinka-search__field" placeholder="<?php echo esc_attr( 'Cerca...', 'placeholder', 'radiate' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
							<button type="submit" class="shinka-search__submit" value="<?php echo esc_attr( 'Cerca', 'submit button', 'radiate' ); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
									<path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
								</svg>
							</button>
						</form>
					</div>
				<?php if ( have_posts() ) : ?>
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
					<?php else: ?>
					<p class="shinka-inline__paragraph"><?php esc_html_e( 'Nessun risultato trovato. Vuoi provare a cercare di nuovo?', 'shinka' ); ?></p>
					<?php endif; ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
