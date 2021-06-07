<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>



<section class="section section--steps" id="steps">
	<div class="container">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 id="steps-title"><?php echo $title; ?></h2>
		<?php endif; ?>
		
		<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
			<p id="steps-description"><?php echo $description; ?></p>
		<?php endif; ?>
		
		<?php if ( isset( $content ) && ! empty( trim( $content ) ) ) : ?>
			<div id="steps-wrap" class="wrap">
				<div class="row center-xs">
					<?php echo $content; ?>
				</div>
			</div>
		<?php endif; ?>


	</div>
</section>