<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$part_name = is_singular() ? ( is_page() ? 'page' : 'single' ) : ( is_search() ? 'search' : 'archive' );

get_header();

do_action( 'container_before' );

if ( have_posts() ) {

	do_action( $part_name . '_loop_before' );

	while ( have_posts() ) {
		the_post();
		do_action( $part_name . '_entry_before', get_the_ID() );
		include get_theme_file_path( 'views/entry-' . $part_name . '.php' );
		do_action( $part_name . '_entry_after', get_the_ID() );
	}

	do_action( $part_name . '_loop_after' );

} else {
	do_action( 'no_posts_found', $part_name );
}

do_action( 'container_after' );

get_footer();