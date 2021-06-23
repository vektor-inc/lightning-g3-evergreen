<?php
/**
 * Plugin Name:     Lightning G3 Skin Evergreen
 * Plugin URI:      （プラグインの解説ページのURL）
 * Description:     WordPressテーマ「Lightning」の拡張スキン「Evergreen」を追加するプラグインです。有効化した後に、「カスタマイズ > Lightning デザイン設定 > デザインスキン」のプルダウンで「Evergreen」が選択出来るようになります。
 * Author:          Vektor,Inc.
 * Author URI:      https://vektor-inc.co.jp
 * Text Domain:     lightning-g3-skin-evergreen
 * Domain Path:     /languages
 * Version:         0.0.3
 *
 * @package         LIGHTNING_G3_SKIN_EVERGREEN
 */

$current_theme = get_template();
if ( 'lightning' !== $current_theme ) {
	return;
}
if ( 'g3' !== get_option( 'lightning_theme_generation' ) ) {
	return;
}

add_filter( 'lightning_g3_skins', 'ltg3_add_skin_evergreen' );
function ltg3_add_skin_evergreen( $skins ) {

	$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

	// sample の部分が識別名です。好きな名前に変更してください。
	$skins['evergreen'] = array(
		// label が Lightning デザイン設定 のスキン選択プルダウンに表示される名称
		'label'                    => __( 'Evergreen Skin G3', 'lightning-g3-skin-evergreen' ),
		'css_url'                  => plugin_dir_url( __FILE__ ) . '/css/style.css',
		'css_path'                 => plugin_dir_path( __FILE__ ) . '/css/style.css',
		// プラグインディレクトリ名を変更
		'editor_css_path_relative' => '../../plugins/lightning-g3-skin-evergreen/css/editor.css',
		// スキン固有の処理を入れる場合（非推奨）
		'php_path'                 => plugin_dir_path( __FILE__ ) . '/functions.php',
		// 'js_url'                   => plugin_dir_url( __FILE__ ) . '/js/script.js',
		'version'                  => $data['version'],
	);
	return $skins;
}
