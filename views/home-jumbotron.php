<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div id="jumbotron" class="jumbotron">
	<div class="container">
		<div class="row center-xs bottom-xs">

			<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 text-cetner">

				<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
					<h1 id="jumbotron-title" class="title"><?php echo $title; ?></h1>
				<?php endif; ?>
				
				<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
					<p id="jumbotron-description" class="description"><?php echo $description; ?></p>
				<?php endif; ?>
				
				<?php if ( isset( $btn_href ) && ! empty( $btn_href ) && isset( $btn_label ) && ! empty( $btn_label ) ) : ?>
					<a id="jumbotron-permalink" class="permalink" href="<?php echo $btn_href; ?>"><?php echo $btn_label; ?></a>
				<?php endif; ?>

			</div>

			<?php if ( isset( $timestamp ) && ! empty( $timestamp ) && ( $timestamp > time() || is_customize_preview() || ( isset( $counter_label ) && ! empty( $counter_label ) && is_customize_preview() ) ) ) : ?>
				<div class="col-xs-8 col-sm-4 first-sm col-md-3 col-lg-3">
					<?php if ( isset( $counter_label ) && ! empty( $counter_label ) ) : ?>
						<p id="jumbotron-counter-label" class="text-cetner font-weight-bold mt-3"><?php echo $counter_label; ?></p>
					<?php endif; ?>
					<div class="counter" id="jumbotron-counter">
						<div class="value value--day" id="day"><?php echo wp_date( 'l', $timestamp ); ?></div>
						<div class="value value--date" id="date"><?php echo wp_date( 'd', $timestamp ); ?></div>
						<div class="value value--month" id="month"><?php echo wp_date( 'M', $timestamp ); ?></div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>