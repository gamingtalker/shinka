<?php
    $video_posts = array(
        'posts_per_page'    => 4,
        'post_type'		    => 'post',
        'post_status'       => 'publish',
        'ignore_sticky_posts' => true,
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
                    $post_image = get_the_post_thumbnail_url( get_the_ID(), 'medium' ); 
                    $post_url = get_the_permalink();
                    $post_title = $post->post_title;
            ?>
            <article class="shinka-timeline__extra-news">
                <?php if ( $post_image ): ?>
                <a href="<?php echo esc_url( $post_url ); ?>">
                    <figure class="shinka-utils__image-wrapper">
                        <img src="<?php echo esc_url( $post_image ); ?>" class="shinka-timeline__extra-news-image shinka-utils__crop-16x9" alt="<?php echo esc_attr( $post_title ); ?>" loading="lazy">
                    </figure>
                </a>
                <?php endif; ?>
                <div class="shinka-timeline__extra-news-text">
                    <a href="<?php echo esc_url( $post_url ); ?>">
                        <h3 class="shinka-timeline__extra-news-title"><?php echo esc_html( $post_title ); ?></h3>
                    </a>
                </div>
            </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php endif; ?>
