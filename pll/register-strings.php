<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * 
 * */
function add_register_strings() {
	$strings = apply_filters( 'template_pll_register_strings', [
		'headerpanelcalllabel'      => false,
		'homejumbotrontitle'        => false,
		'homejumbotrondescription'  => true,
		'homejumbotronbtnlabel'     => false,
		'homejumbotronbtnhref'      => false,
		'homejumbotroncounterlabel' => false,
		'homeabouttitle'            => false,
		'homeaboutdescription'      => true,
		'homeaboutauthorname'       => false,
		'homeaboutblockquote'       => true,
		'homeadvantagestitle'       => false,
		'homeadvantagesdescription' => true,
		'homeordertitle'            => false,
		'homeorderdescription'      => true,
		'homeorderformshortcode'    => false,
		'homegallerytitle'          => false,
		'homegallerydescription'    => true,
		'homegallerylabel'          => false,
		'homegallerypermalink'      => false,
		'homestepstitle'            => false,
		'homestepsdescription'      => true,
		'homereviewstitle'          => false,
		'homereviewsdescription'    => true,
		'homereviewslabel'          => false,
		'homereviewspermalink'      => false,
		'homefeedbacktitle'         => false,
		'homefeedbackdescription'   => true,
		'homefeedbackformshortcode' => false,
		'footersocialcopyright'     => false,
		'footersocialfacebook'      => false,
		'footersocialinstagram'     => false,
		'archivetitleprefix'        => false,
	] );
	foreach ( $strings as $name => $multiline ) {
		$string = get_theme_mod( $name );
		if ( ! empty( $string ) ) {
			pll_register_string( $name, $string, ROPEJUMP_TEXTDOMAIN, $multiline );
		}
	}
}

add_action( 'init', 'ropejump\add_register_strings', 10, 0 );


/**
 * 
 * */
function add_register_strings_home_advantages() {
	$homeadvantages = get_theme_mod( 'homeadvantages' );
	if ( is_string( $homeadvantages ) ) {
		$homeadvantages = json_decode( $homeadvantages, true );
	}
	if ( is_array( $homeadvantages ) && ! empty( $homeadvantages ) ) {
		foreach ( $homeadvantages as $index => $entry ) {
			foreach ( [
				'title'   => false,
				'excerpt' => true,
			] as $key => $multiline ) {
				if ( array_key_exists( $key, $entry ) && is_string( $entry[ $key ] ) && ! empty( trim( $entry[ $key ] ) ) ) {
					pll_register_string( 'advantages' . $index . $key, $entry[ $key ], ROPEJUMP_TEXTDOMAIN, $multiline );
				}
			}
		}
	}
}

add_action( 'init', 'ropejump\add_register_strings_home_advantages', 10, 0 );


/**
 * 
 * */
function add_register_strings_home_steps() {
	$homesteps = get_theme_mod( 'homesteps' );
	if ( is_string( $homesteps ) ) {
		$homesteps = json_decode( $homesteps, true );
	}
	if ( is_array( $homesteps ) && ! empty( $homesteps ) ) {
		foreach ( $homesteps as $index => $entry ) {
			foreach ( [
				'title'   => false,
				'excerpt' => true,
			] as $key => $multiline ) {
				if ( array_key_exists( $key, $entry ) && is_string( $entry[ $key ] ) && ! empty( trim( $entry[ $key ] ) ) ) {
					pll_register_string( 'steps' . $index . $key, $entry[ $key ], ROPEJUMP_TEXTDOMAIN, $multiline );
				}
			}
		}
	}
}

add_action( 'init', 'ropejump\add_register_strings_home_steps', 10, 0 );


/**
 * 
 * */
function add_register_strings_home_reviews() {
	$strings = [];
	$homereviews = get_theme_mod( 'homereviews' );
	if ( is_string( $homereviews ) ) {
		$homereviews = json_decode( $homereviews, true );
	}
	if ( is_array( $homereviews ) && ! empty( $homereviews ) ) {
		foreach ( $homereviews as $index => $entry ) {
			foreach ( [
				'title'   => false,
				'blockquote' => true,
			] as $key => $multiline ) {
				if ( array_key_exists( $key, $entry ) && is_string( $entry[ $key ] ) && ! empty( trim( $entry[ $key ] ) ) ) {
					pll_register_string( 'reviews' . $index . $key, $entry[ $key ], ROPEJUMP_TEXTDOMAIN, $multiline );
				}
			}
		}
	}
	return $strings;
}

add_action( 'init', 'ropejump\add_register_strings_home_reviews', 10, 0 );