<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Загрузка "переводов"
 */
function load_textdomain() {
	load_theme_textdomain( ROPEJUMP_TEXTDOMAIN, ROPEJUMP_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'ropejump\load_textdomain' );
