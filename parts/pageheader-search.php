<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$title = __( 'Поиск по сайту', ROPEJUMP_TEXTDOMAIN );
$description = sprintf(
	'%1$s: <span class="pl-1 pr-1 bg-primary">%2$s</span>',
	__( 'Вы искали', ROPEJUMP_TEXTDOMAIN ),
	get_search_query()
);


include get_theme_file_path( 'views/pageheader.php' );