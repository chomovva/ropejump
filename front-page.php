<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


get_header();


foreach ( apply_filters( 'home_sections_list', [] ) as $key ) {
	if ( get_theme_mod( 'homesection' . $key . 'usedby' ) ) {
		get_template_part( 'parts/home', $key );
	}
}


get_footer();