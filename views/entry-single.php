<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


include get_theme_file_path( 'views/entry-singular.php' );


?>


<p class="mt-3 text-right small"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?></p>