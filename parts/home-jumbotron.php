<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homejumbotrontitle' ) );
$description = trim( get_theme_mod( 'homejumbotrondescription' ) );
$btn_href = get_theme_mod( 'homejumbotronbtnhref' );
$btn_label = trim( get_theme_mod( 'homejumbotronbtnlabel' ) );
$timestamp = '';
$counter_label = '';
if ( get_theme_mod( 'homejumbotroncounteruserby' ) ) {
	$timestamp = strtotime( get_theme_mod( 'homejumbotrontimestamp' ) );
	$counter_label = get_theme_mod( 'homejumbotroncounterlabel' );
}

include get_theme_file_path( 'views/home-jumbotron.php' );