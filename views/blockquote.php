<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $blockquote ) && is_array( $blockquote ) && ! empty( $blockquote ) && array_key_exists( 'blockquote', $blockquote ) ) : ?>
	<div class="blockquote row middle-xs">
		<?php if ( array_key_exists( 'foto', $blockquote ) && is_url( $blockquote[ 'foto' ] ) ) : ?>
			<div class="col-xs-3 col-sm-3">
				<figure class="author">
					<img
						<?php echo is_customize_preview() ? 'src="' . $blockquote[ 'foto' ] . '"' : 'src="#" data-src="' . $blockquote[ 'foto' ] . '"'; ?>
						alt="<?php echo ( array_key_exists( 'name', $blockquote ) ) ? esc_attr( $blockquote[ 'name' ] ) : ''; ?>"/>
					<?php if ( array_key_exists( 'name', $blockquote ) && ! empty( $blockquote[ 'name' ] ) ) : ?>
						<figcaption class="hide"><?php echo $blockquote[ 'name' ]; ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
		<?php endif; ?>						
		<div class="col-xs-9 col-sm-9">
			<blockquote>
				<p><?php echo $blockquote[ 'blockquote' ]; ?></p>
				<?php if ( ( array_key_exists( 'name', $blockquote ) && ! empty( $blockquote[ 'name' ] ) ) || ( array_key_exists( 'title', $blockquote ) && ! empty( $blockquote[ 'name' ] = $blockquote[ 'title' ] ) ) ) : ?>
					<cite><?php echo $blockquote[ 'name' ]; ?></cite>
				<?php endif; ?>
			</blockquote>
		</div>
	</div>
<?php endif; ?>