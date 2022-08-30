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
	return esc_url( home_url() );
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
	echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri()  . '/assets/admin/style/login.css" />';
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

/**
 * Remove width and height set in images.
 */
function shinka_remove_img_attr( $html ) {
    return preg_replace( '/(width|height)="\d+"\s/', "", $html );
}
add_filter( 'post_thumbnail_html', 'shinka_remove_img_attr' );

/**
 * Set maximum srcset width.
 */
function max_srcset_image_wd() {
	return 900; // Max srcset width.
}
add_filter( 'max_srcset_image_width', 'max_srcset_image_wd', 10 , 2 );

/**
 * Add content to <head> via wp_head().
 */
function shinka_header_metadata() { ?>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-16x16.png">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico">
    <!-- iOS / macOS metadata -->
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="GamingTalker">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <!-- Android metadata -->
    <meta name="application-name" content="GamingTalker">
    <meta name="theme-color" content="#000000">
    <!-- Windows metadata -->
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon-180x180.png">
    <meta name="msapplication-TileColor" content="#000000">

<?php }
add_action( 'wp_head', 'shinka_header_metadata' );
add_action( 'admin_head', 'shinka_header_metadata' );

function shinka_header_script() { ?>
	<!-- Load iubenda script -->
	<script type="text/javascript">
		var _iub = _iub || [];
		_iub.csConfiguration = {"askConsentAtCookiePolicyUpdate":true,"consentOnContinuedBrowsing":false,"cookiePolicyInOtherWindow":true,"floatingPreferencesButtonDisplay":"bottom-right","floatingPreferencesButtonHover":true,"invalidateConsentWithoutLog":true,"perPurposeConsent":true,"purposes":"1,2,3,4,5","siteId":1392326,"whitelabel":false,"cookiePolicyId":69782818,"lang":"it", "banner":{ "acceptButtonDisplay":true,"closeButtonRejects":true,"customizeButtonDisplay":true,"explicitWithdrawal":true,"fontSize":"16px","listPurposes":true,"position":"bottom","rejectButtonDisplay":true,"slideDown":false,"content":"GamingTalker utilizza i cookie per migliorare l'esperienza d'utilizzo del sito. Per maggiori informazioni, consulta la <a href=\"//www.iubenda.com/privacy-policy/69782818?an=no&amp;s_ck=false&amp;newmarkup=yes\" class=\"iubenda-cs-privacy-policy-lnk\">privacy policy</a> e la <a href=\"//www.iubenda.com/privacy-policy/69782818/cookie-policy?an=no&amp;s_ck=false&amp;newmarkup=yes\" class=\"iubenda-cs-cookie-policy-lnk\">cookie policy</a>.\n<br><br>\nPuoi liberamente prestare, rifiutare o revocare il tuo consenso, in qualsiasi momento, accedendo al pannello delle preferenze. Puoi acconsentire all’utilizzo di tali tecnologie utilizzando il pulsante “Accetta”. Chiudendo questa informativa, continui senza accettare.","customizeButtonCaption":"Scopri di più" }};
	</script>
	<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>

	<!-- Load Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('require', 'displayfeatures');
		ga('create', 'UA-127312747-1', 'auto');
		ga('set', 'anonymizeIp', true);
		ga('send', 'pageview');
	</script>
	<!-- Google Analytics end -->

	<!-- Load Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WJ857G8');</script>
	<!-- Google Tag Manager end -->

	<!-- Load Matomo -->
	<script>
	var _paq = window._paq = window._paq || [];
	/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	_paq.push(["setCookieDomain", "*.www.gamingtalker.it"]);
	_paq.push(['trackPageView']);
	_paq.push(['enableLinkTracking']);
	(function() {
		var u="//analytics.gamingtalker.it/";
		_paq.push(['setTrackerUrl', u+'matomo.php']);
		_paq.push(['setSiteId', '1']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	})();
	</script>
	<noscript><p><img src="//analytics.gamingtalker.it/matomo.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p></noscript>
	<!-- End Matomo Code -->
<?php }
add_action( 'wp_head', 'shinka_header_script' );

/**
 * Add content to wp_footer().
 */
function shinka_footer_script() { ?>
    <!-- Begin comScore Tag -->
    <script class="_iub_cs_activate" type="text/plain">
    var _comscore = _comscore || [];
    _comscore.push({ c1: "2", c2: "36803024" });
    (function() {
        var s = document.createElement("script"), el = document.getElementsByTagName("script")[0]; s.async = true;
        s.src = "https://sb.scorecardresearch.com/cs/36803024/beacon.js";
        el.parentNode.insertBefore(s, el);
    })();
    </script>
    <!-- End comScore Tag -->
<?php }
add_action( 'wp_footer', 'shinka_footer_script', 100 );

/**
 * Gutenberg styles.
 */
function shinka_gutenberg_styles() {
    // If page uses blocks, don't do anything.
	if ( has_blocks() ) {
		return;
	}
    // Otherwise dequeue Gutenberg's style.
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'shinka_gutenberg_styles' );
