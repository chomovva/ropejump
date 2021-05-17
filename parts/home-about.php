<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'homeabouttitle' );
$description = get_theme_mod( 'homeaboutdescription' );
$blockquote = [];
if ( get_theme_mod( 'homeaboutblockquoteusedby' ) ) {
	$foto_id = get_theme_mod( 'homeaboutauthorfotosrc' );
	$blockquote[ 'foto' ] = is_numeric( $foto_id ) ? wp_get_attachment_image_url( $foto_id, 'medinum', false ) : $foto_id;
	$blockquote[ 'name' ] = get_theme_mod( 'homeaboutauthorname' );
	$blockquote[ 'blockquote' ] = get_theme_mod( 'homeaboutblockquote' );
}
$thumbnail_src = get_theme_mod( 'homeaboutthumbnailsrc' );
$thumbnail_alt = '';

if ( is_url( $thumbnail_src ) ) {
	$thumbnail_id = attachment_url_to_postid( removing_image_size_from_url( $thumbnail_src ) );
	$thumbnail_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
}

include get_theme_file_path( 'views/home-about.php' );