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
    <?php 
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_image = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                $post_url = get_the_permalink();
                $post_title = $post->post_title;
                $post_excerpt = get_the_excerpt();
                $post_category = get_post_meta( $post->ID, 'article_category', true );
                $post_date = get_the_date( 'j F Y, H:i' );
    ?>
    <article class="shinka-archive__timeline-news">
        <?php if ( $post_image ): ?>
        <div class="shinka-archive__timeline-news-media">
            <a href="<?php echo esc_url( $post_url ); ?>">
                <figure class="shinka-utils__image-wrapper">
                    <img src="<?php echo esc_url( $post_image ); ?>" class="shinka-archive__timeline-image shinka-utils__crop-16x9" alt="<?php echo esc_attr( $post_title ); ?>" loading="lazy">
                </figure>
            </a>
        </div>
        <?php endif; ?>
        <div class="shinka-archive__timeline-news-text">
            <?php if ( $post_category ): ?>
            <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_category ); ?></p>
            <?php endif; ?>
            <h2 class="shinka-archive__timeline-news-title">
                <a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a>
            </h2>
            <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata"><time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo esc_html( $post_date ); ?></time></p>
            <?php if ( $post_excerpt ) : ?>
                <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_excerpt ); ?></p>
            <?php endif; ?>
        </div>
    </article>
    <?php 
        endwhile;
        wp_reset_postdata();
        else: 
    ?>
        <p>Nessun contenuto trovato.</p>
    <?php endif; ?>
</div>
