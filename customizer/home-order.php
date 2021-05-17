<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_order( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_order',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Форма "Заказать"', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homeorderusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homeorderusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_order',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeorderusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeordertitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeordertitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_order',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeordertitle', [
		'selector'         => '#order-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeordertitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeorderdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homeorderdescription',
		[
			'section'           => ROPEJUMP_SLUG . '_home_order',
			'label'             => __( 'Описание &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeorderdescription', [
		'selector'         => '#order-description',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homeorderdescription' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeorderformshortcode',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homeorderformshortcode',
		[
			'section'           => ROPEJUMP_SLUG . '_home_order',
			'label'             => __( 'Шорткод формы обратной связи', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homeorderformshortcode', [
		'selector'         => '#order form',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homeorderbgisrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homeorderbgisrc',
			[
				'label'         => __( 'Фоновое изображение', ROPEJUMP_TEXTDOMAIN ),
				'section'       => ROPEJUMP_SLUG . '_home_order',
				'settings'      => 'homeorderbgisrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homeorderbgisrc', [
		'selector'         => '#order',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_order', 10, 1 );