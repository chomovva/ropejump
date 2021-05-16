<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--advantages" id="advantages"> 
	<div class="container">

		<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
			<h2><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if ( isset( $description ) && ! empty( $description ) ) : echo wpautop( $description ); endif; ?>		

		<div class="wrap">
			<div class="row">


								<div class="advantages__item item col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="row stratch-xs">
										<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 side side--prev" data-src="./userfiles/bg01.jpg">
											<div class="overlay">
												<img class="logo" src="#" data-src="./userfiles/checked.png" alt="6 років досвіду">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 side side--text">
											<div class="overlay">
												<h3 class="title">6 років досвіду</h3>
												<p>Клуб роупджампінгу працює з 2015 року</p>
											</div>
										</div>
									</div>
								</div>



			</div>
		</div>
	</div>
</section>