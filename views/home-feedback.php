<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section
	class="section section--feedback lazy"
	id="feedback"
	<?php if ( isset( $bgi_src ) && ! empty( $bgi_src ) ) : echo  'data-src="' . $bgi_src . '"'; endif; ?>
>
	<div class="container">
		<div class="row center-xs">
			<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
				<div class="overlay">

					<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
						<h2 id="feedback-title" class="title"><?php echo $title; ?></h2>
					<?php endif; ?>
					
					<?php if ( isset( $excerpt ) && ! empty( $excerpt ) ) : ?>
						<p  id="feedback-excerpt" class="excerpt"><?php echo $excerpt; ?></p>
					<?php endif; ?>
					
					<?php if ( isset( $form ) ) : echo $form; endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>