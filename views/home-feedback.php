<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section
	class="section section--feedback lazy"
	id="feedback"
	<?php if ( isset( $bgi_src ) && ! empty( $bgi_src ) ) : echo ( is_customize_preview() ) ? 'style="background-image: url(' . $bgi_src . ')"' : 'data-src="' . $bgi_src . '"'; endif; ?>
>
	<div class="container">
		<div class="row center-xs">
			<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
				<div class="overlay">

					<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
						<h2 id="feedback-title" class="title"><?php echo $title; ?></h2>
					<?php endif; ?>
					
					<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
						<p  id="feedback-description" class="description"><?php echo $description; ?></p>
					<?php endif; ?>
					
					<?php if ( isset( $form ) ) : echo $form; endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>