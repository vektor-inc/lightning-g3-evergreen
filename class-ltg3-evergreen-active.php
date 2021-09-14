<?php
/**
 * EVERGREEEN Active Function
 *
 * @package         LIGHTNING_G3_EVERGREEN
 */

if ( ! class_exists( 'LTG3_EVERGREEN_Active' ) ) {

	/**
	 * EVERGREEEN Active Function
	 */
	class LTG3_EVERGREEN_Active {

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp_head', array( $this, 'skin_dynamic_css' ), 3 );
			add_filter( 'body_class', array( $this, 'add_body_class' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_font' ), 12 );
		}

		/**
		 * Undocumented function
		 *
		 * @param array $classes : 改変前の body_class.
		 * @return array $classes : 改変後の body_class.
		 */
		public static function add_body_class( $classes ) {
				return array_merge( $classes, array( 'ltg3-evergreen' ) );
		}

		/**
		 * Add Google Font
		 *
		 * @return void
		 */
		public static function add_font() {
        // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
			wp_enqueue_style( 'ltg3-s-evergreen-googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap', array(), null );
		}

		/**
		 * Print head style
		 *
		 * @return void
		 */
		public function skin_dynamic_css() {

			$options          = get_option( 'lightning_theme_options' );
			$skin_dynamic_css = '';
			$skin_dynamic_css = '
			:root{
                --shadow-primary: 0 0 5px 0 rgba(0, 0, 0, 0.15);
                --shadow-hover: 0 3px 8px 0 rgba(0, 0, 0, 0.15);
                --border-radius-primary:100px;
                --roboto-font-family: "Roboto", sans-serif;
                --vk-size-text-xl: 2rem;
			}';

			// 両サイドのスペースを消す.
			$skin_dynamic_css = trim( $skin_dynamic_css );
			// 改行、タブをスペースへ.
			$skin_dynamic_css = preg_replace( '/[\n\r\t]/', '', $skin_dynamic_css );
			// 複数スペースを一つへ.
			$skin_dynamic_css = preg_replace( '/\s(?=\s)/', '', $skin_dynamic_css );

			wp_add_inline_style( 'lightning-design-style', $skin_dynamic_css );
		}

	}

	$lightning_evergreen = new LTG3_EVERGREEN_Active();

}
