<?php
$video_posts = array(
	'posts_per_page'    => 4,
	'post_type'		    => 'post',
	'post_status'       => 'publish',
	'ignore_sticky_posts' => true,
	'nopaging'          => false,
	'no_found_rows' => true,
    'order' => 'DESC',
    'tag'=> 'video'
);
$video_query = new WP_Query( $video_posts );

if ( $video_query->have_posts() ) :
?>
<!-- Home video timeline -->
<div class="shinka-timeline__extra">
    <div class="shinka-timeline__extra-content">
        <div class="shinka-timeline__extra-heading">
            <h2 class="shinka-timeline__extra-heading-title">Video</h2>
            <a href="/tag/video/" class="shinka-timeline__extra-heading-link">Tutti i video ></a>
        </div>
        <div class="shinka-timeline__extra-news-wrapper">
            <?php 
                while ( $video_query->have_posts() ) : $video_query->the_post();
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); 
                $post_permalink = get_the_permalink();
                $post_title = $post->post_title;
            ?>
            <article class="shinka-timeline__extra-news">
                <a href="<?php echo esc_url( $post_permalink ); ?>">
                    <figure class="shinka-utils__image-wrapper">
                    <?php
                    the_post_thumbnail(
                        'medium',
                        [
                            'class' => 'shinka-timeline__extra-news-image shinka-utils__crop-16x9',
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
                <div class="shinka-timeline__extra-news-text">
                    <a href="<?php echo esc_url( $post_permalink ); ?>">
                        <h3 class="shinka-timeline__extra-news-title"><?php echo esc_html( $post_title ); ?></h3>
                    </a>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>
