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
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'shinka_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shinka_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'shinka_pingback_header' );

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
