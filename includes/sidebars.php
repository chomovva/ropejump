<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( [
		'name'             => __( 'Боковое меню', ROPEJUMP_TEXTDOMAIN ),
		'id'               => 'search_modal_side',
		'description'      => __( 'Отображается в боковой панели. Расположено после навигационного меню.', ROPEJUMP_TEXTDOMAIN ),
		'class'            => 'search-modal-sidebar',
		'before_widget'    => '<div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	] );
}

add_action( 'widgets_init', 'ropejump\register_sidebars' );