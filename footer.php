<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


			</main>
			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">
					<div class="row middle-xs">
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<p class="copyright"><a href="#">2021 &copy; Альпсити</a></p>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<ul class="socials">
								<li><a class="facebook" href="#"><span class="sr-only">Мы в Facebook</span></a></li>
								<li><a class="instagram" href="#"><span class="sr-only">Мы в Instagram</span></a></li>
							</ul>
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
			echo get_theme_mod( 'additionalscriptsbodyend' );
		?>
	</body>
</html>