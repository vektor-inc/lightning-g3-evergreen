<?php
/**
 * Plugin Name:     Lightning G3 Evergreen
 * Plugin URI:
 * Description:     WordPressテーマ「Lightning」とPro版プラグイン「Lightning G3 Pro Unit」専用の拡張スキン「Evergreen」を追加するプラグインです。テーマ「Lightning」とPro版プラグイン「Lightning G3 Pro Unit」を有効化した後に、「カスタマイズ > Lightning デザイン設定 > デザインスキン」のプルダウンで「Evergreen」が選択出来るようになります。
 * Author:          Vektor,Inc.
 * Author URI:      https://vektor-inc.co.jp
 * Text Domain:     lightning-g3-evergreen
 * Domain Path:     /languages
 * Version:         0.2.7
 * Requires Plugins: lightning-g3-pro-unit
 *
 * @package         LIGHTNING_G3_EVERGREEN
 */

defined( 'ABSPATH' ) || exit;

/**
 * TGM
 */
require __DIR__ . '/inc/tgm-plugin-activation/config.php';

/**
 * Composer autoload
 */
$autoload_path = plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
// vendor ディレクトリがない状態で誤配信された場合に Fatal Error にならないようにファイルの存在確認.
if ( file_exists( $autoload_path ) ) {
	require_once $autoload_path;
}

/**
 * Plugin Updater
 */
if ( class_exists( 'YahnisElsts\PluginUpdateChecker\v5\PucFactory' ) ) {
	$myUpdateChecker = YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker( // phpcs:ignore.
		'https://license.vektor-inc.co.jp/check/?action=get_metadata&slug=lightning-g3-evergreen',
		__FILE__,
		'lightning-g3-evergreen'
	);
}

load_plugin_textdomain( 'lightning-g3-evergreen', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

/******************************************
 * Load Only Lightning Active
 */
// 現在のテーマ.
$ltg3_evergreen_current_themet = get_template();
// is_plugin_active を使うための準備.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

// テーマが Lightning でなかったらこれ以上何もしない.
if ( 'lightning' !== $ltg3_evergreen_current_themet ) {
	return;
}
// 世代が  G3 でなかったらこれ以上何もしない.
if ( 'g3' !== get_option( 'lightning_theme_generation' ) ) {
	return;
}
// Lightning G3 Pro Unit が有効でなかったらこれ以上何もしない.
if ( ! is_plugin_active( 'lightning-g3-pro-unit/lightning-g3-pro-unit.php' ) ) {
	return;
}

$ltg3_evergreen_data = get_file_data( __FILE__, array( 'version' => 'Version' ) );
define( 'LTG3_EVERGREEN_URL', plugin_dir_url( __FILE__ ) );
define( 'LTG3_EVERGREEN_PATH', plugin_dir_path( __FILE__ ) );
define( 'LTG3_EVERGREEN_VERSION', $ltg3_evergreen_data['version'] );

/**
* Load Block Patterns
*/
require __DIR__ . '/inc/patterns-data/class-register-patterns-from-json.php';

/**
 * Load Preset Patterns
 */
require __DIR__ . '/presets.php';

/**
 * Set Lightning Design Skin
 *
 * @param array $skins : Skin information.
 * @return array $skins : Skin information.
 */
function ltg3_evergreen_add_skin( $skins ) {
	$skins['evergreen'] = array(
		'label'          => __( 'Evergreen', 'lightning-g3-evergreen' ),
		'css_url'        => plugin_dir_url( __FILE__ ) . 'assets/css/style.css',
		'css_path'       => plugin_dir_path( __FILE__ ) . 'assets/css/style.css',
		'editor_css_url' => plugin_dir_url( __FILE__ ) . 'assets/css/editor.css',
		'php_path'       => plugin_dir_path( __FILE__ ) . 'class-ltg3-evergreen-active.php',
		'version'        => LTG3_EVERGREEN_VERSION,
	);
	return $skins;
}
add_filter( 'lightning_g3_skins', 'ltg3_evergreen_add_skin' );
