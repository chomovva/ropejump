<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>



<nav class="nav" id="nav">
	<div class="bg"></div>
	<div class="overlay">
		<button class="close"><span class="sr-only"><?php _e( 'Закрыть', ROPEJUMP_TEXTDOMAIN ); ?></span></button>	
		<?php
			get_template_part( 'parts/languages' );
			if ( has_nav_menu( 'main' ) ) {
				wp_nav_menu( array(
					'theme_location'  => 'main',
					'menu'            => 'main',
					'container'       => false,
					'container_class' => 'menu-{menu-slug}-container',
					'container_id'    => '',
					'menu_class'      => 'list',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth'           => 2,
				) );
			}
			if ( is_active_sidebar( 'nav' ) ) {
				get_sidebar();
			}
		?>
	</div>
</nav>