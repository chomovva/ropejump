<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_steps( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_steps',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Список "Шаги"', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 60,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homestepsusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homestepsusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_steps',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homestepsusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homestepstitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homestepstitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_steps',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homestepstitle', [
		'selector'         => '#steps-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homestepstitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homestepsdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homestepsdescription',
		[
			'section'           => ROPEJUMP_SLUG . '_home_steps',
			'label'             => __( 'Подзаголовок &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homestepsdescription', [
		'selector'         => '#steps-description',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homestepsdescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homesteps',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'logo' => [], 'excerpt' => '' ],
						$value,
						[ 'ropejump\sanitize_checkbox', 'sanitize_text_field', 'ropejump\sanitize_attachment_data', 'sanitize_textarea_field' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'homesteps',
			[
				'label'      => __( 'Список отзывов', ROPEJUMP_TEXTDOMAIN ),
				'section'    => ROPEJUMP_SLUG . '_home_steps',
				'type'       => 'list',
				'controls'   => [
					'logo'      => [
						'type'     => 'image',
						'label'    => __( 'Фото с соотношением сторон 1:1', ROPEJUMP_TEXTDOMAIN ),
					],
					'excerpt'   => [
						'type'     => 'textarea',
						'label'    => __( 'Отзыв', ROPEJUMP_TEXTDOMAIN ),
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homesteps', [
		'selector'         => '#steps-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'steps', [], 'steps-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_steps', 10, 1 );