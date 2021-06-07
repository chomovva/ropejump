<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Перевод настроект блока главной "Преимущества"
 * */
function translate_pll_home_advantages_list( $value ) {
	return translate_list_strings( $value, [
		'title'   => 'pll__',
		'excerpt' => 'pll__',
	] );
}


/**
 * Перевод настроект блока главной "Шаги"
 * */
function translate_pll_home_steps_list( $value ) {
	return translate_list_strings( $value, [
		'title'   => 'pll__',
		'excerpt' => 'pll__',
	] );
}


/**
 * Перевод настроект блока главной "отзывы"
 * */
function translate_pll_home_reviews_list( $value ) {
	return translate_list_strings( $value, [
		'title'   => 'pll__',
		'blockquote' => 'pll__',
	] );
}


function add_translation_string_mods () {
	$mods = apply_filters( 'template_pll_theme_mod_translate', [
		'headerpanelcalllabel'      => 'pll__',
		'homejumbotrontitle'        => 'pll__',
		'homejumbotrondescription'  => 'pll__',
		'homejumbotronbtnlabel'     => 'pll__',
		'homejumbotronbtnhref'      => 'pll__',
		'homejumbotroncounterlabel' => 'pll__',
		'homeabouttitle'            => 'pll__',
		'homeaboutdescription'      => 'pll__',
		'homeaboutauthorname'       => 'pll__',
		'homeaboutblockquote'       => 'pll__',
		'homeadvantagestitle'       => 'pll__',
		'homeadvantagesdescription' => 'pll__',
		'homeadvantages'            => 'ropejump\translate_pll_home_advantages_list',
		'homeordertitle'            => 'pll__',
		'homeorderdescription'      => 'pll__',
		'homeorderformshortcode'    => 'pll__',
		'homegallerytitle'          => 'pll__',
		'homegallerydescription'    => 'pll__',
		'homegallerylabel'          => 'pll__',
		'homegallerypermalink'      => 'pll__',
		'homestepstitle'            => 'pll__',
		'homestepsdescription'      => 'pll__',
		'homesteps'                 => 'ropejump\translate_pll_home_steps_list',
		'homereviewstitle'          => 'pll__',
		'homereviewsdescription'    => 'pll__',
		'homereviewslabel'          => 'pll__',
		'homereviewspermalink'      => 'pll__',
		'homereviews'               => 'ropejump\translate_pll_home_reviews_list',
		'homefeedbacktitle'         => 'pll__',
		'homefeedbackdescription'   => 'pll__',
		'homefeedbackformshortcode' => 'pll__',
		'footersocialcopyright'     => 'pll__',
		'footersocialfacebook'      => 'pll__',
		'footersocialinstagram'     => 'pll__',
		'archivetitleprefix'        => 'pll__',
	] );
	foreach ( $mods as $name => $func ) {
		add_filter( 'theme_mod_' . $name, $func, 10, 1 );
	}
}

add_action( 'init', 'ropejump\add_translation_string_mods', 10, 0 );