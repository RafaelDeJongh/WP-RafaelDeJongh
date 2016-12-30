<?php
/**
 * Template part for displaying posts on the front page loop.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Rafael_De_Jongh
 */
if (($wp_query->current_post +1) != ($wp_query->post_count)) { 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("projects");?>>
	<?php if(has_post_thumbnail() && !is_single()){?>
		<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf(the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php }?>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header>
</article>
<?php } else { ?>
<article id="mprojects" class="projects">
	<div id="mprojects-thumbnail" class="post-thumbnail">
			<a href="<?php echo get_permalink(get_option( 'page_for_posts' ));?>" title="Check Out More Projects!" rel="bookmark"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/more.png" alt="Check Out More Projects!"></a>
	</div>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo get_permalink(get_option( 'page_for_posts' ));?>" title="Check Out More Projects!" rel="bookmark">Check Out More Projects!</a></h2>
	</header>
</article>
<?php } ?>