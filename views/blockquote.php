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
						class="lazy"
						src="#"
						data-src="<?php echo $blockquote[ 'foto' ] ); ?>"
						alt="<?php echo ( array_key_exists( 'author', $blockquote ) ) ? esc_attr( $blockquote[ 'author' ] ) : ''; ?>"/>
					<?php if ( array_key_exists( 'author', $blockquote ) ) && ! empty( $blockquote[ 'author' ] ) ) : ?>
						<figcaption class="hide"><?php echo $blockquote[ 'author' ]; ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
		<?php endif; ?>						
		<div class="col-xs-9 col-sm-9">
			<blockquote>
				<p><?php echo $blockquote[ 'blockquote' ]; ?></p>
				<?php if ( array_key_exists( 'author', $blockquote ) ) && ! empty( $blockquote[ 'author' ] ) ) : ?>
					<cite><?php echo $blockquote[ 'author' ]; ?></cite>
				<?php endif; ?>
			</blockquote>
		</div>
	</div>
<?php endif; ?>