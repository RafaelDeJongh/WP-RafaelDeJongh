<?php
/**
 * The template for displaying all single posts.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Rafael_De_Jongh
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		while (have_posts()) : the_post();
			get_template_part('template-parts/content',get_post_format());
			//the_post_navigation();
			//Custom Post Nav
			?>
				<nav id="posts-nav" class="navigation post-navigation">
					<?php $nextPost = get_next_post(true);
					if($nextPost){?>
						<div class="nav-next nav-box next">
							<?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID,array(256,256));
							next_post_link('%link',"$nextthumbnail%title",true);?>
						</div>
					<?php } $prevPost = get_previous_post(true);
					if($prevPost){?>
						<div class="nav-previous nav-box previous">
							<?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID,array(256,256));
							previous_post_link('%link',"$prevthumbnail%title",true);?>
						</div>
						<?php } ?>
				</nav>
			<?php
			//Custom Post Nav
			// If comments are open or we have at least one comment,load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
