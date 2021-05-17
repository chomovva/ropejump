<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--advantages" id="advantages"> 
	<div class="container">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2 id="advantages-title"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
			<p id="advantages-description"><?php echo $description; ?></p>
		<?php endif; ?>		

		<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
			<div class="row center-xs wrap" id="advantages-wrap">
				<?php  echo $content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>