<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo apply_filters( 'breadcrumbs_before', '<div class="breadcrumbs" id="bredcrumbs">' );

if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb();
} else {
	if ( ! is_front_page() ) {
		echo '<a href="';
		echo home_url();
		echo '">'.__( 'Главная', ROPEJUMP_TEXTDOMAIN );
		echo "</a> » ";
		if ( is_category() || is_single() ) {
				the_category(' ');
				if ( is_single() ) {
						echo " » ";
						the_title();
				}
		} elseif ( is_page() ) {
				echo the_title();
		}
	}
	else {
		echo __( 'Домашняя страница', ROPEJUMP_TEXTDOMAIN );
	}
}

echo apply_filters( 'breadcrumbs_after', '</div>' );