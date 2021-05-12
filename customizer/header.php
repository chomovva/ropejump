<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_header( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_header',
		[
			'title'            => __( 'Шапка сайта', ROPEJUMP_TEXTDOMAIN ),
			'priority'         => 70,
			'panel'            => ROPEJUMP_SLUG . '_parts',
		]
	); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_header', 10, 1 );