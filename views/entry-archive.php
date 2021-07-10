<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-3 mt-3', get_the_ID() ); ?> >
	<div class="row middle-xs top-sm top-md middle-lg center-xs">
		<div class="col-xs-12 col-sm col-md">
			<h2><a href="<?php the_permalink( get_the_ID() ); ?>"><?php the_title( '', '', true ); ?></a></h2>
			<div class="excerpt">
				<?php the_excerpt(); ?>
				<div class="row middle-xs">
					<div class="col-xs-6 text-left">
						<time class="small" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format', 'j F Y' ) ); ?>
					</div>
					<div class="col-xs-6 text-right">
						<a class="btn btn-default" href="<?php the_permalink( get_the_ID() ); ?>"><?php _e( 'Подробнее', ROPEJUMP_TEXTDOMAIN ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php if ( has_post_thumbnail( get_the_ID() ) && ! empty( $post_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), ( wp_is_mobile() ) ? 'medium' : 'large' ) ) ) : ?>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 first-xs">
				<figure class="ml-0 mr-0 mb-0">
					<a href="<?php the_permalink( get_the_ID() ) ?>">
						<img class="center-block" src="#" data-src="<?php echo $post_thumbnail_url; ?>" alt="<?php the_title_attribute( [ 'post_id' => get_the_ID() ] ) ?>"/>
					</a>
				</figure>
			</div>
		<?php endif; ?>
	</div>
</article>