<?php
/**
 * Template part for displaying results in search pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Rafael_De_Jongh
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("projectsearch"); ?>>
	<header class="entry-header">
	<?php if(has_post_thumbnail()){?>
		<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf(the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php }?>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>
</article><!-- #post-## -->