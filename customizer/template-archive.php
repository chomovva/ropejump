<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_template_archive( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_template_archive',
		[
			'title'            => __( 'Архива', ROPEJUMP_TEXTDOMAIN ),
			'description'      => __( 'Настройки шаблона архивов, категорий, блога.', ROPEJUMP_TEXTDOMAIN ),
			'priority'         => 30,
			'panel'            => 'page_templates',
		]
	); /**/

	$wp_customize->add_setting(
		'archivetitleprefix',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'archivetitleprefix',
		[
			'section'           => ROPEJUMP_SLUG . '_template_archive',
			'label'             => __( 'Текст перед заголовком архива', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_template_archive', 10, 1 );