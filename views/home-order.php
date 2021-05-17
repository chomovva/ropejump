<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$bgi_attr = '';

if ( ! empty( $bgi_src ) ) {
	if ( is_customize_preview() ) {
		$bgi_attr = 'style="background-image: url(' . $bgi_src . ')"';
	} else {
		$bgi_attr = 'data-src="' . $bgi_src . '"';
	}
}

?>


<section class="section section--order" id="order" <?php echo $bgi_attr; ?> >
	<div class="container">
		
		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 id="order-title"><?php echo $title ?></h2>
		<?php endif; ?>
		
		<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
			<p id="order-description"><?php echo $description ?></p>
		<?php endif; ?>

		<?php if ( isset( $form ) ) : echo $form; endif; ?>
		
	</div>
</section>