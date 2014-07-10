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
        add_image_size('index-thumb', 290, 9999, false);
        add_image_size('gallery-thumb', 295, 9999, false);
        add_image_size('single-thumb', 9999, 650, false);

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


remove_shortcode('gallery');
add_shortcode('gallery', 'custom_size_gallery');

function custom_size_gallery($attr) {
    // Change size here - medium, large, full
    $attr['size'] = 'gallery-thumb';
    return gallery_shortcode($attr);
}
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
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dhogan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dhogan_scripts() {

  if (is_page_template('page-templates/page-nosidebar.php') || ! is_active_sidebar( 'sidebar-1' )) {
    wp_enqueue_style( 'my-sinome-layout-style' , get_template_directory_uri() . '/style.css');
	} else {
    wp_enqueue_style( 'my-sinome-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}

	wp_enqueue_style( 'dhogan-style', get_stylesheet_uri(), 'null' );

	wp_enqueue_script( 'dhogan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	// custom js + masonry
	wp_enqueue_script( 'dhogan-enquire', get_stylesheet_directory_uri() . '/js/enquire.min.js', false, '20140530', true );
	wp_enqueue_script( 'dhogan-custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery','jquery-masonry'), '20140529', true );

  // FontAwesome
  wp_enqueue_style('dhogan_fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');

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

// add CUSTOM post type to front page query
function dhogan_cutom_post_isFront( $query ) {
  if ( ! is_admin() && $query->is_main_query() ) {
    if ($query->is_home() || $query->is_search() ) {
    $query->set( 'post_type', array( 'post', 'photo' ) );
    }
  }
}
add_action( 'pre_get_posts', 'dhogan_cutom_post_isFront' );


//CUSTOM CUSTOM POST TYPE
add_action( 'init', 'dhogan_custom_postType_init' );
function dhogan_custom_postType_init() {
	$labels = array(
		'name'               => 'Photos',
		'singular_name'      => 'Photo',
		'menu_name'          => 'Photos',
		'name_admin_bar'     => 'Photo',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Photo',
		'new_item'           => 'New Photo',
		'edit_item'          => 'Edit Photo',
		'view_item'          => 'View Photo',
		'all_items'          => 'All Photos',
		'search_items'       => 'Search Photos',
		'parent_item_colon'  => 'Parent Photos',
		'not_found'          => 'No Photos Found',
		'not_found_in_trash' => 'No Photos Found in trash',
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-camera',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'photos' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'photo', $args );
}

//CUSTOM TAXONOMY
add_action( 'init', 'dhogan_custom_taxonomies', 0 );
function dhogan_custom_taxonomies() {
// PHOTO CATEGORIES
	$labels = array(
		'name'              => _x( 'Photo Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Photo Location', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Photo Categories' ),
		'all_items'         => __( 'All Photo Categories' ),
		'parent_item'       => __( 'Parent Photo Categories' ),
		'parent_item_colon' => __( 'Parent Photo Categories:' ),
		'edit_item'         => __( 'Edit Photo Category' ),
		'update_item'       => __( 'Update Photo Category' ),
		'add_new_item'      => __( 'Add New Photo Category' ),
		'new_item_name'     => __( 'New Photo Category' ),
		'menu_name'         => __( 'Photo Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Photo' ),
	);
	register_taxonomy( 'Photo', array( 'photo' ), $args );

// PHOTO LOCATION
	$labels = array(
		'name'              => _x( 'Photo Location', 'taxonomy general name' ),
		'singular_name'     => _x( 'Photo Location', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Photo Location' ),
		'all_items'         => __( 'All Photo Location' ),
		'parent_item'       => __( 'Parent Photo Location' ),
		'parent_item_colon' => __( 'Parent Photo Location:' ),
		'edit_item'         => __( 'Edit Photo Location' ),
		'update_item'       => __( 'Update Photo Location' ),
		'add_new_item'      => __( 'Add New Photo Location' ),
		'new_item_name'     => __( 'New Photo Location' ),
		'menu_name'         => __( 'Photo Location' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'Photo' ),
	);
	register_taxonomy( 'Location', array( 'photo' ), $args );
}

// goes and resets permalinks
function my_rewrite_flush() {

    dhogan_custom_postType_init();

    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

// Custom length of excerpt 40 char instead of normal 55
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// global Read More link
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<i class="fa fa-paragraph fa-1"></i><a class="moretag" href="'. get_permalink($post->ID) . '"> More</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

//REMOVED the excerpt '{...}' text
function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');



show_admin_bar( true );