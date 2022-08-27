<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();

$default_posts_per_page = get_option( 'posts_per_page' );

$main_posts = array(
	'posts_per_page'    => 3,
	'post_type'		    => 'post',
	'post_status'       => 'publish',
	'ignore_sticky_posts' => true,
	'nopaging'          => false,
	'no_found_rows' => true,
    'order' => 'DESC',
	'meta_query' => array(
		array(
			'key' => 'article_hot',
			'value' => '1'
		)
	),
);
$main_posts_query = new WP_Query( $main_posts );

$sub_feat_posts = array(
    'posts_per_page'    => 4,
    'post_type'		    => 'post',
    'post_status'       => 'publish',
    'ignore_sticky_posts' => true,
    'nopaging'          => false,
    'no_found_rows' => true,
    'meta_query' => array(
        array(
            'key' => 'article_hot_sec',
            'value' => '1'
        )
    ),
);
$sub_main_posts_query = new WP_Query( $sub_feat_posts );

$timeline_posts = array(
	'posts_per_page'    => 20,
	'post_type'		    => 'post',
	'post_status'       => 'publish',
	'ignore_sticky_posts' => true,
	'nopaging'          => false,
	'no_found_rows' => true,
    'order' => 'DESC'
);
$timeline_query = new WP_Query( $timeline_posts );

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

