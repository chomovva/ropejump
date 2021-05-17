<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( [
		'name'             => __( 'Колонка в боково панели', ROPEJUMP_TEXTDOMAIN ),
		'id'               => 'nav',
		'description'      => __( 'Отображается в боковой панели. Расположено после навигационного меню.', ROPEJUMP_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	] );
}

add_action( 'widgets_init', 'ropejump\register_sidebars' );