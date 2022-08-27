<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="dns-prefetch preconnect" href="https://analytics.gamingtalker.it" crossorigin>
	<link rel="dns-prefetch preconnect" href="https://www.google-analytics.com" crossorigin>
	<link rel="dns-prefetch preconnect" href="https://cdn.iubenda.com" crossorigin>
	<link rel="dns-prefetch preconnect" href="https://www.googletagmanager.com" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<script>
	/* Dark mode. */
	let colorMode = localStorage.getItem("colorMode");
	switch (colorMode) {
		case "dark":
			document.body.classList.add("dark-mode");
		case "light":
			// Do nothing. It's default.
			break;
		default:
			if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
				localStorage.setItem("colorMode", "dark");
				document.body.classList.add("dark-mode");
			}
			else {
				localStorage.setItem("colorMode", "light");
			}
			break;
	}
</script>
<div class="shinka-body">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shinka' ); ?></a>
	<header id="header" class="shinka-header">
		<div class="shinka-header__container">
			<a href="<?php echo get_home_url(); ?>" class="shinka-header__logo" title="GamingTalker">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1224.49 108.6"><defs><style>.cls-1{fill:#ff1414;}.cls-2{fill:#fff;}</style></defs>
					<g>
						<g>
							<path class="cls-1" d="M69,129.3a59.31,59.31,0,0,1-22.32-4A41.84,41.84,0,0,1,21.18,96.75,51.49,51.49,0,0,1,20.36,75,61.32,61.32,0,0,1,28.1,53.25,64.48,64.48,0,0,1,42.91,36,67,67,0,0,1,63,24.67a70.27,70.27,0,0,1,23.73-4q14,0,24.39,4.65a39.77,39.77,0,0,1,16.68,13.5l-17.74,14.4a30.91,30.91,0,0,0-11.16-9.08,33.7,33.7,0,0,0-14.38-2.92,40.66,40.66,0,0,0-14.2,2.47,39.51,39.51,0,0,0-12,7,38.69,38.69,0,0,0-8.74,10.65A40.84,40.84,0,0,0,45,75a34.3,34.3,0,0,0,.35,13.42,25.14,25.14,0,0,0,5.34,10.73,26.65,26.65,0,0,0,9.68,7,32.9,32.9,0,0,0,13.32,2.55,45.41,45.41,0,0,0,14.41-2.4A51.09,51.09,0,0,0,102.6,98.4l11,17.55a74.91,74.91,0,0,1-21.54,10A83.39,83.39,0,0,1,69,129.3Zm22.87-16.5,6.27-39.45h22.2L113.61,116Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-1" d="M116.72,127.5l63.34-105h24l30.41,105H209L185.15,34.8h9.75l-53.28,92.7ZM143.85,105l9.08-18.45h54.3L210.6,105Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-1" d="M241.67,127.5l16.68-105h20.1l32.93,74.1H300.73L356.3,22.5h20.25l-16.68,105H337.22l10.83-70h4.5l-44.74,58.8H297L270.5,57.45h4.95L264.32,127.5Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-1" d="M381.17,127.5l16.68-105H422.3l-16.68,105Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-1" d="M426.62,127.5l16.68-105h20.1l49.94,75.6h-9.75l12-75.6h24l-16.68,105h-20.1L452.88,51.9h9.75l-12,75.6Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-1" d="M594.48,129.3a59.31,59.31,0,0,1-22.32-4,41.79,41.79,0,0,1-25.53-28.57A51.33,51.33,0,0,1,545.81,75a61.11,61.11,0,0,1,7.73-21.75A64.84,64.84,0,0,1,568.35,36a67,67,0,0,1,20.1-11.33,70.33,70.33,0,0,1,23.74-4q13.93,0,24.38,4.65a39.71,39.71,0,0,1,16.68,13.5l-17.74,14.4a30.8,30.8,0,0,0-11.15-9.08A33.75,33.75,0,0,0,610,41.25a40.56,40.56,0,0,0-14.19,2.47,39.56,39.56,0,0,0-12,7,38.87,38.87,0,0,0-8.74,10.65A40.61,40.61,0,0,0,570.41,75a34.3,34.3,0,0,0,.34,13.42,25,25,0,0,0,5.35,10.73,26.61,26.61,0,0,0,9.67,7,32.91,32.91,0,0,0,13.33,2.55,45.3,45.3,0,0,0,14.4-2.4A51,51,0,0,0,628,98.4l11,17.55a75,75,0,0,1-21.53,10A83.52,83.52,0,0,1,594.48,129.3Zm22.87-16.5,6.27-39.45h22.2L639.05,116Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-2" d="M677.71,127.5l13.54-85.2h-33.6l3.15-19.8h91.5l-3.15,19.8h-33.6L702,127.5Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-2" d="M725.87,127.5l63.33-105h24l30.41,105h-25.5L794.29,34.8H804l-53.27,92.7ZM753,105l9.08-18.45h54.3L819.74,105Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-2" d="M850.81,127.5l16.69-105H892l-13.54,85.2h52.35l-3.15,19.8Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-2" d="M937.66,127.5l16.69-105H978.5l-16.69,105Zm25.42-24,3.25-28L1025,22.5h27L999.1,71.25,983,85.65Zm46.43,24-30.1-45.6,18.66-17.4,39.94,63Z" transform="translate(-19.59 -20.7)"/><path class="cls-2" d="M1072.16,108h57.15l-3.1,19.5h-81.3l16.68-105h79.35L1137.85,42h-55.2Zm5.09-43.35h50.55l-3,19h-50.55Z" transform="translate(-19.59 -20.7)"/>
							<path class="cls-2" d="M1141.81,127.5l16.68-105h45.45q14.1,0,23.58,4.57a28.35,28.35,0,0,1,13.66,13.13q4.18,8.55,2.33,20.25a41.84,41.84,0,0,1-8.78,20.32,43.52,43.52,0,0,1-17.8,12.9,65.86,65.86,0,0,1-25,4.43h-32.1l12.77-10.5-6.34,39.9Zm30.36-37.2-9.27-11.55h30.75q11.1,0,17.57-4.8a20,20,0,0,0,7.84-13.5q1.38-8.7-3.56-13.43t-16-4.72H1168.7l12.93-11.55Zm36.54,37.2-20.35-38.1h26.1l20.35,38.1Z" transform="translate(-19.59 -20.7)"/>
						</g>
					</g>
				</svg>
			</a>
			<nav id="header-menu" class="shinka-header__navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' 	=> 'menu-header',
						'menu_id'        	=> 'main-menu',
						'container_class'	=> 'shinka-header__navigation-container',
						'menu_class'		=> 'shinka-header__menu'
					)
				);
				?>
			</nav>
			<div class="shinka-header__sns">
				<a href="https://www.facebook.com/gamingtalker.it" rel="nofollow noopener" target="_blank" class="shinka-header__sns-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
						<path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
					</svg>
				</a>
				<a href="https://twitter.com/gamingtalker" rel="nofollow noopener" target="_blank" class="shinka-header__sns-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
						<path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
					</svg>
				</a>
				<a href="https://www.instagram.com/gamingtalker" rel="nofollow noopener" target="_blank" class="shinka-header__sns-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
						<path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
					</svg>
				</a>
				<a href="https://t.me/gamingtalker" rel="nofollow noopener" target="_blank" class="shinka-header__sns-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
						<path d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"/>
					</svg>
				</a>
			</div>
			<div class="shinka-header__dark-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
					<path d="M32 256c0-123.8 100.3-224 223.8-224c11.36 0 29.7 1.668 40.9 3.746c9.616 1.777 11.75 14.63 3.279 19.44C245 86.5 211.2 144.6 211.2 207.8c0 109.7 99.71 193 208.3 172.3c9.561-1.805 16.28 9.324 10.11 16.95C387.9 448.6 324.8 480 255.8 480C132.1 480 32 379.6 32 256z"/>
				</svg>
			</div>
			<div class="shinka-header__search-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
					<path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/>
				</svg>
			</div>
			<div class="shinka-header__menu-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
					<path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/>
				</svg>
			</div>
			<div id="search-bar" class="shinka-search__wrapper">
				<?php get_search_form( true ); ?>
			</div>
		</div>
	</header>
