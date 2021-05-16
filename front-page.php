<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();

foreach ( apply_filters( 'home_section_list', [ 'about', 'advantages', 'order', 'steps', 'gallery', 'reviews', 'feedback' ] ) as $key ) {
	if ( get_theme_mod( 'home' . $key . 'usedby' ) ) {
		get_template_part( 'parts/home', $key );
	}
}

get_footer();