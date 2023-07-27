<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Vk_All_In_One_Expansion_Unit
 */

// Require composer dependencies.
require_once dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php';

// If we're running in WP's build directory, ensure that WP knows that, too.
if ( 'build' === getenv( 'LOCAL_DIR' ) ) {
	define( 'WP_RUN_CORE_TESTS', true );
}

// Determine the tests directory (from a WP dev checkout).
// Try the WP_TESTS_DIR environment variable first.
$_tests_dir = getenv( 'WP_TESTS_DIR' );

// Next, try the WP_PHPUNIT composer package.
if ( ! $_tests_dir ) {
	$_tests_dir = getenv( 'WP_PHPUNIT__DIR' );
}

// See if we're installed inside an existing WP dev instance.
if ( ! $_tests_dir ) {
	$_try_tests_dir = dirname( __FILE__ ) . '/../../../../../tests/phpunit';
	if ( file_exists( $_try_tests_dir . '/includes/functions.php' ) ) {
		$_tests_dir = $_try_tests_dir;
	}
}
// Fallback.
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

// Do not try to load JavaScript files from an external URL - this takes a
// while.
define( 'GUTENBERG_LOAD_VENDOR_SCRIPTS', false );

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	register_theme_directory(  dirname( dirname( __FILE__ ) ) . '/temp/themes' );
	search_theme_directories();

	// Lightning 有効化（インストールは wp-env.json で行っている）
	switch_theme( 'lightning' );
	// テスト時になぜか g2 モードになるので、g3 に変更
	update_option( 'lightning_theme_generation', 'g3' );

	require dirname( dirname( __FILE__ ) ) . '/temp/plugins/lightning-g3-pro-unit/lightning-g3-pro-unit.php';

	// Evergreen 有効化
	$plugin_file = get_option('active_plugins');
	$plugin_file[] = 'lightning-g3-evergreen/lightning-g3-evergreen.php';
	update_option('active_plugins', $plugin_file);

	// Evergreen 有効化 確認
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
	$evergreen = is_plugin_active('lightning-g3-evergreen/lightning-g3-evergreen.php');
	print '<pre style="text-align:left">';
	print_r($evergreen);
	print '</pre>';
	echo '━━━━━━━━━━━ Evergreen active ━━━━━━━━━━━'."<br>\n";
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

/**
 * Adds a wp_die handler for use during tests.
 *
 * If bootstrap.php triggers wp_die, it will not cause the script to fail. This
 * means that tests will look like they passed even though they should have
 * failed. So we throw an exception if WordPress dies during test setup. This
 * way the failure is observable.
 *
 * @param string|WP_Error $message The error message.
 *
 * @throws Exception When a `wp_die()` occurs.
 */
function fail_if_died( $message ) {
	if ( is_wp_error( $message ) ) {
		$message = $message->get_error_message();
	}

	throw new Exception( 'WordPress died: ' . $message );
}
tests_add_filter( 'wp_die_handler', 'fail_if_died' );

$GLOBALS['wp_tests_options'] = array(
	'gutenberg-experiments' => array(
		'gutenberg-widget-experiments' => '1',
	),
);

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';

// Use existing behavior for wp_die during actual test execution.
remove_filter( 'wp_die_handler', 'fail_if_died' );
