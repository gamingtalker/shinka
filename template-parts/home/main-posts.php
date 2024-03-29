<?php
/**
 * Main posts query.
 */
$main_posts = array(
	'posts_per_page'    => 3,
	'post_type'		    => 'post',
	'post_status'       => 'publish',
	'ignore_sticky_posts' => true,
    'order' => 'DESC',
	'meta_query' => array(
		array(
			'key' => 'article_hot',
			'value' => '1'
		)
	),
);
$main_posts_query = new WP_Query( $main_posts );
?>
<?php if ( $main_posts_query->have_posts() ) : ?>
<!-- Home main posts -->
<div class="shinka-home__main-news">
    <?php 
    for( $i=0; $i<1; $i++ ) {
        $main_posts_query->the_post();
        $post_permalink = get_the_permalink();
        $post_title = $post->post_title;
        $article_category = get_field( 'article_category' );
        /**
         * Post thumbnail variables.
         */
        $post_thumbnail_id = get_post_thumbnail_id();
        $post_thumbnail_size = 'medium_large';
        $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
    ?>
    <article class="shinka-home__main-story shinka-home__top-news">
        <a href="<?php echo esc_url( the_permalink() ); ?>">
            <figure class="shinka-home__main-thumb">
            <?php
                the_post_thumbnail(
                    'medium',
                    [
                        'class' => 'shinka-home__news-image shinka-utils__crop-16x9',
                        'srcset' => wp_get_attachment_image_url( $post_thumbnail_id, 'medium' ) . ' 700w, ' .
                                    $post_thumbnail_src . ' 1000w, ',
                        'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                        'alt' => esc_attr( $post_title ),
                    ],
                );
            ?>
            </figure>
        </a>
        <div class="shinka-home__news-text">
            <div class="shinka-home__news-category">
                <?php if ( $article_category ) : ?>
                    <p><?php echo esc_html( $article_category ); ?></p>
                <?php else: ?>
                    <p>Notizia</p>
                <?php endif; ?>
            </div>
            <a href="<?php echo esc_url( the_permalink() ); ?>">
                <h2 class="shinka-home__news-title shinka-home__news-title-big"><?php echo esc_html( $post_title ); ?></h2>
            </a>
        </div>
    </article>
    <?php 
        }
        endif;
        if ( $main_posts_query->have_posts() ) :
    ?>
    <div class="shinka-home__sec-story-group">
        <?php 
            for ( $i=0; $i<2; $i++ ) {
                $main_posts_query->the_post();
                $post_permalink = get_the_permalink();
                $post_title = $post->post_title; 
                $article_category = get_field( 'article_category' );
                /**
                 * Post thumbnail variables.
                 */
                $post_thumbnail_id = get_post_thumbnail_id();
                $post_thumbnail_size = 'medium_large';
                $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
        ?>
        <article class="shinka-home__sec-story shinka-home__top-news">
            <a href="<?php echo esc_url( the_permalink() ); ?>">
                <figure class="shinka-home__main-thumb">
                    <?php
                    the_post_thumbnail(
                        'medium',
                        [
                            'class' => 'shinka-home__news-image shinka-utils__crop-16x9',
                            'srcset' => wp_get_attachment_image_url( $post_thumbnail_id, 'medium' ) . ' 700w, ' .
                                        $post_thumbnail_src . ' 1000w, ',
                            'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                            'alt' => esc_attr( $post_title ),
                        ],
                    );
                    ?>
                </figure>
            </a>
            <div class="shinka-home__news-text">
                <div class="shinka-home__news-category">
                    <?php if ( $article_category ) : ?>
                        <p><?php echo esc_html( $article_category ); ?></p>
                    <?php else: ?>
                        <p>Notizia</p>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url( the_permalink() ); ?>">
                    <h2 class="shinka-home__news-title shinka-home__news-title-small"><?php echo esc_html( $post_title ); ?></h2>
                </a>
            </div>
        </article>
        <?php 
            }
            endif; 
        ?>
    </div>
    <?php wp_reset_postdata(); ?>
</div>
