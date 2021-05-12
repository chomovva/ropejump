<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация меню
 */
function register_theme_nav_menus() {
	register_nav_menus( [
		'main'        => __( 'Главное меню', ROPEJUMP_TEXTDOMAIN ),
	] );
}

add_action( 'after_setup_theme', 'ropejump\register_theme_nav_menus' );


/**
 * Добавляет класс к родительским пунктам меню
 */
function add_class_to_parent_menu_item( $items ) {
	foreach( $items as $item ) {
		if ( is_nav_has_sub_menu( $item->ID, $items ) ) {
			$item->classes[] = 'has-sub-menu';
		}
	}
	return $items;
}

add_filter( 'wp_nav_menu_objects', 'ropejump\add_class_to_parent_menu_item' );