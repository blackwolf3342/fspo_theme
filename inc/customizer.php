<?php
/**
 * fspo_theme Theme Customizer
 *
 * @package fspo_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

 function example_customizer_menu() {
add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'example_customizer_menu' );


function fspo_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'fspo_theme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fspo_theme_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_setting( 'img-upload' );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload',
			array(
				'label' => 'Перший слайд',
				'section' => 'true_display_options',
				'settings' => 'img-upload'
			)
		)
	);
	$wp_customize->add_setting( 'img-upload1' );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload1',
			array(
				'label' => 'Другий слайд',
				'section' => 'true_display_options',
				'settings' => 'img-upload1'
			)
		)
	);
	$wp_customize->add_setting( 'img-upload2' );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload2',
			array(
				'label' => 'Третій слайд',
				'section' => 'true_display_options',
				'settings' => 'img-upload2'
			)
		)
	);
	
	$wp_customize->add_setting( 'img-upload3' );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload3',
			array(
				'label' => 'Четвертий слайд',
				'section' => 'true_display_options',
				'settings' => 'img-upload3'
			)
		)
	);
	

	$wp_customize->add_section(
		'true_display_options',array(
			'title' => 'Налаштування слайдера',
			'priority' => 200,
			'description' => 'Настройте внешний вид вашего сайта'
		)
	);
	
}
add_action( 'customize_register', 'fspo_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fspo_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fspo_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fspo_theme_customize_preview_js() {
	wp_enqueue_script( 'fspo_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fspo_theme_customize_preview_js' );
