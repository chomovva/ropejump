<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homereviewstitle' ) );
$description = trim( get_theme_mod( 'homereviewsdescription' ) );
$label = get_theme_mod( 'homereviewslabel' );
$permalink = get_theme_mod( 'homereviewspermalink' );
$entries = get_theme_mod( 'homereviews' );


if ( is_string( $entries ) ) {
	$entries = json_decode( $entries, true );
}

if ( is_array( $entries ) && ! empty( $entries ) ) {
	ob_start();
	foreach ( $entries as $entry ) {
		include get_theme_file_path( 'views/entry-review.php' );
	}
	$content = ob_get_contents();
	ob_end_clean();
}

include get_theme_file_path( 'views/home-reviews.php' );