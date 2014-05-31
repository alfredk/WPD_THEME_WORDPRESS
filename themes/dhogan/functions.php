<?php
/**
 * dhogan functions and definitions
 *
 * @package dhogan
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'dhogan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dhogan_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dhogan, use a find and replace
	 * to change 'dhogan' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dhogan', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	      add_image_size('large-thumb', 1060, 650, true);
        add_image_size('index-thumb', 320, 9999, false);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dhogan' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'video') );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dhogan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // dhogan_setup
add_action( 'after_setup_theme', 'dhogan_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dhogan_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'dhogan' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'dhogan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dhogan_scripts() {
	wp_enqueue_style( 'dhogan-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dhogan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

		// custom js + masonry
		wp_enqueue_script( 'dhogan-enquire', get_stylesheet_directory_uri() . '/js/enquire.min.js', false, '20140530', true );
		wp_enqueue_script( 'dhogan-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery','jquery-masonry'), '20140529', true );


	wp_enqueue_script( 'dhogan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dhogan_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
