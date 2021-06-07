<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_reviews( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_reviews',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Отзывы', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 80,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homereviewsusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homereviewsusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_reviews',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewsusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewstitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homereviewstitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_reviews',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewstitle', [
		'selector'         => '#reviews-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homereviewstitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewsdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homereviewsdescription',
		[
			'section'           => ROPEJUMP_SLUG . '_home_reviews',
			'label'             => __( 'Подзаголовок &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewsdescription', [
		'selector'         => '#reviews-description',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homereviewsdescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewslabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homereviewslabel',
		[
			'section'           => ROPEJUMP_SLUG . '_home_reviews',
			'label'             => __( 'Текст кнопки со ссылкой на все отзывы', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewslabel', [
		'selector'         => '#reviews-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homereviewslabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviewspermalink',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'homereviewspermalink',
		[
			'section'           => ROPEJUMP_SLUG . '_home_reviews',
			'label'             => __( 'Ссылка на страницу отзывов', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homereviewspermalink', [
		'selector'         => '#reviews-permalink',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'reviews', [], 'reviews-permalink' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homereviews',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'foto' => [], 'blockquote' => '' ],
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
			'homereviews',
			[
				'label'      => __( 'Список отзывов', ROPEJUMP_TEXTDOMAIN ),
				'section'    => ROPEJUMP_SLUG . '_home_reviews',
				'type'       => 'list',
				'controls'   => [
					'foto'      => [
						'type'     => 'image',
						'label'    => __( 'Фото с соотношением сторон 1:1', ROPEJUMP_TEXTDOMAIN ),
					],
					'blockquote'   => [
						'type'     => 'textarea',
						'label'    => __( 'Отзыв', ROPEJUMP_TEXTDOMAIN ),
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homereviews', [
		'selector'         => '#reviews-wrap',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'reviews', [], 'reviews-wrap' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_reviews', 10, 1 );