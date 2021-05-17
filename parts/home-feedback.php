<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = trim( get_theme_mod( 'homefeedbacktitle' ) );
$description = trim( get_theme_mod( 'homefeedbackdescription' ) );
$form = trim( do_shortcode( get_theme_mod( 'homefeedbackformshortcode' ), false ) );
$bgi_src = get_theme_mod( 'homefeedbackbgisrc' );

include get_theme_file_path( 'views/home-feedback.php' );