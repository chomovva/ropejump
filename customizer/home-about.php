<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_about( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_about',
		[
			'title'            => __( 'Дополнительные скрипты', ROPEJUMP_TEXTDOMAIN ),
			'priority'         => 70,
			'panel'            => ROPEJUMP_SLUG . '_parts',
		]
	); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_about', 10, 1 );