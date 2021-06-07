<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_jumbotron( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_jumbotron',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Первый экран', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 20,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homejumbotrontitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotrontitle',
		[
			'section'           => ROPEJUMP_SLUG . '_jumbotron',
			'label'             => __( 'Заголовок &lt;H1&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotrontitle', [
		'selector'         => '#jumbotron-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotrontitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotrondescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotrondescription',
		[
			'section'           => ROPEJUMP_SLUG . '_jumbotron',
			'label'             => __( 'Подзаголовок &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotrondescription', [
		'selector'         => '#jumbotron-description',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotrondescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbtnlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotronbtnlabel',
		[
			'section'           => ROPEJUMP_SLUG . '_jumbotron',
			'label'             => __( 'Текст кнопки', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbtnlabel', [
		'selector'         => '#jumbotron-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotronbtnlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotronbtnhref',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		'homejumbotronbtnhref',
		[
			'section'           => ROPEJUMP_SLUG . '_jumbotron',
			'label'             => __( 'Атрибут href кнопки', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'url',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotronbtnhref', [
		'selector'         => '#jumbotron-permalink',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'jumbotron', [], 'jumbotron-permalink' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotroncounteruserby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homejumbotroncounteruserby',
		[
			'section'           => ROPEJUMP_SLUG . '_jumbotron',
			'label'             => __( 'Показывать счётчик', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotroncounteruserby', [
		'selector'         => '#jumbotron-counter',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotroncounterlabel',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homejumbotroncounterlabel',
		[
			'section'           => ROPEJUMP_SLUG . '_jumbotron',
			'label'             => __( 'Описание счётчика', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotroncounterlabel', [
		'selector'         => '#jumbotron-counter-label',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homejumbotroncounterlabel' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homejumbotrontimestamp',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Date_Time_Control(
			$wp_customize,
			'homejumbotrontimestamp',
			[
				'label'         => __( 'Дата и время проведения мероприятия', ROPEJUMP_TEXTDOMAIN ),
				'section'       => ROPEJUMP_SLUG . '_jumbotron',
				'settings'      => 'homejumbotrontimestamp',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homejumbotrontimestamp', [
		'selector'         => '#jumbotron-counter',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'jumbotron', [], 'jumbotron-counter' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_jumbotron', 10, 1 );