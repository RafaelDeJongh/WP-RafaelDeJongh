<?php
/**
 * Template part for displaying posts.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Rafael_De_Jongh
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("projects");?>>
	<?php if(has_post_thumbnail() && !is_single()){?>
		<!-- Thumbnail -->
		<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf(the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
		</div>
		<!-- Thumbnail -->
	<?php }?>
	<header class="entry-header">
		<?php
			if(is_single()){
				the_title('<h1 class="entry-title">','</h1>');
			}else{
				the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink()) . '" rel="bookmark">', '</a></h2>');
			}
		?>
		<div class="entry-meta">
			<h6 class="updated updated_on"><?php Rafael_De_Jongh_posted_on(); ?></h6>
		</div>
	</header><!-- .entry-header -->
<?php if(is_single()){?>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rafael-de-jongh' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rafael-de-jongh' ),
				'after'  => '</div>',
			) );
		?>
	</div><?php }?><!-- .entry-content -->
</article><!-- #post-## -->