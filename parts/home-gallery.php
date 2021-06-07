<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };

global $post;

$title = trim( get_theme_mod( 'homegallerytitle' ) );
$description = trim( get_theme_mod( 'homegallerydescription' ) );
$label = get_theme_mod( 'homegallerylabel' );
$permalink = get_theme_mod( 'homegallerypermalink' );
$images = get_theme_mod( 'homegallery' );


if ( is_string( $images ) ) {
	$images = wp_parse_id_list( $images, true );
}

if ( is_array( $images ) && ! empty( $images ) ) {
	ob_start();
	foreach ( $images as $attachment_id ) {
		$attachment = get_post( $attachment_id, OBJECT, 'raw' );
		if ( is_object( $attachment ) && ! is_wp_error( $attachment ) ) {
			$post = $attachment;
			setup_postdata( $post );
			include get_theme_file_path( 'views/entry-image.php' );
		}
	}
	$content = ob_get_contents();
	wp_reset_postdata();
	ob_end_clean();
	wp_enqueue_script( 'justifiedGallery' );
	wp_localize_script( 'justifiedGallery', 'HomeGallerySettings', [
		'rowHeight' => get_theme_mod( 'homegalleryrowheight' ),
		'margins'   => get_theme_mod( 'homegallerymargins' ),
		'lastRow'   => get_theme_mod( 'homegallerylastrow' ),
		'border'    => get_theme_mod( 'homegalleryborder' ),
	] );
	add_action( 'get_footer', function () {
		wp_enqueue_style( 'justifiedGallery' );
	}, 10, 0 );
	if ( file_exists( $init_gallery_script_path = get_theme_file_path( 'scripts/init/home-gallery.js' ) ) ) {
		wp_add_inline_script( 'justifiedGallery', file_get_contents( $init_gallery_script_path ), 'after' );
	}
}

include get_theme_file_path( 'views/home-gallery.php' );