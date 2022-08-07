<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header();
?>

	<div id="main-content" class="shinka-page">
		<div class="shinka-wrapper">
			<div class="shinka__error-404">
				<h1>404 - Pagina non trovata</h1>
				<p>Se sei capitato qui vuol dire che la pagina che stai cercando non esiste. Controlla l'URL, usa la ricerca o torna alla pagina principale.</p>
				<a href="<?php echo esc_url( home_url() ); ?>">Torna alla home</a>
			</div>
		</div>
	</div>
<?php
get_footer();
