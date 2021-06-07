<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : $blockquote = &$entry; ?>
	<div class="entry col-xs-12 col-sm-5 col-md-3 col-lg-3">
		
		<div class="counter">
			<div class="value"></div>
		</div>

		<?php if ( array_key_exists( 'logo', $entry ) && is_array( $entry[ 'logo' ] ) && array_key_exists( 'id', $entry[ 'logo' ] ) ) : ?>
			<div
				class="logo"
				<?php if ( is_customize_preview() ) : ?>
					style="background-image: url( <?php echo wp_get_attachment_image_url( $entry[ 'logo' ][ 'id' ], 'thumbnail', false ); ?> );"
				<?php else : ?>
					data-src="<?php echo wp_get_attachment_image_url( $entry[ 'logo' ][ 'id' ], 'thumbnail', false ); ?>"
				<?php endif; ?>
			>
			</div>
		<?php endif; ?>

		<?php if ( array_key_exists( 'title', $entry ) && ! empty( trim( $entry[ 'title' ] ) ) ) : ?>
			<h3 class="title"><?php echo $entry[ 'title' ] ?></h3>
		<?php endif; ?>

		<?php if ( array_key_exists( 'excerpt', $entry ) && ! empty( trim( $entry[ 'excerpt' ] ) ) ) : ?>
			<p class="excerpt"><?php echo $entry[ 'excerpt' ]; ?></p>
		<?php endif; ?>

	</div>
<?php endif; ?>