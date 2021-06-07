<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--gallery" id="gallery">
	<div class="container">
		
		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 id="gallery-title"><?php echo $title ?></h2>
		<?php endif; ?>
		
		<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
			<p id="gallery-description"><?php echo $description ?></p>
		<?php endif; ?>
		
		<?php if ( isset( $content ) ) : ?>
			<div class="wrap mb-3" id="gallery-wrap">
				<?php echo $content; ?>			
			</div>
		<?php endif; ?>

		<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
			<p class="text-center mt-3 pt-3">
				<a id="gallery-permalink" class="btn btn-lg btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
			</p>
		<?php endif; ?>

	</div>
</section>