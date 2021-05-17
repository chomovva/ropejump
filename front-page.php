<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $post;


get_header();


if (
	true
	&& $page_on_front_id = get_option( 'page_on_front' )
	&& is_object( $page_on_front = get_page( $page_on_front_id, OBJECT, 'raw' ) )
	&& ! is_wp_error( $page_on_front )
) {

	// выводим страницу
	$post = $page_on_front;
	setup_postdata( $post );
	do_action( 'container_before' );
	do_action( 'page_loop_before' );
	do_action( 'entry_before', $post->ID );
	include get_theme_file_path( 'views/entry-page.php' );
	do_action( 'entry_after', $post->ID );
	do_action( 'page_loop_after' );
	do_action( 'container_after' );

	wp_reset_postdata();

} else {

	// выводим секции главной
	$sections_keys = apply_filters( 'home_section_list', [ 'about', 'advantages', 'order', 'steps', 'gallery', 'reviews', 'feedback' ] );

	if ( is_array( $sections_keys ) && ! empty( $sections_keys ) ) {

		foreach ( $sections_keys as $key ) {
			if ( get_theme_mod( 'home' . $key . 'usedby' ) ) {
				get_template_part( 'parts/home', $key );
			}
		}

	} else {

		// выводим архив
		do_action( 'container_before' );
		if ( have_posts() ) {
			do_action( 'archive_loop_before' );
			while ( have_posts() ) {
				the_post();
				do_action( 'entry_before', get_the_ID() );
				include get_theme_file_path( 'views/entry-archive.php' );
				do_action( 'entry_after', get_the_ID() );
			}
			do_action( 'archive_loop_after' );
		} else {
			do_action( 'no_posts_found', 'archive' );
		}
		do_action( 'container_after' );

	}

}


get_footer();