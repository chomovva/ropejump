<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
	<h1><?php echo $title; ?></h1>
<?php endif; ?>

<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
	<p><?php echo $description; ?></p>
<?php endif; ?>