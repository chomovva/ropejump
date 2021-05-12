<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	update_option( 'theme_mods_' . $theme_slug, array_merge( [

	 	// дополнительные скрипты
	 	'additionalscriptsheadstart' => '',
	 	'additionalscriptsheadend'   => '',
	 	''  => '',
	 	'additionalscriptsbodyend'   => '',

	 	// админпанель
	 	'showadminbarstatus'         => true,

	 	'footersocialcopyright'      => '2021 &copy; Альпсити',
	 	'footersocialfacebook'       => 'https://www.facebook.com/ropejumpmariupol',
	 	'footersocialinstagram'      => '',

	], $mods ) );
}

add_action( 'after_switch_theme', 'ropejump\setup_default_mods' );