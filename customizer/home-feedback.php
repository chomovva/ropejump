<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_feedback( $wp_customize ) {

	$wp_customize->add_section(
		ROPEJUMP_SLUG . '_home_feedback',
		[
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ROPEJUMP_TEXTDOMAIN ),  __( 'Обратная связь', ROPEJUMP_TEXTDOMAIN ) ),
			'priority'         => 70,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'homefeedbackusedby',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'ropejump\sanitize_checkbox',
		]
	);
	$wp_customize->add_control(
		'homefeedbackusedby',
		[
			'section'           => ROPEJUMP_SLUG . '_home_feedback',
			'label'             => __( 'Использовать секцию', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'checkbox',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackusedby', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbacktitle',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homefeedbacktitle',
		[
			'section'           => ROPEJUMP_SLUG . '_home_feedback',
			'label'             => __( 'Заголовок &lt;H2&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbacktitle', [
		'selector'         => '#feedback-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homefeedbacktitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbackexcerpt',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		]
	);
	$wp_customize->add_control(
		'homefeedbackexcerpt',
		[
			'section'           => ROPEJUMP_SLUG . '_home_feedback',
			'label'             => __( 'Описание &lt;P&gt;', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'textarea',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackexcerpt', [
		'selector'         => '#feedback-excerpt',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'homefeedbackexcerpt' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbackformshortcode',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'homefeedbackformshortcode',
		[
			'section'           => ROPEJUMP_SLUG . '_home_feedback',
			'label'             => __( 'Шорткод формы обратной связи', ROPEJUMP_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackformshortcode', [
		'selector'         => '#feedback form',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'homefeedbackbgisrc',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		]
	);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'homefeedbackbgisrc',
			[
				'label'         => __( 'Фоновое изображение', ROPEJUMP_TEXTDOMAIN ),
				'section'       => ROPEJUMP_SLUG . '_home_feedback',
				'settings'      => 'homefeedbackbgisrc',
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'homefeedbackbgisrc', [
		'selector'         => '#feedback',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'ropejump\customizer_register_home_feedback', 10, 1 );