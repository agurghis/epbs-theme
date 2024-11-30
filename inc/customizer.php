<?php
/**
 * EPBS Theme Customizer
 *
 * @package EPBS
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function epbs_customize_register( $wp_customize ) {
    // Existing code...
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'epbs_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'epbs_customize_partial_blogdescription',
            )
        );
    }

    // Add new Footer section
    $wp_customize->add_section( 'epbs_footer_section', array(
        'title'    => __( 'Footer', 'epbs' ),
        'priority' => 160, // Typically placed near the end of the Customizer
    ) );

    // Add setting for footer text
    $wp_customize->add_setting( 'epbs_footer_text', array(
        'default'           => sprintf( 
            __( 'Theme: %1$s by %2$s.', 'epbs' ), 
            'epbs', 
            '<a href="https://alexgurghis.com/">Alex Gurghis</a>' 
        ),
        'sanitize_callback' => 'wp_kses_post', // Allows HTML
        'transport'         => 'refresh',
    ) );

    // Add control for footer text
    $wp_customize->add_control( 'epbs_footer_text', array(
        'label'    => __( 'Footer Text', 'epbs' ),
        'section'  => 'epbs_footer_section',
        'type'     => 'textarea',
        'priority' => 10,
    ) );
}
add_action( 'customize_register', 'epbs_customize_register' );

// Existing functions...

/**
 * Function to display footer text
 */
function epbs_get_footer_text() {
    return get_theme_mod( 'epbs_footer_text', 
        sprintf( 
            __( 'Theme: %1$s by %2$s.', 'epbs' ), 
            'epbs', 
            '<a href="https://alexgurghis.com/">Alex Gurghis</a>' 
        )
    );
}