?>
<div id="main-content" class="shinka-page">
    <div class="shinka-wrapper">
        <div class="shinka-home__main-news">
        <?php if( $main_posts_query->have_posts() ):
            for( $i=0; $i<1; $i++ ) {
                $main_posts_query->the_post();
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
                $post_permalink = get_the_permalink();
                $post_title = $post->post_title; 
                $article_category = get_field( 'article_category' );
                /**
                 * Post thumbnail variables.
                 */
                $post_thumbnail_id = get_post_thumbnail_id();
                $post_thumbnail_size = 'medium_large';
                $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
                $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
                $post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
            ?>
            <article class="shinka-home__main-story shinka-home__top-news">
                <a href="<?php echo esc_url( the_permalink() ); ?>">
                    <figure class="shinka-home__main-thumb">
                        <img class="shinka-home__news-image shinka-utils__crop-16x9" src="<?php echo esc_url( $post_thumbnail_src ); ?>"
                            srcset="<?php echo esc_attr( $post_thumbnail_srcset ); ?>"
                            sizes="(max-width: 768px) 800px, (max-width: 1400px) 1400px, (max-width: 2000px) 2000px"
                            alt="<?php the_title(); ?>"
                        >
                    </figure>
                </a>
                <div class="shinka-home__news-text">
                    <div class="shinka-home__news-category">
                        <?php if ( $article_category ): ?>
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
            <?php } ?>
        <?php endif; ?>
            <div class="shinka-home__sec-story-group">
                <?php if( $main_posts_query->have_posts() ):
                for( $i=0; $i<2; $i++ ) {
                    $main_posts_query->the_post();
                    $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
                    $post_permalink = get_the_permalink();
                    $post_title = $post->post_title; 
                    $article_category = get_field( 'article_category' );
                    /**
                     * Post thumbnail variables.
                     */
                    $post_thumbnail_id = get_post_thumbnail_id();
                    $post_thumbnail_size = 'medium_large';
                    $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
                    $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
                    $post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
                ?>
                <article class="shinka-home__sec-story shinka-home__top-news">
                    <a href="<?php echo esc_url( the_permalink() ); ?>">
                        <figure class="shinka-home__main-thumb">
                            <img class="shinka-home__news-image shinka-utils__crop-16x9" src="<?php echo esc_url( $post_thumbnail_src ); ?>"
                                srcset="<?php echo esc_attr( $post_thumbnail_srcset ); ?>"
                                sizes="(max-width: 768px) 400px, (max-width: 1024px) 100vw, 500px"
                                alt="<?php the_title(); ?>"
                            >
                        </figure>
                    </a>
                    <div class="shinka-home__news-text">
                        <div class="shinka-home__news-category">
                            <?php if ( $article_category ): ?>
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
                <?php }
                endif; 
                ?>
            </div>
        </div>
        <?php if( $sub_main_posts_query->have_posts() ): ?>
        <div class="shinka-home__hot-news-container">
            <?php 
                while( $sub_main_posts_query->have_posts() ) : $sub_main_posts_query->the_post();
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' ); 
                $post_permalink = get_the_permalink();
                $post_title = $post->post_title;
            ?>
            <div class="shinka-home__hot-news">
                <div class="shinka-home__hot-news-content">
                    <a href="<?php echo esc_url( the_permalink() ); ?>">
                        <figure class="shinka-utils__image-wrapper">
                            <img class="shinka-home__hot-news-image shinka-utils__crop-16x9" src="<?php echo esc_url( $featured_img_url ); ?>">
                        </figure>
                    </a>
                    <div class="shinka-home__hot-news-text">
                        <a href="<?php echo esc_url( the_permalink() ); ?>">
                            <h3 class="shinka-home__hot-news-title"><?php echo esc_html( $post_title ); ?></h3>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <h1 class="shinka-home__title">Ultime notizie</h1>
        <div class="shinka-archive__timeline-container shinka-home__timeline-container">
            <div class="shinka-archive__timeline-content">
            <?php if( $timeline_query->have_posts() ):
                for( $i=0; $i<7; $i++ ) {
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
                    $post_thumbnail_size = 'medium_large';
                    $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
                    $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
                    $post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
            ?>
                <article class="shinka-archive__timeline-news">
                    <?php if( $featured_img_url ): ?>
                    <div class="shinka-archive__timeline-news-media">
                        <a href="<?php echo esc_url( the_permalink() ); ?>">
                            <figure class="shinka-utils__image-wrapper">
                                <img class="shinka-archive__timeline-news-image shinka-utils__crop-16x9" src="<?php echo esc_url( $featured_img_url ); ?>">
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
                    <?php dynamic_sidebar( 'popular-sidebar' ); ?>
                </aside>
            <?php endif;
            ?>
        </div>
        <?php 
            if( $video_query->have_posts() ):
        ?>
        <div class="shinka-timeline__extra">
            <div class="shinka-timeline__extra-content">
                <div class="shinka-timeline__extra-heading">
                    <h2 class="shinka-timeline__extra-heading-title">Video</h2>
                    <a href="/tag/video/" class="shinka-timeline__extra-heading-link">Tutti i video ></a>
                </div>
                <div class="shinka-timeline__extra-news-wrapper">
                    <?php 
                        while( $video_query->have_posts() ) : $video_query->the_post();
                        $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); 
                        $post_permalink = get_the_permalink();
                        $post_title = $post->post_title;
                    ?>
                    <article class="shinka-timeline__extra-news">
                        <a href="<?php echo esc_url( $post_permalink ); ?>">
                            <figure class="shinka-utils__image-wrapper">
                                <img class="shinka-timeline__extra-news-image shinka-utils__crop-16x9" src="<?php echo esc_url( $featured_img_url ); ?>">
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
        <div class="shinka-archive__timeline-container shinka-archive__timeline-container-secondary shinka-home__timeline-container">
            <div class="shinka-archive__timeline-content">
            <?php if( $timeline_query->have_posts() ):
                for( $i=0; $i<( 20 - 7 ); $i++ ) {
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
                    $post_thumbnail_size = 'medium_large';
                    $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
                    $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
                    $post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
            ?>
                <article class="shinka-archive__timeline-news">
                    <?php if( $featured_img_url ): ?>
                    <div class="shinka-archive__timeline-news-media">
                        <a href="<?php echo esc_url( the_permalink() ); ?>">
                            <figure class="shinka-utils__image-wrapper">
                                <img class="shinka-archive__timeline-news-image shinka-utils__crop-16x9" src="<?php echo esc_url( $featured_img_url ); ?>">
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
        <div class="shinka-archive__load-more-button">
            <a href="/notizie/" class="shinka-archive__load-more-link">Altre notizie</a>
        </div>
        <?php if ( wp_is_mobile() ):
            get_sidebar();
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
