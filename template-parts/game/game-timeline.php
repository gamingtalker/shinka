<?php 
    $game_title = $args['game_title'];
    $game_slug = $args['game_slug'];
?>
<h3 class="shinka__in-post-title">Ultime notizie su <?php echo esc_html( $game_title ); ?></h3>
<?php
$game_query = array(
    'posts_per_page'    => '100',
    'post_type'		    => 'post',
    'post_status'       => 'publish',
    'tag' => $game_slug,
    /* 'meta_query' => array(
        array(
            'key' => 'article_games',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE',
        ),
    ), */
);
$the_query = new WP_Query( $game_query );
?>
<!-- Game posts -->
<div class="shinka-archive__timeline-content shinka-game__timeline-content">
    <?php if( $the_query->have_posts() ):
        while( $the_query->have_posts() ) : $the_query->the_post();
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
            $post_permalink = get_the_permalink();
            $post_title = $post->post_title;
            $post_excerpt = get_the_excerpt();
            $post_category = get_post_meta( $post->ID, 'article_category', true );
    ?>
    <article class="shinka-archive__timeline-news">
        <div class="shinka-archive__timeline-news-media">
            <a href="<?php echo esc_url( $post_permalink ); ?>">
            <figure class="shinka-utils__image-wrapper">
            <?php 
            the_post_thumbnail(
                'medium',
                [
                    'class' => 'shinka-archive__timeline-image shinka-utils__crop-16x9',
                    'srcset' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 700w, ' .
                                wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium_large' ) . ' 1000w, ',
                    'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                    'alt' => esc_html( $post_title ),
                    'loading' => 'lazy'
                ],
            );
            ?>
            </figure>
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
