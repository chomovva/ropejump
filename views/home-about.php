<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--about" id="about">
	<div class="container">
		<div class="row center-xs">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 first-lg">

				<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
					<h2 class="title"><?php echo $title; ?></h2>
				<?php endif; ?>

				<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
					<div class="description"><?php echo $description; ?></div>
				<?php endif; ?>

			</div>

			<div class="col-xs-6 first-xs col-sm-5 col-md-3 col-lg-4 col-lg-offset-1">
				<figure class="thumbnail">
					<img src="./userfiles/about.jpg" alt="">
				</figure>
			</div>

		</div>
	</div>
</section>