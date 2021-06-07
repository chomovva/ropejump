<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_gallery( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_gallery',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Галерея', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homegalleryusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homegalleryusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegalleryusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallerytitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homegallerytitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegallerytitle', [
		'selector'         => '#gallery-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homegallerytitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallerydescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homegallerydescription',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Подзаголовок &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegallerydescription', [
		'selector'         => '#gallery-description',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homegallerydescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallery',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_parse_id_list',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Gallery(
			$wp_customize,
			'homegallery',
			[
				'label'      => __( 'Фото', ROPEJUMP_TEXTDOMAIN ),
				'section'    => ROPEJUMP_SLUG . '_home_gallery',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homegallery', [
		'selector'         => '#gallery-wrap',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallerylabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homegallerylabel',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Текст кнопки со ссылкой на все отзывы', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegallerylabel', [
		'selector'         => '#gallery-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homegallerylabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallerypermalink',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'homegallerypermalink',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Ссылка на все фото', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegallerypermalink', [
		'selector'         => '#gallery-permalink',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'gallery', [], 'gallery-permalink' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegalleryrowheight',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'homegalleryrowheight',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Высота строки', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 10,
				'max'             => 500,
			],
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegalleryrowheight', [
		'selector'         => '#gallery-wrap',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallerymargins',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'homegallerymargins',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Расстояние между фото', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 1,
				'max'             => 50,
			],
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegallerymargins', [
		'selector'         => '#gallery-wrap',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegallerylastrow',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homegallerylastrow',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Расстояние между фото', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => apply_filters( 'home_gallery_lastrow_choices', [
				'justify'         => __( 'по ширине', ROPEJUMP_TEXTDOMAIN ),
				'nojustify'       => __( 'не по ширине', ROPEJUMP_TEXTDOMAIN ),
				'left'            => __( 'слева', ROPEJUMP_TEXTDOMAIN ),
				'center'          => __( 'по центру', ROPEJUMP_TEXTDOMAIN ),
				'right'           => __( 'справа', ROPEJUMP_TEXTDOMAIN ),
				'hide'            => __( 'скрыть', ROPEJUMP_TEXTDOMAIN ),
			] ),
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegallerylastrow', [
		'selector'         => '#gallery-wrap',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homegalleryborder',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		'homegalleryborder',
		[
			'section'           => ROPEJUMP_SLUG . '_home_gallery',
			'label'             => __( 'Отступ вокруг контейнера', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => [
				'min'             => 0,
				'max'             => 50,
			],
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homegalleryborder', [
		'selector'         => '#gallery-wrap',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_gallery', 10, 1 );