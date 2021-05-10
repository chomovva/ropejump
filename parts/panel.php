<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="panel">
	<div class="container">
		
		<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			}
		?>

		<a class="call" href="#">Позвонить</a>
		
		<button class="burger" id="burger">
			<span class="bar bar1"></span>
			<span class="bar bar2"></span>
			<span class="bar bar3"></span>
			<span class="sr-only"><?php _e( 'Меню', ROPEJUMP_TEXTDOMAIN ); ?></span>
		</button>

	</div>
</div>