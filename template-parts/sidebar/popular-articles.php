<?php
/**
 * The sidebar containing the most popular posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>

<aside id="sidebar" class="shinka-sidebar">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</aside>
