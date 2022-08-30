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

$timeline_posts = array(
	'posts_per_page'    => $default_posts_per_page,
	'post_type'		    => 'post',
	'post_status'       => 'publish',
	'ignore_sticky_posts' => true,
	'nopaging'          => false,
	'no_found_rows' => true,
    'order' => 'DESC'
);
$timeline_query = new WP_Query( $timeline_posts );

?>
<div id="main-content" class="shinka-page">
    <div class="shinka-wrapper">
        <?php get_template_part( 'template-parts/home/main-posts' ); ?>
        <?php get_template_part( 'template-parts/home/sec-main-posts' ); ?>
        <h1 class="shinka-home__title">Ultime notizie</h1>
        <?php 
            get_template_part( 
                'template-parts/home/main-timeline',
                null,
                array(
                    'timeline_query' => $timeline_query,
                ),
            ); 
        ?>
        <?php get_template_part( 'template-parts/home/video-timeline' ); ?>
        <?php 
            get_template_part( 
                'template-parts/home/sec-timeline',
                null,
                array(
                    'timeline_query' => $timeline_query,
                    'default_posts_per_page' => $default_posts_per_page,
                ),
            ); 
        ?>
        <div class="shinka-archive__load-more-button">
            <a href="/notizie/" class="shinka-archive__load-more-link">Altre notizie</a>
        </div>
        <?php if ( wp_is_mobile() ) :
            get_sidebar();
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
