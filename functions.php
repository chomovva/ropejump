<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


define( 'ROPEJUMP_URL', get_template_directory_uri() . '/' );
define( 'ROPEJUMP_DIR', get_template_directory() . '/' );
define( 'ROPEJUMP_TEXTDOMAIN', 'ropejump' );
define( 'ROPEJUMP_SLUG', 'ropejump' );


get_template_part( 'includes/textdomain' );
get_template_part( 'includes/sidebars' );
get_template_part( 'includes/theme', 'supports' );
get_template_part( 'includes/theme', 'activate' );
get_template_part( 'includes/theme', 'hooks' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/search', 'result' );


if ( is_admin() && ! wp_doing_ajax() ) {
	//
} else {
	get_template_part( 'includes/lazyload.php' );
	get_template_part( 'includes/enqueue-public' );
	get_template_part( 'includes/search-result' );
}


if ( is_customize_preview() ) {
	get_template_part( 'customizer/wp-customize-range' );
	get_template_part( 'customizer/wp-customize-control-list' );
	get_template_part( 'customizer/wp-customize-tinymce-editor' );
	get_template_part( 'customizer/register-panels' );
	get_template_part( 'customizer/additional-scripts' );
	get_template_part( 'customizer/footer' );
	foreach ( apply_filters( 'home_sections_list', [] ) as $key ) {
		get_template_part( 'customizer/home', $key );
	}
}