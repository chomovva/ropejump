<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$call_label = trim( get_theme_mod( 'headerpanelcalllabel' ) );
$call_href = esc_attr( get_theme_mod( 'headerpanelcallhref' ) );


?>


<div class="panel">
	<div class="container">
		
		<?php the_custom_logo(); ?>

		<?php if ( ! empty( $call_label ) && ! empty( $call_href ) ) : ?>
			<a id="panel-call" class="call" href="<?php echo $call_href; ?>"><?php echo $call_label; ?></a>
		<?php endif; ?>
		
		<button class="burger" id="burger">
			<span class="bar bar1"></span>
			<span class="bar bar2"></span>
			<span class="bar bar3"></span>
			<span class="sr-only"><?php _e( 'Меню', ROPEJUMP_TEXTDOMAIN ); ?></span>
		</button>

	</div>
</div>