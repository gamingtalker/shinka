<?php 
    $is_archive_search = false;
?>
<div class="shinka-post__heading">
    <?php if ( is_author() ) :
        $author_name = $args['author_name'];
    ?>
    <h2>Articoli di <?php echo esc_html( $author_name ); ?></h2>
    <?php
        elseif ( is_post_type_archive( 'giochi' ) ) : ?>
            <h1 class="shinka-post__title">Giochi</h1>
        <?php
        elseif ( is_search() ) : ?>
            <h1 class="shinka-post__title"><?php printf( esc_html__( 'Risultati per: %s', 'shinka' ), get_search_query() ); ?></h1>
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
                <form role="search" method="get" id="search-form" class="shinka-search__form" action="/">
                    <input type="search" class="shinka-search__field" placeholder="<?php echo esc_attr( 'Cerca...', 'placeholder', 'radiate' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
                    <button type="submit" class="shinka-search__submit" value="<?php echo esc_attr( 'Cerca', 'submit button', 'radiate' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
                        </svg>
                    </button>
                </form>
            </div>
        <?php
        endif;
        if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            $post_title = get_the_title();
            $post_url = get_the_permalink();
            $post_image = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
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
        <div class="shinka-archive__timeline-news">
            <?php if ( $post_image ) : ?>
            <div class="shinka-archive__timeline-news-media">
                <a href="<?php echo esc_url( $post_url ); ?>">
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
            <?php endif; ?>
            <div class="shinka-archive__timeline-news-text">
                <?php if ( $timeline_post_type == 'post' ) : ?>
                <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_category ); ?></p>
                <?php endif; ?>
                <h2 class="shinka-archive__timeline-news-title">
                    <a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a>
                </h2>
                <?php if ( $timeline_post_type == 'post' ) : ?>
                <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata"><time datetime="<?php the_time( 'c' ); ?>"><?php echo $post_date; ?></time></p>
                <?php if ( $post_excerpt ) : ?>
                    <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata"><?php echo esc_html( $post_excerpt ); ?></p>
                <?php 
                    endif;
                    endif;
                ?>
            </div>
        </div>
        <?php 
            endwhile;
            else:
        ?>
        <p class="shinka-inline__paragraph"><?php esc_html_e( 'Nessun risultato trovato. Vuoi provare a cercare di nuovo?', 'shinka' ); ?></p>
	    <?php endif; ?>
        <div class="shinka-archive__pagination">
            <?php the_posts_pagination( array(
                'prev_text' => __( '<', 'shinka' ),
                'next_text' => __( '>', 'shinka' ),
            ) ); ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
