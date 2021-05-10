<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>



<nav class="nav" id="nav">
	<div class="bg"></div>
	<div class="overlay">
		<button class="close"><span class="sr-only">Закрыть</span></button>
		<ul class="languages">
			<li><a href="#">Ru</a></li>
			<li class="current">Uk</li>
		</ul>
		<?php
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
				//
			}
		?>
	</div>
</nav>