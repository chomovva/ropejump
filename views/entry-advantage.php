<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : ?>

	<?php
		$bgi_attr = '';
		if ( array_key_exists( 'bgi', $entry ) && is_array( $entry[ 'bgi' ] ) && array_key_exists( 'id', $entry[ 'bgi' ] ) ) {
			$bgi_src = wp_get_attachment_image_url( $entry[ 'bgi' ][ 'id' ], 'large', false );
			if ( is_customize_preview() ) {
				$bgi_attr = 'style="background-image: url(' . $bgi_src . ')"';
			} else {
				$bgi_attr = 'data-src="' . $bgi_src . '"';
			}
		}
	?>

	<div class="entry col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<div class="row stratch-xs">

			<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 side side--prev" <?php echo $bgi_attr; ?> >
				<div class="overlay">

					<?php if ( array_key_exists( 'logo', $entry ) && is_array( $entry[ 'logo' ] ) && array_key_exists( 'id', $entry[ 'logo' ] ) && is_numeric( $entry[ 'logo' ][ 'id' ] ) ) : ?>
						<?php $logo_src = wp_get_attachment_image_url( $entry[ 'logo' ][ 'id' ], 'thumbnail', false ); ?>
						<img
							class="logo"
							<?php echo ( is_customize_preview() ) ? 'src="' . $logo_src . '"' : 'src="#" data-src="' . $logo_src . '"'; ?>
							alt="<?php echo get_post_meta( $entry[ 'logo' ][ 'id' ], '_wp_attachment_image_alt', true ); ?>"
						/>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 side side--text">
				<div class="overlay">

					<?php if ( array_key_exists( 'title', $entry ) && ! empty( $entry[ 'title' ] ) ) : ?>
						<h3 class="title"><?php echo $entry[ 'title' ]; ?></h3>
					<?php endif; ?>
					
					<?php if ( array_key_exists( 'excerpt', $entry ) && ! empty( $entry[ 'excerpt' ] ) ) : ?>
						<p class="excerpt"><?php echo $entry[ 'excerpt' ]; ?></p>
					<?php endif; ?>

				</div>
			</div>

		</div>
	</div>

<?php endif; ?>