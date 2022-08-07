<?php
/**
 * The template for displaying author page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
$author_id = $post->post_author;
$author_name = get_the_author_meta( 'display_name', $author_id );
$twitter_slug = get_the_author_meta( 'twitter', $author_id );
$author_bio = get_the_author_meta( 'description', $author_id );

get_header();
?>
	<div id="main-content" class="shinka-page">
		<div class="shinka-wrapper">
		<?php if ( have_posts() ) : ?>
			<div class="shinka-post__main">
                <div class="shinka-archive__pre-content">
                    <?php $user = wp_get_current_user();
                        if ( $user ) :
                    ?>
                    <img src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" alt="Immagine di <?php echo esc_html( $author_name ); ?>" />
                    <?php endif; ?>
                    <div class="shinka-archive__pre-content-main">
                        <div class="shinka-archive__pre-content-meta">
                            <h1 class="shinka-archive__pre-content-title"><?php echo esc_html( $author_name ); ?></h1>
                            <?php // if ( $twitter_slug ) : ?>
                            <a href="<?php echo esc_url( 'https://twitter.com/' . $twitter_slug ); ?>" target="_blank" rel="nofollow noopener">
                            <svg class="shinka__twitter-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                            </a>
                            <?php // endif; ?>
                        </div>
                        <?php if ( $author_bio ): ?>
                        <p class="shinka-archive__pre-content-text"><?php echo esc_html( $author_bio ); ?></p>
                        <?php else: ?>
                            <p class="shinka-archive__pre-content-text">Autore di GamingTalker.</p>
                        <?php endif; ?>
                    </div>
                </div>
				<div class="shinka-post__heading">
					<h2>Articoli di <?php echo esc_html( $author_name ); ?></h2>
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
