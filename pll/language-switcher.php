<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function get_pll_languages_list() {

	$args = apply_filters( 'get_pll_languages_list_args', [
		'raw'              => 1,
		'display_names_as' => 'slug',
	] );

	$languages = pll_the_languages( $args );

	return ( is_array( $languages ) && count( $languages ) > 1 ) ? $languages : false;

}

add_filter( 'languages_list', 'ropejump\get_pll_languages_list', 10, 1 );