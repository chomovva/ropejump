<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry mb-3 mt-3', get_the_ID() ); ?> >
	<div class="row">
		<div class="col-xs-10 col-sm col-md">
			<h2 class="title"><a href="<?php the_permalink( get_the_ID() ); ?>"><?php the_title( '', '', true ); ?></a></h2>
			<div class="excerpt">
				<?php the_excerpt(); ?>
				<div class="row middle-xs">
					<div class="col-xs-6 text-left">
						<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?>
					</div>
					<div class="col-xs-6 text-right">
						<a class="btn btn-default" href="<?php the_permalink( get_the_ID() ); ?>"><?php _e( 'Подрбнее', ROPEJUMP_TEXTDOMAIN ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-1 first-xs">
			<div class="counter"></div>
		</div>
	</div>
</article>