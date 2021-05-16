<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$header_bgi_src = esc_attr( get_theme_mod( 'headerbgisrc' ) );


?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	
	<?php get_template_part( 'parts/head' ); ?>
	
	<body <?php body_class(); ?> >

		<?php
			do_action( 'body_start' );
			get_template_part( 'parts/nav' );
		?>

		<div class="wrapper" id="wrapper">

			<header
				class="wrapper__item wrapper__item--header header"
				id="header"
				<?php if ( ! empty( $header_bgi_src ) ) : echo  'data-src="' . $header_bgi_src . '"'; endif; ?>
			>
		
				<?php
					get_template_part( 'parts/panel' );
					if ( is_front_page() ) {
						get_template_part( 'parts/home', 'jumbotron' );
					}
				?>		

			</header>

			<main class="wrapper__item wrapper__item--main main" id="main">