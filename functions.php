<?php
// bodyクラスを追加
add_filter(
    'body_class',
    function ( $classes ) {
        return array_merge( $classes, array( 'ltg3-s-evergreen' ) );
    }
);

// Google Fontを追加.
add_action(
    'wp_enqueue_scripts',
    function () {
        // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
        wp_enqueue_style( 'ltg3-s-evergreen-googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap', array(), null );
    },
    12
);


/*
	Load Transration
--------------------------------------------- */

if ( ! class_exists( 'LTG3_EVERGREEN_Active' ) ) {

	class LTG3_EVERGREEN_Active {

		public function __construct() {
			add_action( 'wp_head', array( $this, 'skin_dynamic_css' ), 3 );
		}

		/*
			print head style
		--------------------------------------------- */
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
                --icon-top-over:-20%;
			}';


			// 両サイドのスペースを消す
			$skin_dynamic_css = trim( $skin_dynamic_css );
			// 改行、タブをスペースへ
			$skin_dynamic_css = preg_replace( '/[\n\r\t]/', '', $skin_dynamic_css );
			// 複数スペースを一つへ
			$skin_dynamic_css = preg_replace( '/\s(?=\s)/', '', $skin_dynamic_css );

			wp_add_inline_style( 'lightning-design-style', $skin_dynamic_css );
		} // public function skin_dynamic_css(){

	} // class LTG3_EVERGREEN_Active {

	$lightning_evergreen = new LTG3_EVERGREEN_Active();

} // if ( ! class_exists( 'LTG3_EVERGREEN_Active' ) ) {