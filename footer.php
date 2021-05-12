<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


			</main>
			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-6 col-sm-4 first-sm col-md-4 col-lg-4">
							<p class="copyright"><?php echo get_theme_mod( 'footersocialcopyright' ); ?></p>
						</div>
						<div class="col-xs-12 first-xs col-sm-4 col-md-4 col-lg-4">
							<?php get_template_part( 'parts', 'socials', 'footer' ); ?>
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