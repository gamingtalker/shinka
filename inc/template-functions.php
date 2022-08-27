<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shinka_body_classes( $classes ) {
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'main-sidebar' ) && ! is_active_sidebar( 'popular-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'shinka_body_classes' );

/**
 * Custom error message on login.
 */
function shinka_login_error() {
	return 'Wrong login credentials.';
}
add_filter( 'login_errors', 'shinka_login_error' );

/**
 * Link logo on the login page to the website.
 */
function shinka_login_logo() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'shinka_login_logo' );

/**
 * Wrap YouTube embeds to make them responsive.
 */
function shinka_embed_wrapper( $html, $url, $attr, $post_id )  {
	if ( strpos( $html, 'youtube' ) !== false ) {
		return '<div class="embed-wrapper">' . $html . '</div>';
	}
	return $html;
}
add_filter( 'embed_oembed_html', 'shinka_embed_wrapper', 10, 4 );

/**
 * Enqueue Magnific Popup.
 */
function shinka_magnific_popup() {
	wp_enqueue_script( 'shinka-mfp', get_template_directory_uri() . '/assets/vendor/magnific-popup/mfp.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_style( 'shinka-mfp-style', get_template_directory_uri() . '/assets/vendor/magnific-popup/mfp.css', false, 'all' );	
}
add_action ( 'get_footer', 'shinka_magnific_popup' );

/**
 * Make Magnific Popup work.
 */
function shinka_magnific_popup_data( $content ) {
	global $post; // Get post.
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i"; // Search for image in link (set from editor).
	$replace = '<a$1href=$2$3.$4$5 class="post-img-link">'; // Replace pattern with a new class.
	$content = preg_replace( $pattern, $replace, $content ); // Replace content.
	return $content; // Echo content.
}
add_filter( 'the_content', 'shinka_magnific_popup_data' );

/** 
 * Disable default WordPress sitemap.
*/
add_filter( 'wp_sitemaps_enabled', '__return_false' );

/**
 * Reset images with a caption in post.
 * 
 * Solution source: https://wordpress.stackexchange.com/questions/89221/removing-inline-styles-from-wp-caption-div
 */
add_shortcode( 'wp_caption', 'shinka_image_caption_shortcode' );
add_shortcode( 'caption', 'shinka_image_caption_shortcode' );
function shinka_image_caption_shortcode( $attr, $content = null ) {
    if ( ! isset( $attr['caption'] ) ) {
        if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
        }
    }

    $output = apply_filters( 'img_caption_shortcode', '', $attr, $content );
    if ( $output != '' )
    return $output;

    extract( shortcode_atts( array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    ), $attr ) );

    if ( 1 > ( int ) $width || empty( $caption ) ) {
		return $content;
	}

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	
	return '<div class="shinka-post__captioned-image">' . do_shortcode( $content ) . '<figcaption class="shinka-post__image-caption">' . $caption . '</figcaption></div>';
}

/**
 * Remove links from admin bar.
 */
function shinka_remove_admin_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_menu( 'customize' );
}
add_action( 'admin_bar_menu', 'shinka_remove_admin_bar', 999 );

/**
 * Pagination.
 */
function shinka_pagination() {
    if ( get_query_var( 'paged' ) ) {
        $paged = get_query_var( 'paged' );
    } elseif ( get_query_var( 'page' ) ) {
        $paged = get_query_var( 'page' );
    } else {
        $paged = 1;
    }
    $pagination = paginate_links( array(
        'base'     => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ),
        'format'   => '?paged=%#%',
        'current'  => max( 1, $paged ),
        'prev_text' => '<',
        'next_text' => '>',
    ) );
    echo '<nav class="navigation pagination" aria-label="Articoli">' . $pagination . '</nav>';
}

/**
 * Enqueue CSS for TinyMCE.
 */
function shinka_add_editor_styles() {
    add_editor_style( trailingslashit( get_template_directory_uri() ) . 'assets/admin/style/editor.css' );
}
add_action( 'admin_init', 'shinka_add_editor_styles' );

/**
 * Custom CSS for the login page.
 */
function shinka_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/admin/style/login.css" />';
}
add_action( 'login_head', 'shinka_custom_login' );

/**
 * Yoast SEO filters.
 */
function shinka_yoast_twitter_image( $image ) {
    if ( !$image ) {
        $image = esc_url( get_the_post_thumbnail_url( get_the_ID() ) );
    }
    return $image;
};
add_filter( 'wpseo_twitter_image', 'shinka_yoast_twitter_image' );

function shinka_yoast_twitter_description( $description ) {
    // If the page is a post, get the excerpt.
    if ( !$description && ( is_archive() || is_singular( 'post' ) ) ) {
        $description = esc_html( get_the_excerpt() );
    }
    // If it's a game, however, we get its summary (set via ACF).
    else if ( !$description && ( is_singular( 'giochi' ) ) ) {
        $description = esc_html( get_field( 'game_summary' ) );
    }
    return $description;
}
add_filter( 'wpseo_twitter_description', 'shinka_yoast_twitter_description' );

/**
 * Disable comments RSS feeds.
 */
add_filter( 'feed_links_show_comments_feed', '__return_false' );
