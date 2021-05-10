<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'ROPEJUMP_URL', get_template_directory_uri() . '/' );
define( 'ROPEJUMP_DIR', get_template_directory() . '/' );
define( 'ROPEJUMP_TEXTDOMAIN', 'ropejump' );
define( 'ROPEJUMP_SLUG', 'ropejump' );


get_template_part( 'includes/textdomain' );


if ( is_admin() && ! wp_doing_ajax() ) {
	//
} else {
	get_template_part( 'includes/lazyload.php' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/search-result' );
}