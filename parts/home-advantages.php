<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homeadvantagestitle' ) );
$description = trim( get_theme_mod( 'homeadvantagesdescription' ) );
$entries = get_theme_mod( 'homeadvantages' );

if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-advantage.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}

include get_theme_file_path( 'views/home-advantages.php' );