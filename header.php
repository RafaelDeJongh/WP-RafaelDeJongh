<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Rafael_De_Jongh
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="author" content="Rafaël De Jongh">
<meta name="keywords" content="rafael de jongh,rafael,de jongh,web,web developer,web designer,developer,designer,belgian,belgium,3D artist,2D artist,artist,3D,2D">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<!--Rev Slider Start-->
<?php if (is_front_page()){echo '<div id="rslider">' . do_shortcode('[rev_slider alias="banner"]') . '</div>';}?>
<!--Rev Slider End-->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content','rafael-de-jongh'); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if (has_custom_logo()) : 
				the_custom_logo();
				else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
			<?php
			$description = get_bloginfo('description','display');
			if ($description || is_customize_preview()) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif;
			endif;?>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'primary','menu_id' => 'primary-menu')); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">