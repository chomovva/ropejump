<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
}

add_action( 'after_setup_theme', 'ropejump\theme_supports' );


/**
 * Возвращает список социальных сетей для кнопок "поделиться"
 * */
function get_list_of_social_networks( $items = [] ) {
	return array_merge( $items, [
		'facebook'  => __( 'Facebook', ROPEJUMP_TEXTDOMAIN ),
		'instagram' => __( 'instaram', ROPEJUMP_TEXTDOMAIN ),
	] );
}

add_filter( 'social_networks', 'ropejump\get_list_of_social_networks', 10, 1 );