<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_additional_scripts( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_additional_scripts',
		[
			'title'            => __( 'Дополнительные скрипты', ROPEJUMP_TEXTDOMAIN ),
			'priority'         => 70,
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsheadstart',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsheadstart',
		[
			'section'           => ROPEJUMP_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу после тега HEAD', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsheadend',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsheadend',
		[
			'section'           => ROPEJUMP_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу перед закрывающим тегом HEAD', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsbodystart',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsbodystart',
		[
			'section'           => ROPEJUMP_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу после тега BODY', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'additionalscriptsbodyend',
		[
			'transport'         => 'reset',
		]
	);
	$wp_customize->add_control(
		'additionalscriptsbodyend',
		[
			'section'           => ROPEJUMP_SLUG . '_additional_scripts',
			'label'             => __( 'Скрипты сразу перед закрывающим тегом BODY', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_additional_scripts', 10, 1 );