<?php
    $timeline_query = $args['timeline_query'];
    $default_posts_per_page = $args['default_posts_per_page'];
?>
<!-- Home secondary timeline -->
<div class="shinka-archive__timeline-container shinka-archive__timeline-container-secondary shinka-home__timeline-container">
    <div class="shinka-archive__timeline-content">
    <?php if( $timeline_query->have_posts() ):
        for( $i=0; $i<( $default_posts_per_page - 7 ); $i++ ) {
            $timeline_query->the_post();
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
            $post_permalink = get_the_permalink();
            $post_title = $post->post_title;
            $article_category = get_field( 'article_category' );
            $article_excerpt = get_the_excerpt();
            $post_date = get_the_date( 'j F Y, H:i' );
            /**
             * Post thumbnail variables.
             */
            $post_thumbnail_id = get_post_thumbnail_id();
            $post_thumbnail_size = 'medium';
            $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
            $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
            $post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
    ?>
        <article class="shinka-archive__timeline-news">
            <?php if( $featured_img_url ): ?>
            <div class="shinka-archive__timeline-news-media">
                <a href="<?php echo esc_url( the_permalink() ); ?>">
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
                <?php 
                    if( $article_category ): 
                ?>
                <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata"><?php echo esc_html( $article_category ); ?></p>
                <?php endif; ?>
                <h2 class="shinka-archive__timeline-news-title">
                    <a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
                </h2>
                <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata"><time datetime="<?php the_time( 'c' ); ?>"><?php echo $post_date; ?></time></p>
                <?php
                    if( $article_excerpt ):
                ?>
                <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata"><?php echo esc_html( $article_excerpt ); ?></p>
                <?php endif; ?>
            </div>
        </article>
    <?php 
        } endif;
    ?>
    </div>
    <?php if ( !wp_is_mobile() ): ?>
        <aside id="sidebar" class="shinka-sidebar">
            <?php dynamic_sidebar( 'categories-sidebar' ); ?>
        </aside>
    <?php endif; 
    ?>
</div>
