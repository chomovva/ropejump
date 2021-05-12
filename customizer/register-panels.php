<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_panels( $wp_customize ) {
	
	/**
	 * Настройки блоков темы
	 **/
	$wp_customize->add_panel(
		ROPEJUMP_SLUG . '_parts',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', ROPEJUMP_TEXTDOMAIN ),
		]
	);

	/**
	 * Настройки шаблонов страниц
	 **/
	$wp_customize->add_panel(
		ROPEJUMP_SLUG . '_templates',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц', ROPEJUMP_TEXTDOMAIN ),
		]
	);

}

add_action( 'customize_register', 'ropejump\customizer_register_panels', 10, 1 );
