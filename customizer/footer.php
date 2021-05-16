<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_footer( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_footer',
		[
			'title'            => __( 'Подвал сайта', ROPEJUMP_TEXTDOMAIN ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'footersocialcopyright',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'footersocialcopyright',
		[
			'section'           => ROPEJUMP_SLUG . '_footer',
			'label'             => __( 'Копирайт', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'url',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'footersocialcopyright', [
		'selector'         => '#footer-copyright',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'footersocialcopyright' ); },
		'fallback_refresh' => true,
	] ); /**/

	foreach ( apply_filters( 'social_networks', [] ) as $key => $label ) {
		$wp_customize->add_setting(
			'footersocial' . $key,
			[
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			]
		);
		$wp_customize->add_control(
			'footersocial' . $key,
			[
				'section'           => ROPEJUMP_SLUG . '_footer',
				'label'             => $label,
				'type'              => 'url',
			]
		); /**/
	}

}

add_action( 'customize_register', 'ropejump\customizer_register_footer', 10, 1 );