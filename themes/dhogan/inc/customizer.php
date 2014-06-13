<?php
/**
 * dhogan Theme Customizer
 *
 * @package dhogan
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dhogan_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'dhogan_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dhogan_customize_preview_js() {
	wp_enqueue_script( 'dhogan_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'dhogan_customize_preview_js' );

// add settings to create various social media text areas.
add_action('customize_register', 'dhogan_customize');
function dhogan_customize($wp_customize) {

    $wp_customize->add_section( 'dhogan_socmed_settings', array(
        'title'          => 'Social Media Settings',
        'priority'       => 35,
    ) );

    $wp_customize->add_setting( 'twitter', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'twitter', array(
        'label'   => __( 'Twitter url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'facebook', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'facebook', array(
        'label'   => __( 'Facebook url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'googleplus', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'googleplus', array(
        'label'   => __( 'Google + url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'linkedin', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'linkedin', array(
        'label'   => __( 'LinkedIn url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'behance', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'behance', array(
        'label'   => __( 'Behance url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'flickr', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'flickr', array(
        'label'   => __( 'Flickr url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'pinterest', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'pinterest', array(
        'label'   => __( 'Pinterest url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'instagram', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'instagram', array(
        'label'   => __( 'instagram url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'youtube', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'youtube', array(
        'label'   => __( 'YouTube url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'vimeo', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'vimeo', array(
        'label'   => __( 'Vimeo url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'tumblr', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'tumblr', array(
        'label'   => __( 'Tumblr url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
    
    $wp_customize->add_setting( 'dribbble', array(
        'default'        => '',
    ) );
    $wp_customize->add_control( 'dribbble', array(
        'label'   => __( 'Dribbble url:', 'dhogan_basic' ),
        'section' => 'dhogan_socmed_settings',
        'type'    => 'text',
    ) );
}

