<?php
/**
 * Rafael De Jongh functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Rafael_De_Jongh
 */
if (! function_exists('rafael_de_jongh_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook,which
 * runs before the init hook. The init hook is too late for some features,such
 * as indicating support for post thumbnails.
 */
function rafael_de_jongh_setup(){
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rafael De Jongh,use a find and replace
	 * to change 'rafael-de-jongh' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('rafael-de-jongh',get_template_directory() . '/languages');
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support,we declare that this theme does not use a
	 * hard-coded <title> tag in the document head,and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(512,288,true); 
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'primary' => esc_html__('Primary','rafael-de-jongh'),
	));
	/*
	 * Switch default core markup for search form,comment form,and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5',array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
	
	// Set up the Wordpress Custom Logo Support
	add_theme_support('custom-logo',array(
	'height'      => 80,
	'width'       => 300,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array('site-title','site-description'),
	));
	// Set up the WordPress core custom background feature.
	/*add_theme_support('custom-background',apply_filters('rafael_de_jongh_custom_background_args',array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));*/
}
endif;
add_action('after_setup_theme','rafael_de_jongh_setup');
/**
 * Set the content width in pixels,based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rafael_de_jongh_content_width(){
	$GLOBALS['content_width'] = apply_filters('rafael_de_jongh_content_width',800);
}
add_action('after_setup_theme','rafael_de_jongh_content_width',0);
/**
 * Enqueue scripts and styles.
 */
function rafael_de_jongh_scripts(){
	wp_enqueue_style('rafael-de-jongh-style',get_stylesheet_uri());
	wp_enqueue_script('rafael-de-jongh-navigation',get_template_directory_uri() . '/js/navigation.js',array(),'20151215',true);
	wp_enqueue_script('rafael-de-jongh-skip-link-focus-fix',get_template_directory_uri() . '/js/skip-link-focus-fix.js',array(),'20151215',true);
	if (is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts','rafael_de_jongh_scripts');
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Custom Functions.
 */
add_action('wp_enqueue_scripts','enqueue_styles_scripts');
function enqueue_styles_scripts(){ 
	wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
	wp_enqueue_script('theme-navigation',get_template_directory_uri() . '/js/custom-scripts.js',array('jquery'));
} 
add_action('wp_before_admin_bar_render','remove_admin_bar_links',999);
function remove_admin_bar_links(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('wp-logo');          //Remove the WordPress logo
	$wp_admin_bar->remove_node('about');            //Remove the about WordPress link
	$wp_admin_bar->remove_node('wporg');            //Remove the WordPress.org link
	$wp_admin_bar->remove_node('documentation');    //Remove the WordPress documentation link
	$wp_admin_bar->remove_node('support-forums');   //Remove the support forums link
	$wp_admin_bar->remove_node('feedback');         //Remove the feedback link
	$wp_admin_bar->remove_node('comments');         //Remove the comments link
	$wp_admin_bar->remove_node('my-account');       //Remove the user details tab
	$wp_admin_bar->remove_node('customize');        //Remove customizer menu
	$wp_admin_bar->remove_node('revslider');        //Remove rev slider menu
}
add_action('get_header','remove_admin_login_header');
function remove_admin_login_header(){
	remove_action('wp_head','_admin_bar_bump_cb');
}
add_filter('wpseo_pre_analysis_post_content','mysite_opengraph_content');
function mysite_opengraph_content($val){
	return '<img src="https://www.rafaeldejongh.com/wp-content/uploads/2016/04/RafaelDeJongh-FB.jpg" alt="Rafaël De Jongh - Web Developer | 3D Artist"/>' . $val;
}
add_shortcode('cyear','current_year');
function current_year($atts){
	return date_diff(date_create("{$atts['birthdate']}"),date_create('today'))->y;
}
/**
 * Remove Query Strings From Static Resources
 */
function _remove_script_version($src){
	$parts = explode('?ver',$src);
	return $parts[0];
}
add_filter('script_loader_src','_remove_script_version',15,1);
add_filter('style_loader_src','_remove_script_version',15,1);