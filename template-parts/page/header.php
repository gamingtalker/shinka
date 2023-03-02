<?php 
    /**
     * Page thumbnail variables.
     */
    $post_thumbnail_id = get_post_thumbnail_id();
    $post_thumbnail_size = 'medium';
    $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
    $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
    $post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );

    $post_title = get_the_title();
?>
<!-- Page meta -->
<div class="shinka-post__heading">
    <h1 class="shinka-post__title"><?php echo esc_html( $post_title ); ?></h1>
</div>
<!-- Page content -->
<div class="shinka-post__content-wrapper">
    <div class="shinka-post__content-container">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="shinka-post__thumbnail">
            <figure class="shinka-post__thumbnail-wrapper">
                <?php
                    the_post_thumbnail(
                        'medium',
                        [
                            'class' => 'shinka-post__thumbnail-img shinka-utils__crop-16x9',
                            'srcset' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 700w, ' .
                                        wp_get_attachment_image_url( get_post_thumbnail_id(), 'post_thumbnail' ) . ' 1000w, ',
                            'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                            'alt' => esc_attr( $post_title ),
                        ],
                    );
                ?>
                <?php if ( $post_thumbnail_caption ) : ?>
                    <figcaption><?php echo esc_html( $post_thumbnail_caption ); ?></figcaption>
                <?php endif; ?>
            </figure>
        </div>
        <?php endif; ?>
