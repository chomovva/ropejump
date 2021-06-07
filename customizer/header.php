<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_header( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_header',
		[
			'title'            => __( 'Шапка сайта', ROPEJUMP_TEXTDOMAIN ),
			'priority'         => 10,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'headerpanelcalllabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'headerpanelcalllabel',
		[
			'section'           => ROPEJUMP_SLUG . '_header',
			'label'             => __( 'Текст кнопки', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'headerpanelcalllabel', [
		'selector'         => '#panel-call',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'headerpanelcalllabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'headerpanelcallhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'headerpanelcallhref',
		[
			'section'           => ROPEJUMP_SLUG . '_header',
			'label'             => __( 'Атрибут href кнопки', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'url',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'headerpanelcallhref', [
		'selector'         => '#panel-call',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/
	$wp_customize->selective_refresh->add_partial( 'headerpanelcallhref', [
		'selector'         => '#panel-call',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/panel', NULL, [], 'panel-call' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'headerbgisrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'headerbgisrc',
			[
				'label'         => __( 'Фоновое изображение', ROPEJUMP_TEXTDOMAIN ),
				'section'       => ROPEJUMP_SLUG . '_header',
				'settings'      => 'headerbgisrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'headerbgisrc', [
		'selector'         => '#header',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_header', 10, 1 );