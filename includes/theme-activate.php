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

	 	// шапка сайта
	 	'headerpanelcalllabel'       => 'Позвонить',
	 	'headerpanelcallhref'        => 'tel:0967943515',
	 	'headerbgisrc'               => '',

	 	// Главная страница - Первый экран
	 	'homejumbotrontitle'         => get_bloginfo( 'name', 'raw' ),
	 	'homejumbotrondescription'   => get_bloginfo( 'description', 'raw' ),
	 	'homejumbotronbtnlabel'      => 'Присоединиться',
	 	'homejumbotronbtnhref'       => '#order',
	 	'homejumbotroncounteruserby' => false,
	 	'homejumbotroncounterlabel'  => 'Следующий прыжок:',
	 	'homejumbotrontimestamp'     => '',

	 	// о нас
	 	'homeaboutusedby'            => false,
	 	'homeabouttitle'             => 'Роупджампинг',
	 	'homeaboutdescription'       => 'Роупджампинг - достаточно молодое направление экстремального спорта и отдыха, суть которого заключается в прыжках с высотных объектов с использованием специального снаряжения. В Мариуполе такая возможность ощутить эйфорию свободного падения и получить дозу адреналина появилась в 2015 году. Основателем организации, которая организует роуп-прыжки является Андрей Шаталин, инструктор по йоге, который профессионально занимается промышленным альпинизмом. С помощью роупджампинг человек помогает людям преодолевать свои страхи.',
	 	'homeaboutblockquoteusedby'  => false,
	 	'homeaboutfotourl'           => '',
	 	'homeaboutauthorfotourl'     => '',
	 	'homeaboutauthorname'        => 'Андрей Шаталин',
	 	'homeaboutblockquote'        => 'Роупджампингом занимаются люди разных профессий и возрастов, цели у них тоже разные. Самому молодому роупджамперу в нашей организации 6 лет, прыгали и экстремалы, которым за 60',

	 	// преимущества
	 	'homeadvantagesusedby'       => false,
	 	'homeadvantagestitle'        => 'Роупджампинг',
	 	'homeadvantagesdescription'  => '',
	 	'homeadvantages'             => [],

	 	// главная страница - Обратная связь
	 	'homefeedbackusedby'         => false,
	 	'homefeedbacktitle'          => 'Напишите нам!',
	 	'homefeedbackexcerpt'        => '',
	 	'homefeedbackformshortcode'  => '',
	 	'homefeedbackbgisrc'         => '',

	 	// подвал сайта
	 	'footersocialcopyright'      => '2021 &copy; Альпсити',
	 	'footersocialfacebook'       => 'https://www.facebook.com/ropejumpmariupol',
	 	'footersocialinstagram'      => 'https://www.instagram.com/ropejumpmrlp/',

	], $mods ) );
}

add_action( 'after_switch_theme', 'ropejump\setup_default_mods' );