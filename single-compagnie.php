<?php
/**
 * The template for displaying author page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
$company_name = get_the_title();
$company_biography = apply_filters( 'the_content', get_the_content() );
$company_logo = get_field( 'company_logo' );
$company_games = get_field( 'company_games' );
$company_office = get_field( 'company_office' );
$company_foundation = get_field( 'company_foundation' );

$default_posts_per_page = get_option( 'posts_per_page' );
$timeline_posts = array(
	'posts_per_page'    => $default_posts_per_page,
	'post_type'		    => 'giochi',
	'post_status'       => 'publish',
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => 'game_developer',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE',
        )
    ),
);
$the_query = new WP_Query( $timeline_posts );

get_header();
?>
<div id="main-content" class="shinka-page">
    <div class="shinka-wrapper">
        <div class="shinka-post__main">
            <div class="shinka-archive__pre-content">
                <div class="shinka-archive__pre-content-image">
                    <img src="<?php echo esc_url( $company_logo ); ?>" alt="Logo di <?php echo esc_html( $company_name ); ?>" />
                </div>
                <div class="shinka-archive__pre-content-main">
                    <div class="shinka-archive__pre-content-meta">
                        <h1 class="shinka-archive__pre-content-title"><?php echo esc_html( $company_name ); ?></h1>
                    </div>
                    <?php if ( $company_biography ): ?>
                    <?php echo ( $company_biography ); ?>
                    <?php else: ?>
                        <p class="shinka-archive__pre-content-text">Descrizione non disponibile.</p>
                    <?php endif; ?>
                    <?php if ( $company_office || $company_foundation ): ?>
                    <div class="shinka-archive__pre-content-details">
                        <?php if ( $company_office ): ?>
                        <div class="shinka-archive__pre-content-details-field">
                            <span>Sede</span>: <?php echo esc_html( $company_office ); ?>
                        </div>
                        <?php endif; ?>
                        <?php if ( $company_foundation ): ?>
                        <div class="shinka-archive__pre-content-details-field">
                            <span>Anno di fondazione</span>: <?php echo esc_html( $company_foundation ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="shinka-post__heading">
                <h2>Giochi di <?php echo esc_html( $company_name ); ?></h2>
            </div>
            <div class="shinka-archive__timeline-container">
                <div class="shinka-archive__timeline-content">
                    <?php if( $the_query->have_posts() ):
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                        $post_title = get_the_title();
                        $post_url = get_the_permalink();
                        $post_image = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                        $game_cover = get_field( 'game_cover' );
                    ?>
                        <div class="shinka-archive__timeline-news">
                            <?php if ( $post_image ): ?>
                            <div class="shinka-archive__timeline-news-media">
                                <a href="<?php echo esc_url( $post_url ); ?>">
                                    <img class="shinka-archive__timeline-news-image" src="<?php echo esc_url( $game_cover['sizes']['thumbnail'] ); ?>">
                                </a>
                            </div>
                            <?php endif; ?>
                            <div class="shinka-archive__timeline-news-text">
                                <h2 class="shinka-archive__timeline-news-title">
                                    <a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a>
                                </h2>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                        <p>Nessun gioco trovato.</p>
                    <div class="shinka-archive__pagination">
                        <?php the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( '<', 'shinka' ),
                            'next_text' => __( '>', 'shinka' ),
                        ) ); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
