<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_about( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_about',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'О нас', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 30,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeaboutusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeaboutusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_about',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeabouttitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeabouttitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_about',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeabouttitle', [
		'selector'         => '#about-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeabouttitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'homeaboutdescription',
			[
				'label'                 => __( 'Описание', ROPEJUMP_TEXTDOMAIN ),
				'section'               => ROPEJUMP_SLUG . '_home_about',
				'settings'              => 'homeaboutdescription'
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutdescription', [
		'selector'         => '#about-description',
		'render_callback'  => function () { return customizer_get_editor_theme_mod( 'homeaboutdescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutthumbnailsrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homeaboutthumbnailsrc',
			[
				'label'         => __( 'Превью', ROPEJUMP_TEXTDOMAIN ),
				'section'       => ROPEJUMP_SLUG . '_home_about',
				'settings'      => 'homeaboutthumbnailsrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutthumbnailsrc', [
		'selector'         => '#about-thumbnail',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'about', [], 'about-thumbnail' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutblockquoteusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeaboutblockquoteusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_about',
			'label'             => __( 'Показівать цитату', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutblockquoteusedby', [
		'selector'         => '#about-blockquote',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'about', [], 'about-blockquote' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutauthorfotosrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Cropped_Image_Control(
			$wp_customize,
			'homeaboutauthorfotosrc',
			[
				'label'         => __( 'Фото автора цитаты', ROPEJUMP_TEXTDOMAIN ),
				'section'       => ROPEJUMP_SLUG . '_home_about',
				'settings'      => 'homeaboutauthorfotosrc',
				'flex_width'    => false, 
				'flex_height'   => false,
				'width'         => 300,
				'height'        => 300,
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutauthorfotosrc', [
		'selector'         => '#about-blockquote',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'about', [], 'about-blockquote' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutauthorname',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeaboutauthorname',
		[
			'section'           => ROPEJUMP_SLUG . '_home_about',
			'label'             => __( 'Имя автора цитаты', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutauthorname', [
		'selector'         => '#about-blockquote',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'about', [], 'about-blockquote' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeaboutblockquote',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homeaboutblockquote',
		[
			'section'           => ROPEJUMP_SLUG . '_home_about',
			'label'             => __( 'Цитата', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeaboutblockquote', [
		'selector'         => '#about-blockquote',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'about', [], 'about-blockquote' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_about', 10, 1 );