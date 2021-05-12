<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( class_exists( 'WP_Customize_Control' ) ) :


	class WP_Customize_Control_Tinymce_Editor extends \WP_Customize_Control {

		/**
		 * The type of control being rendered
		 */
		public $type = 'tinymce_editor';


		public function __construct( $manager, $id, $args = [] ) {
			parent::__construct( $manager, $id, $args );
			$this->input_attrs = array_merge( $this->input_attrs, [
				'rows'  => '10',
				'id'    => esc_attr( $this->id ),
				'class' => 'customize-control-tinymce-editor',
			] );
		}

		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'wp-customize-control-tinymce-editor', get_theme_file_uri( 'scripts/wp-customize-control-tinymce-editor.js' ), [ 'jquery' ], filemtime( get_theme_file_path( 'scripts/wp-customize-control-tinymce-editor.js' ) ), true );
			wp_enqueue_script( 'jquery' );
			wp_enqueue_editor();
		}

		/**
		 * Pass our TinyMCE toolbar string to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json[ 'intinymcetoolbar1' ] = isset( $this->input_attrs[ 'toolbar1' ] ) ? esc_attr($this->input_attrs[ 'toolbar1' ] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
			$this->json[ 'intinymcetoolbar2' ] = isset( $this->input_attrs[ 'toolbar2' ] ) ? esc_attr($this->input_attrs[ 'toolbar2' ] ) : '';
		}

		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
				<div class="tinymce-control">
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php endif; ?>
					<textarea <?php echo $this->render_atts(); ?> <?php $this->link(); ?> >
						<?php echo esc_attr($this->value()); ?>
					</textarea>
				</div>
			<?php
		}

		/**
		 * Формирует html код аттрибутов элемента управления формы
		 * @param  array  $atts  ассоциативный массив аттрибут=>значение
		 * @return string        html-код
		 */
		public static function render_atts( array $atts = [] ) {
			$html = '';
			if ( ! empty( $atts ) ) {
				foreach ( $atts as $key => $value ) {
					$html .= ' ' . $key . '="' . $value . '"';
				}
			}
			return $html;
		}

	}


endif;