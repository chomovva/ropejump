<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$socials = [];

foreach ( apply_filters( 'social_networks', [] ) as $key => $label ) {
	$url = get_theme_mod( 'footersocial' . $key );
	if ( ! empty( $url ) ) {
		$socials[] = [
			'url'   => $url,
			'key'   => $key,
			'label' => $label,
		];
	}
}


?>


			</main>
			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-6 col-sm-4 first-sm col-md-4 col-lg-4">
							<p id="footer-copyright" class="copyright"><?php echo get_theme_mod( 'footersocialcopyright' ); ?></p>
						</div>
						<div class="col-xs-12 first-xs col-sm-4 col-md-4 col-lg-4">
							<div id="footer-socials">
								<?php get_template_part( 'parts/socials', null, $socials ); ?>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<p class="developer"><?php _e( 'Разработка: <a href="https://chomovva.ru/">chomovva</a>', ROPEJUMP_TEXTDOMAIN ); ?></p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php
			wp_footer();
			do_action( 'body_end' );
		?>
	</body>
</html>