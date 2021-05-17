<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = get_theme_mod( 'homeordertitle' );
$description = get_theme_mod( 'homeorderdescription' );
$bgi_src = get_theme_mod( 'homeorderbgisrc' );
$form = trim( do_shortcode( get_theme_mod( 'homeorderformshortcode' ), false ) );

include get_theme_file_path( 'views/home-order.php' );