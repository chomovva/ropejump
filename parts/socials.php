<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( isset( $args ) && is_array( $args ) && ! empty( $args ) ) {

	echo apply_filters( 'social_network_before', '<ul class="socials">', $args );

	foreach ( $args as $item ) {

		if ( array_key_exists( 'key', $item ) && array_key_exists( 'url', $item ) && array_key_exists( 'label', $item ) ) {
			printf(
				apply_filters( 'social_network_item_format', '<li><a class="%1$s" href="%2$s" traget="_blank"><span class="sr-only">%3$s</span></a></li>', $item ),
				$item[ 'key' ],
				$item[ 'url' ],
				$item[ 'label' ]
			);
		}

	}

	echo apply_filters( 'social_network_after', '</ul>', $args );

}