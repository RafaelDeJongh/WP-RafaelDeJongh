<?php
header("refresh:10;url=/index.php");
/**
 * The template for displaying 404 pages (not found).
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Rafael_De_Jongh
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404–This page can not be found!', 'rafael-de-jongh' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rafael-de-jongh' ); ?></p>
					<?php get_search_form();?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();