<?php
/**
 * Plugin Name:     Lightning G3 Evergreen
 * Plugin URI:      （プラグインの解説ページのURL）
 * Description:     WordPressテーマ「Lightning」とPro版プラグイン「Lightning G3 Pro Unit」専用の拡張スキン「Evergreen」を追加するプラグインです。テーマ「Lightning」とPro版プラグイン「Lightning G3 Pro Unit」を有効化した後に、「カスタマイズ > Lightning デザイン設定 > デザインスキン」のプルダウンで「Evergreen」が選択出来るようになります。
 * Author:          Vektor,Inc.
 * Author URI:      https://vektor-inc.co.jp
 * Text Domain:     lightning-g3-evergreen
 * Domain Path:     /languages
 * Version:         0.0.6
 *
 * @package         LIGHTNING_G3_EVERGREEN
 */

$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );
define( 'EVERGREEN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'EVERGREEN_URL', plugin_dir_url( __FILE__ ) );
define( 'EVERGREEN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EVERGREEN_VERSION', $data['version'] );


/**
 * Plugin Updater
 */
require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker( // phpcs:ignore
	'https://vws.vektor-inc.co.jp/updates/?action=get_metadata&slug=lightning-g3-evergreen',
	__FILE__,
	'lightning-g3-evergreen'
);

/******************************************
 * Load Only Lightning Active
 */
// 現在のテーマ
$current_theme = get_template();
// is_plugin_active を使うための準備
include_once ABSPATH . 'wp-admin/includes/plugin.php';

// テーマが Lightning でなかったらこれ以上何もしない
if ( 'lightning' !== $current_theme ) {
	return;
}
// 世代が  G3 でなかったらこれ以上何もしない
if ( 'g3' !== get_option( 'lightning_theme_generation' ) ) {
	return;
}
// Lightning G3 Pro Unit が有効でなかったらこれ以上何もしない
if ( ! is_plugin_active( 'lightning-g3-pro-unit/lightning-g3-pro-unit.php' ) ) {
	return;
}

/**
* Load Block Patterns
*/
require dirname( __FILE__ ) . '/inc/patterns-data/class-register-patterns-from-json.php';

/**
 * Load Preset Patterns
 */
require dirname( __FILE__ ) . '/presets.php';


/**
 * Set Lightning Design Skin
 *
 * @param array $skins : Skin information.
 * @return array $skins : Skin information.
 */
function ltg3_add_skin_evergreen( $skins ) {

	$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

	$skins['evergreen'] = array(
		'label'          => __( 'Evergreen', 'lightning-g3-evergreen' ),
		'css_url'        => plugin_dir_url( __FILE__ ) . 'assets/css/style.css',
		'css_path'       => plugin_dir_path( __FILE__ ) . 'assets/css/style.css',
		'editor_css_url' => plugin_dir_url( __FILE__ ) . 'assets/css/editor.css',
		'php_path'       => plugin_dir_path( __FILE__ ) . 'class-ltg3-evergreen-active.php',
		'version'        => $data['version'],
	);
	return $skins;
}
add_filter( 'lightning_g3_skins', 'ltg3_add_skin_evergreen' );
