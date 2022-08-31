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
    $game_summary = get_field( 'game_summary' );
    $game_genres = get_field( 'game_genres' );
    $game_release_date = get_field( 'game_release_date' );
    $game_temp_date = get_field( 'game_temp_date' );
    $game_platforms = get_field( 'game_platforms' );
    $game_developers = get_field( 'game_developer' );
    $game_publishers = get_field( 'game_publisher' );
    $game_cover = get_field( 'game_cover' );
    $game_original_title = get_field( 'game_original_title' );
    $game_rating = get_field( 'game_rating' );
    $game_languages = get_field( 'game_languages' );
    $game_deck_compatibility = get_field( 'game_deck_compatibility' );
    $game_slug = get_post_field( 'post_name' );
    $counter = 0;

    get_header();
?>

<div id="main-content" class="shinka-page">
    <div class="shinka-game__background" style="background-image: url('<?php echo esc_url( $game_featured_image ); ?>');"></div>
		<div class="shinka-wrapper">
            <?php 
                get_template_part(
                    'template-parts/game/game-info',
                    null,
                    array(
                        'game_cover' => $game_cover,
                        'game_title' => $game_title,
                        'game_genres' => $game_genres,
                    ),
                );
            ?>
            <div class="shinka-game__content">
                <div class="shinka-game__wrapper">
                    <div class="shinka-game__description shinka-post__content">
                        <?php the_content(); ?>
                    </div>
                    <?php
                        get_template_part(
                            'template-parts/game/game-fields',
                            null,
                            array(
                                'game_developers' => $game_developers,
                                'game_publishers' => $game_publishers,
                                'game_release_date' => $game_release_date,
                                'game_temp_date' => $game_temp_date,
                                'game_platforms' => $game_platforms,
                                'game_original_title' => $game_original_title,
                                'game_rating' => $game_rating,
                                'game_languages' => $game_languages,
                                'game_deck_compatibility' => $game_deck_compatibility,
                            ),
                        );
                        get_template_part( 
                            'template-parts/game/game-timeline',
                            null,
                            array(
                                'game_title' => $game_title,
                                'game_slug' => $game_slug,
                            )
                        );
                    ?>
                </div>
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "VideoGame",
                    "name": "<?php echo esc_html( $game_title ); ?>",
                    "url": "<?php echo esc_url( $game_permalink ); ?>",
                    "image": "<?php echo esc_url( $game_featured_image ); ?>",
                    "description": "<?php echo esc_html( $game_summary ); ?>",
                    "gamePlatform": [<?php foreach ( $game_platforms as $game_platform ) : if ( $counter == count( $game_platforms ) - 1 ) { ?>"<?php echo esc_html( $game_platform ); ?>"<?php } else { echo esc_html( '"' . $game_platform . '", ' ); } $counter = $counter + 1; endforeach; ?>]
                }
                </script>
                <?php get_sidebar(); ?>
            </div>
		</div>
	</div>
<?php
get_footer();
