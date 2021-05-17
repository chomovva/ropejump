<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<section class="section section--about" id="about">
	<div class="container">
		<div class="row center-xs">

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 first-lg">

				<?php if ( isset( $title ) && ! empty( $title ) ) : ?>
					<h2 id="about-title" class="title"><?php echo $title; ?></h2>
				<?php endif; ?>

				<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
					<div id="about-description" class="description"><?php echo $description; ?></div>
				<?php endif; ?>

				<?php if ( isset( $blockquote ) && is_array( $blockquote ) && ! empty( $blockquote ) ) : ?>
					<div id="about-blockquote">
						<?php include get_theme_file_path( 'views/blockquote.php' ); ?>
					</div>
				<?php endif; ?>

			</div>

			<?php if ( isset( $thumbnail_src ) && is_url( $thumbnail_src ) ) : ?>
				<div class="col-xs-6 first-xs col-sm-5 col-md-3 col-lg-4 col-lg-offset-1">
					<figure id="about-thumbnail" class="thumbnail">
						<img
							src="<?php echo $thumbnail_src; ?>"
							alt="<?php echo ( isset( $thumbnail_alt ) && ! empty( $thumbnail_alt ) ) ? $thumbnail_alt : ( ( isset( $title ) && ! empty( $title ) ) ? $title : '' ); ?>"
						/>
					</figure>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>