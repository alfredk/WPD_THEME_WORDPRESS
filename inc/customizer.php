<?php
/**
 * Beny Theme Customizer
 *
 * @package Beny
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beny_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'beny_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beny_customize_preview_js() {
	wp_enqueue_script( 'beny_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'beny_customize_preview_js' );

// add settings to create various social media text areas.
add_action('customize_register', 'beny_customize');
function beny_customize($wp_customize) {

    $wp_customize->add_section( 'beny_socmed_settings', array(
        'title'          => 'Social Media Settings',
        'priority'       => 35,
    ) );

    $wp_customize->add_setting( 'twitter', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'twitter', array(
        'label'   => __( 'Twitter url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'facebook', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'facebook', array(
        'label'   => __( 'Facebook url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'googleplus', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'googleplus', array(
        'label'   => __( 'Google + url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'linkedin', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'linkedin', array(
        'label'   => __( 'LinkedIn url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'flickr', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'flickr', array(
        'label'   => __( 'Flickr url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'pinterest', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'pinterest', array(
        'label'   => __( 'Pinterest url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'instagram', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'instagram', array(
        'label'   => __( 'instagram url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'youtube', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'youtube', array(
        'label'   => __( 'YouTube url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'vimeo', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'vimeo', array(
        'label'   => __( 'Vimeo url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'tumblr', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'tumblr', array(
        'label'   => __( 'Tumblr url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'dribble', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'dribble', array(
        'label'   => __( 'Dribble url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'github', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( 'github', array(
        'label'   => __( 'Github url:', 'beny_basic' ),
        'section' => 'beny_socmed_settings',
        'type'    => 'text',
    ) );
}

