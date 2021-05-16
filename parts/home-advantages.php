<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homeadvantagestitle' ) );
$description = trim( get_theme_mod( 'homeadvantagesdescription' ) );

include get_theme_file_path( 'views/home-advantages.php' );