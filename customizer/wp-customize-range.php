<?php


namespace ropejump;


if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( class_exists( 'WP_Customize_Control' ) ) :


	class WP_Customize_Range extends \WP_Customize_Control {

		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$args = wp_parse_args( $args, [
				'min'   => 0,
				'max'   => 10,
				'step'  => 1
			] );
			$this->min  = esc_atts( $args[ 'min' ] );
			$this->max  = esc_atts( $args[ 'max' ] );
			$this->step = esc_atts( $args[ 'step' ] );
			$this->input_attrs = array_merge( $this->input_attrs, [
				'class' => 'range-slider',
				'min'   => $this->min,
				'max'   => $this->max,
				'step'  => $this->step,
				'type'  => 'range',
				'value' => esc_attr( $this->value() ),
				'oninput' => 'jQuery(this).next( \'input\' ).val( jQuery( this ).val() )',
			] );
		}

		public function render_content(){
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php endif; ?>
					<input <?php echo $this->render_atts(); ?> <?php $this->link(); ?> />
					<input type="text" value="<?php echo esc_attr( $this->value() ); ?>" onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" />
				</label>
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