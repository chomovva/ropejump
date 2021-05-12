<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Возвращает список блоков главной страницы
 * */
function get_home_sections_list( $list ) {
	return array_merge( $list, [ 'about', 'advantages', 'order', 'steps', 'gallery', 'reviews', 'feedback' ] );
}

add_filter( 'home_sections_list', 'ropejump\get_home_sections_list', 10, 1 );


/**
 * Выводит доп скрипты сразу посте тега HEAD
 * */
function add_additional_scripts_head_start() {
	echo get_theme_mod( 'additionalscriptsheadstart' );
}

add_action( 'body_start', 'ropejump\add_additional_scripts_head_start', 10, 0 );


/**
 * Выводит доп скрипты перед закрывающим тегом HEAD
 * */
function add_additional_scripts_head_end() {
	echo get_theme_mod( 'additionalscriptsheadend' );
}

add_action( 'body_end', 'ropejump\add_additional_scripts_head_end', 10, 0 );


/**
 * Выводит доп скрипты сразу посте тега BODY
 * */
function add_additional_scripts_body_start() {
	echo get_theme_mod( 'additionalscriptsbodystart' );
}

add_action( 'body_start', 'ropejump\add_additional_scripts_body_start', 10, 0 );


/**
 * Выводит доп скрипты перед закрывающим тегом BODY
 * */
function add_additional_scripts_body_end() {
	echo get_theme_mod( 'additionalscriptsbodyend' );
}

add_action( 'body_end', 'ropejump\add_additional_scripts_body_end', 10, 0 );


/**
 * Прячет админпанель
 * */
function get_show_admin_bar_status() {
	return ( bool ) get_theme_mod( 'showadminbarstatus' );
}

add_filter( 'show_admin_bar', 'ropejump\get_show_admin_bar_status', 10, 0 );


/**
 * Возвращает список социальных сетей для кнопок "поделиться"
 * */
function get_list_of_social_networks( $items = [] ) {
	return array_merge( $items, [
		'facebook' => __( 'Facebook', ROPEJUMP_TEXTDOMAIN ),
		'twitter'  => __( 'instaram', ROPEJUMP_TEXTDOMAIN ),
	] );
}

add_filter( 'social_networks', 'ropejump\get_list_of_social_networks', 10, 1 );