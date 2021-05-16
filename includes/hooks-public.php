<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет пагинацию
 * */

add_action( 'archive_loop_after', 'the_posts_pagination', 10, 0 );

add_action( 'search_loop_after', 'the_posts_pagination', 10, 0 );


/**
 * Добавляет заголовок для архива / категории
 * */
function add_pageheader_archive() {
	get_template_part( 'parts/pageheader', 'archive' );
}

add_action( 'archive_loop_before', 'ropejump\add_pageheader_archive', 10, 0 );


/**
 * Добавляет заголовок для результата поиска
 * */
function add_pageheader_search() {
	get_template_part( 'parts/pageheader', 'search' );
}

add_action( 'search_loop_before', 'ropejump\add_pageheader_search', 10, 0 );


/**
 * Добавляет заголовок страницы для постоянных страниц и постов
 * */
function add_pageheader_singular() {
	get_template_part( 'parts/pageheader', 'singular' );
}

add_action( 'singular_loop_before', 'ropejump\add_pageheader_singular', 10, 0 );


/**
 * 
 * */
function add_container_before_wrap() {
	include get_theme_file_path( 'views/container-before.php' );
}

add_action( 'container_before', 'ropejump\add_container_before_wrap', 10, 0 );


/**
 * 
 * */
function add_container_after_wrap() {
	include get_theme_file_path( 'views/container-after.php' );
}

add_action( 'container_after', 'ropejump\add_container_before_wrap', 10, 0 );


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