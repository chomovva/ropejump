<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--reviews" id="reviews">
	<div class="container">
		
		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 id="reviews-title"><?php echo $title; ?></h2>
		<?php endif; ?>
		
		<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
			<p id="reviews-description"><?php echo $description; ?></p>
		<?php endif; ?>
		
		<?php if ( isset( $content ) && ! empty( trim( $content ) ) ) : ?>
			<div id="reviews-wrap" class="row center-xs"><?php echo $content; ?></div>
		<?php endif; ?>
		
		<?php if ( isset( $permalink ) && ! empty( $permalink ) && isset( $label ) && ! empty( $label ) ) : ?>
			<p class="text-center mt-3">
				<a id="reviews-permalink" class="btn btn-success" href="<?php echo $permalink; ?>"><?php echo $label; ?></a>
			</p>
		<?php endif; ?>

	</div>
</section>