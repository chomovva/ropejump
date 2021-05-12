<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Редирект на запись со страницы поиска, если найдена всего одна запись
 */


// function single_result() {
// 	global $wp_query;
// 	if( $wp_query->is_search() ) {
// 		if( $wp_query->post_count == 1 ) {  
// 			wp_redirect( get_permalink( reset( $wp_query->posts )->ID ) );
// 			die;
// 		}
// 	}
// }

// add_action( 'template_redirect', 'ropejump\single_result' );