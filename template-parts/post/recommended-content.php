<?php
$recommended_posts = array(
    'posts_per_page'    => 4,
    'post_type'		    => 'post',
    'post_status'       => 'publish',
    'ignore_sticky_posts' => true,
    'nopaging'          => false,
    'no_found_rows' => true,
    'meta_query' => array(
        array(
            'key' => 'article_recommended',
            'value' => '1'
        )
    ),
);
$recommended_query = new WP_Query( $recommended_posts );

if ( $recommended_query->have_posts() ) :
?>
<!-- Recommended content -->
<h3 class="shinka__in-post-title">Contenuti consigliati</h3>
<div class="shinka__recommended-content">
    <?php while ( $recommended_query->have_posts() ) :
        $recommended_query->the_post();
        $post_id = $post->post_id;
        $post_permalink = get_the_permalink();
        $post_title = $post->post_title;
        $post_thumbnail_id = get_post_thumbnail_id();
        $post_thumbnail_size = 'medium';
        $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, 'medium' );
        $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'medium_large' );
    ?>
    <article class="shinka__recommended-content-post">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="shinka__recommended-content-image">
            <a href="<?php echo esc_url( $post_permalink ); ?>">
                <figure class="shinka-utils__image-wrapper">
                    <?php 
                    the_post_thumbnail(
                        'medium',
                        [
                            'class' => 'shinka-post__thumbnail-img shinka-utils__crop-16x9',
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
        <div class="shinka__recommended-content-text">
            <a href="<?php echo esc_url( $post_permalink ); ?>">
                <h3 class="shinka__recommended-content-title"><?php echo esc_html( $post_title ); ?></h3>
            </a>
        </div>
    </article>
    <?php 
        endwhile;
        wp_reset_postdata();
    ?>
</div>
<?php endif; ?>
