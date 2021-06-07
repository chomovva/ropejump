<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : $blockquote = &$entry; ?>
	<?php
		if (
			true
			&& array_key_exists( 'foto', $blockquote )
			&& is_array( $blockquote[ 'foto' ] )
			&& array_key_exists( 'url', $blockquote[ 'foto' ] ) 
		) {
			$blockquote[ 'foto' ] =  $blockquote[ 'foto' ][ 'url' ];
		}
	?>
	<div class="col-xs-12 col-sm-9 col-md-6 mb-3">
		<?php include get_theme_file_path( 'views/blockquote.php' ); ?>
	</div>
<?php endif; ?>