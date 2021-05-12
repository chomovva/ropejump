<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


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

			<header class="wrapper__item wrapper__item--header header" id="header" data-src="./userfiles/firstscreen.jpg"></header>
		
				<?php
					get_template_part( 'parts/panel' );
					if ( is_front_page() ) {
						get_template_part( 'parts/jumbotron' );
					}
				?>		

			</header>

			<main class="wrapper__item wrapper__item--main main" id="main">