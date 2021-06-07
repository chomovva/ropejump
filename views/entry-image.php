<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<a
	id="attachment-<?php the_ID(); ?>"
	class="fancybox entry"
	href="<?php echo wp_get_attachment_image_url( get_the_ID(), 'full', false ); ?>"
	data-fancybox="gallery"
>
	<?php echo wp_get_attachment_image( get_the_ID(), 'medium', false, [ 'loading' => 'lazy' ] ); ?>
</a>