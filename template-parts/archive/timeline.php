<?php $is_archive_search = false; ?>
<div class="shinka-post__heading">
    <?php 
        if ( is_author() ) :
            $author_name = $args['author_name'];
    ?>
    <h2>Articoli di <?php echo esc_html( $author_name ); ?></h2>
    <?php elseif ( is_post_type_archive( 'giochi' ) ) : ?>
        <h1 class="shinka-post__title">Giochi</h1>
        <?php elseif ( is_search() ) : ?>
            <h1 class="shinka-post__title"><?php printf( esc_html( 'Risultati per: %s' ), get_search_query() ); ?></h1>
        <?php
        $is_archive_search = true;
        else:
            the_archive_title( '<h1 class="shinka-post__title">', '</h1>' );
        endif;
    ?>
</div>
<!-- Archive content -->
<div class="shinka-archive__timeline-container">
    <div class="shinka-archive__timeline-content">
        <?php if ( $is_archive_search ) : ?>
            <div class="shinka-inline-search__wrapper">
                <?php get_search_form(); ?>
            </div>
        <?php
            endif;
            if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                $post_title = get_the_title();
                $post_url = get_the_permalink();
                $post_image = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                // Check if post is a game.
                if ( get_post_type() == 'giochi' ) :
                    $game_summary = get_field( 'game_summary' );
                    $timeline_post_type = 'giochi';
                endif;
                // Check if post isn't a game.
                if ( get_post_type() == 'post' ) :
                    $post_excerpt = get_the_excerpt();
                    $post_date = get_the_date( 'j F Y, H:i' );
                    $post_category = get_field( 'article_category' );
                    $timeline_post_type = 'post';
                endif;
        ?>
        <article class="shinka-archive__timeline-news">
            <?php if ( $post_image ) : ?>
            <div class="shinka-archive__timeline-news-media">
                <a href="<?php echo esc_url( $post_url ); ?>">
                    <figure class="shinka-utils__image-wrapper">
                        <img src="<?php echo esc_url( $post_image ); ?>" class="shinka-archive__timeline-image shinka-utils__crop-16x9" alt="<?php echo esc_attr( $post_title ); ?>" loading="lazy">
                    </figure>
                </a>
            </div>
            <?php endif; ?>
            <div class="shinka-archive__timeline-news-text">
                <?php 
                    if ( $timeline_post_type == 'post' ) :
                        if ( $post_category ): 
                ?>
                <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_category ); ?></p>
                <?php endif; ?>
                <h2 class="shinka-archive__timeline-news-title">
                    <a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a>
                </h2>
                <?php endif; ?>
                <?php if ( $timeline_post_type == 'post' ) : ?>
                <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata"><time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo esc_html( $post_date ); ?></time></p>
                <?php if ( $post_excerpt ) : ?>
                    <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_excerpt ); ?></p>
                <?php 
                    endif;
                    endif;
                ?>
            </div>
        </article>
        <?php 
            endwhile;
            else:
        ?>
        <p class="shinka-inline__paragraph"><?php esc_html_e( 'Nessun risultato trovato. Vuoi provare a cercare di nuovo?', 'shinka' ); ?></p>
	    <?php endif; ?>
        <div class="shinka-archive__pagination">
            <?php 
                the_posts_pagination( array(
                    'prev_text' => __( '<', 'shinka' ),
                    'next_text' => __( '>', 'shinka' ),
                ));
            ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
