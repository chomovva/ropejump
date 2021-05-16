<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'homeabouttitle' );
$description = get_theme_mod( 'homeaboutdescription' );
$blockquote = [];
if ( get_theme_mod( 'homeaboutblockquoteusedby' ) ) {
	$blockquote[ 'foto' ] = get_theme_mod( 'homeaboutauthorfotourl' );
	$blockquote[ 'name' ] = get_theme_mod( 'homeaboutauthorname' );
	$blockquote[ 'blockquote' ] = get_theme_mod( 'homeaboutblockquote' );
}
$foto_src = get_theme_mod( 'homeaboutfotourl' );

include get_theme_file_path( 'views/home-about.php' );