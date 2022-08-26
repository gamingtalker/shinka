<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

/**
 * Game variables.
 */
$game_title = get_the_title();
$game_permalink = get_permalink();
$game_featured_image = get_the_post_thumbnail_url();
$game_genres = get_field( 'game_genres' );
$game_release_date = get_field( 'game_release_date' );
$game_platforms = get_field( 'game_platforms' );
$game_developers = get_field( 'game_developer' );
$game_publishers = get_field( 'game_publisher' );
$game_cover = get_field( 'game_cover' );
$game_original_title = get_field( 'game_original_title' );
$game_rating = get_field( 'game_rating' );
$game_languages = get_field( 'game_languages' );
$game_deck_compatibility = get_field( 'game_deck_compatibility' );

get_header();
?>

<div id="main-content" class="shinka-page">
    <div class="shinka-game__background" style="background-image: url('<?php echo esc_url( $game_featured_image ); ?>');"></div>
		<div class="shinka-wrapper">
            <div class="shinka-game__main-info">
                <div class="shinka-game__cover">
                    <a href="<?php echo esc_url( $game_cover['url'] ); ?>" class="shinka-game__cover-link post-img-link">
                        <img class="shinka-game__cover-image" src="<?php echo esc_url( $game_cover['sizes']['medium_large'] ); ?>">
                    </a>
                </div>
                <div class="shinka-game__heading">
                    <h1 class="shinka-game__title"><?php echo esc_html( $game_title ); ?></h1>
                    <?php if ( $game_genres ): ?>
                    <div class="shinka-game__genres">
                        <?php foreach( $game_genres as $game_genre ): ?>
                        <span class="shinka-game__genre-text"><?php echo esc_html( $game_genre ); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="shinka-game__content">
                <div class="shinka-game__wrapper">
                    <div class="shinka-game__description shinka-post__content">
                        <?php the_content(); ?>
                    </div>
                    <div class="shinka-game__info">
                        <h3>Informazioni</h3>
                        <div class="shinka-game__info-table">
                            <?php if ( $game_developers ): ?>
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Sviluppatore</span>
                                <?php
                                foreach ( $game_developers as $game_developer ):
								$developer_permalink = get_permalink( $game_developer->ID );
								$developer_name = get_the_title( $game_developer->ID ); ?>
                                <span class="shinka-game__info-detail">
								    <a href="<?php echo esc_url( $developer_permalink ); ?>"><?php echo esc_html( $developer_name ); ?></a>
                                </span>
								<?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <?php if ( $game_publishers ): ?> 
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Publisher</span>
                                <?php
                                foreach ( $game_publishers as $game_publisher ):
								$publisher_permalink = get_permalink( $game_publisher->ID );
								$publisher_name = get_the_title( $game_publisher->ID ); ?>
                                <span class="shinka-game__info-detail">
								    <a href="<?php echo esc_url( $publisher_permalink ); ?>"><?php echo esc_html( $publisher_name ); ?></a>
                                </span>
								<?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Data di uscita</span>
                                <?php if ( $game_release_date ): ?>
                                <span class="shinka-game__info-detail"><?php echo esc_html( $game_release_date ); ?></span>
                                <?php else: ?>
                                <span class="shinka-game__info-detail">Da determinare</span>
                                <?php endif; ?>    
                            </div>
                            <?php if ( $game_platforms ): ?>
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Piattaforme</span>
                                <span class="shinka-game__info-detail">
                                <?php $platforms_string = implode( ', ', $game_platforms );
								    echo $platforms_string; 
							    ?>
                                </span>
                            </div>
                            <?php endif; ?>
                            <?php if ( $game_original_title ): ?>
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Titolo originale</span>
                                <span class="shinka-game__info-detail"><?php echo esc_html( $game_original_title ); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if ( $game_rating ): ?> 
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">PEGI</span>
                                <span class="shinka-game__info-detail"><?php echo esc_html( $game_rating ); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if ( $game_languages ): ?>
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Lingue</span>
                                <span class="shinka-game__info-detail"><?php echo esc_html( $game_languages ); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if ( $game_deck_compatibility ): ?>
                            <div class="shinka-game__info-content">
                                <span class="shinka-game__info-bold">Compatibilità Steam Deck</span>
                                <span class="shinka-game__info-detail"><?php echo esc_html( $game_deck_compatibility ); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h3 class="shinka__in-post-title">Ultime notizie su <?php echo esc_html( $game_title ); ?></h3>
                    <?php
                    $game_query = array(
                        'posts_per_page'    => '-1',
                        'post_type'		    => 'post',
                        'post_status'       => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => 'article_games',
                                'value' => '"' . get_the_ID() . '"',
                                'compare' => 'LIKE',
                            )
                        ),
                    );
                    $the_query = new WP_Query( $game_query );
                    ?>
                    <div class="shinka-archive__timeline-content shinka-game__timeline-content">
                        <?php if( $the_query->have_posts() ):
                            while( $the_query->have_posts() ) : $the_query->the_post();
                                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                $post_permalink = get_the_permalink();
                                $post_title = $post->post_title;
                                $post_excerpt = get_the_excerpt();
                                $post_category = get_post_meta( $post->ID, 'article_category', true );
                        ?>
                        <article class="shinka-archive__timeline-news">
                            <div class="shinka-archive__timeline-news-media">
                                <a href="<?php echo esc_url( $post_permalink ); ?>">
                                    <img class="shinka-archive__timeline-news-image" src="<?php echo esc_url( $featured_img_url ); ?>">
                                </a>
                            </div>
                            <div class="shinka-archive__timeline-news-text">
                                <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_category ); ?></p>
                                <h2 class="shinka-archive__timeline-news-title">
                                    <a href="<?php echo esc_url( $post_permalink ); ?>"><?php echo esc_html( $post_title ); ?></a>
                                </h2>
                                <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata"><?php echo esc_html( get_the_date( 'j F Y, H:i' ) ); ?></p>
                                <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_excerpt ); ?></p>
                            </div>
                        </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php else: ?>
                            <p>Nessun contenuto trovato.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                get_sidebar();
                ?>
            </div>
		</div>
	</div>
<?php
get_footer();
