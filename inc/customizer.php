<?php
/**
 * justine Theme Customizer.
 *
 * @package justine
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function justine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	// Add Logo Section
	$wp_customize->add_section( 'justine_logo_section' , array(
	    'title'       => __( 'Logo', 'justine' ),
	    'priority'    => 30
	) );
	$wp_customize->add_setting( 'justine_logo',
		array ( 'default'   => '',
    	'sanitize_callback' => 'esc_url_raw'
    ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'justine_logo', array(
    'label'    => __( 'Logo', 'justine' ),
    'section'  => 'justine_logo_section',
    'settings' => 'justine_logo',
	) ) );

	// Social Links
	$wp_customize->add_section( 'social_links', array(
		'title'    => esc_html__('Social Networks', 'justine'),
		'priority' => 100
	) );
	$wp_customize->add_setting( 'justine_facebook_link', array( 
		'default'           => '',
		'sanitize_callback' => 'justine_sanitize_social_link'
	) );
	$wp_customize->add_setting( 'justine_gplus_link', array( 
		'default'           => '',
		'sanitize_callback' => 'justine_sanitize_social_link'
	) );
	$wp_customize->add_setting( 'justine_instagram_link', array( 
		'default'           => '',
		'sanitize_callback' => 'justine_sanitize_social_link'
	) );
	$wp_customize->add_setting( 'justine_linkedin_link', array( 
		'default'           => '',
		'sanitize_callback' => 'justine_sanitize_social_link'
	) );
	$wp_customize->add_setting( 'justine_twitter_link', array( 
		'default'           => '',
		'sanitize_callback' => 'justine_sanitize_social_link'
	) );
	$wp_customize->add_setting( 'justine_pinterest_link', array( 
		'default'           => '',
		'sanitize_callback' => 'justine_sanitize_social_link'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'justine_facebook_link',
		array(
			'label'   => esc_html__('Facebook Link', 'justine'),
			'setting' => 'justine_facebook_link',
			'section' => 'social_links',
			'type'    => 'text'
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'justine_gplus_link',
		array(
			'label'   => esc_html__('Google+ Link', 'justine'),
			'setting' => 'justine_gplus_link',
			'section' => 'social_links',
			'type'    => 'text'
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'justine_instagram_link',
		array(
			'label'   => esc_html__('Instagram Link', 'justine'),
			'setting' => 'justine_instagram_link',
			'section' => 'social_links',
			'type'    => 'text'
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'justine_linkedin_link',
		array(
			'label'   => esc_html__('LinkedIn Link', 'justine'),
			'setting' => 'justine_linkedin_link',
			'section' => 'social_links',
			'type'    => 'text'
		)
	) );	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'justine_twitter_link',
		array(
			'label'   => esc_html__('Twitter Link', 'justine'),
			'setting' => 'justine_twitter_link',
			'section' => 'social_links',
			'type'    => 'text'
		)
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'justine_pinterest_link',
		array(
			'label'   => esc_html__('Pinterest Link', 'justine'),
			'setting' => 'justine_pinterest_link',
			'section' => 'social_links',
			'type'    => 'text'
		)
	) );
	
	// Footer
	$wp_customize->add_section( 'footer', array(
		'title'    => esc_html__('Footer Text', 'justine'),
		'priority' => 99
	) );
	$wp_customize->add_setting( 'footer_text', array( 
		'default'           => 'Copyright &copy 2016 justine',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_text',
		array(
			'label'   => esc_html__('Footer text', 'justine'),
			'setting' => 'footer_text',
			'section' => 'footer',
			'type'    => 'text'
		)
	) );
}
add_action( 'customize_register', 'justine_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function justine_customize_preview_js() {
	wp_enqueue_script( 'justine_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'justine_customize_preview_js' );
