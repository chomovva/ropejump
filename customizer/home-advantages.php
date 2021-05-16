<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_advantages( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_advantages',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Преимущетва', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeadvantagesusedby',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeadvantagesusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_advantages',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	); /**/

	$wp_customize->add_setting(
		'homeadvantagestitle',
		[
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeadvantagestitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_advantages',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	); /**/

	$wp_customize->add_setting(
		'homeadvantagesdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homeadvantagesdescription',
		[
			'section'           => ROPEJUMP_SLUG . '_home_advantages',
			'label'             => __( 'Подзаголовок &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	); /**/

	$wp_customize->add_setting(
		'homeadvantages',
		[
			'transport'         => 'reset',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'logo' => [], 'bgi' => [], 'excerpt' => '' ],
						$value,
						[ 'ropejump\sanitize_checkbox', 'sanitize_text_field', 'ropejump\sanitize_attachment_data', 'ropejump\sanitize_attachment_data', 'sanitize_textarea_field' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'homeadvantages',
			[
				'label'      => __( 'Список', ROPEJUMP_TEXTDOMAIN ),
				'section'    => ROPEJUMP_SLUG . '_home_advantages',
				'type'       => 'list',
				'controls'   => [
					'logo'      => [
						'type'     => 'image',
						'label'    => __( 'Логотип', ROPEJUMP_TEXTDOMAIN ),
					],
					'bgi'       => [
						'type'     => 'image',
						'label'    => __( 'Фоновое изображение', ROPEJUMP_TEXTDOMAIN ),
					],
					'excerpt'   => [
						'type'     => 'textarea',
						'label'    => __( 'Краткое описание', ROPEJUMP_TEXTDOMAIN ),
					],
				],
			]
		)
	); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_advantages', 10, 1 );