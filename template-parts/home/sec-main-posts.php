<?php
    $sub_feat_posts = array(
        'posts_per_page'    => 4,
        'post_type'		    => 'post',
        'post_status'       => 'publish',
        'ignore_sticky_posts' => true,
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => 'article_hot_sec',
                'value' => '1'
            )
        ),
    );
    $sub_main_posts_query = new WP_Query( $sub_feat_posts );
?>
<?php if ( $sub_main_posts_query->have_posts() ) : ?>
<!-- Home secondary hot posts -->
<div class="shinka-home__hot-news-container">
    <?php 
        while ( $sub_main_posts_query->have_posts() ) : $sub_main_posts_query->the_post();
            $post_permalink = get_the_permalink();
            $post_title = $post->post_title;
            $post_thumbnail_id = get_post_thumbnail_id();
            $post_thumbnail_size = 'medium';
            $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
    ?>
    <div class="shinka-home__hot-news">
        <article class="shinka-home__hot-news-content">
            <a href="<?php echo esc_url( $post_permalink ); ?>">
                <figure class="shinka-utils__image-wrapper">
                <?php 
                    the_post_thumbnail(
                        'medium',
                        [
                            'class' => 'shinka-home__hot-news-image shinka-utils__crop-16x9',
                            'srcset' => $post_thumbnail_src . ' 700w, ' .
                                        wp_get_attachment_image_url( $post_thumbnail_id, 'hot_post_thumbnail' ) . ' 1000w, ',
                            'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                            'alt' => esc_attr( $post_title ),
                            'loading' => 'lazy'
                        ],
                    );
                ?>
                </figure>
            </a>
            <div class="shinka-home__hot-news-text">
                <a href="<?php echo esc_url( $post_permalink ); ?>">
                    <h3 class="shinka-home__hot-news-title"><?php echo esc_html( $post_title ); ?></h3>
                </a>
            </div>
        </article>
    </div>
    <?php 
        endwhile;
        wp_reset_postdata();
    ?>
</div>
<?php endif; ?>
