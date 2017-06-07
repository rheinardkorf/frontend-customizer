<?php
/**
 * FE Customizer
 *
 * @package   FECustomizer
 * @copyright Copyright(c) 2017, XWP
 * @licence http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 * Plugin Name: FE Customizer
 * Plugin URI: https://rheinardkorf.com
 * Description: Give a description for FE Customizer.
 * Version: 0.1-alpha
 * Author: XWP
 * Author URI: https://xwp.co
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: fe-customizer
 * Domain Path: languages
 * Network: ${pluginNetworkEnabled}
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup the plugin auto loader.
require_once( 'php/autoloader.php' );

/**
 * Admin notice for incompatible versions of PHP.
 */
function _fe_customizer_php_version_error() {
	printf( '<div class="error"><p>%s</p></div>', esc_html( _fe_customizer_php_version_text() ) );
}

/**
 * String describing the minimum PHP version.
 *
 * "Namespace" is a PHP 5.3 introduced feature. This is a hard requirement
 * for the plugin structure.
 *
 * "Traits" is a PHP 5.4 introduced feature. Remove "Traits" support from
 * php/autoloader if you want to support a lower PHP version.
 * Remember to update the checked version below if you do.
 *
 * @return string
 */
function _fe_customizer_php_version_text() {
	return __( 'FE Customizer plugin error: Your version of PHP is too old to run this plugin. You must be running PHP 5.4 or higher.', 'fe-customizer' );
}

// If the PHP version is too low, show warning and return.
if ( version_compare( phpversion(), '5.4', '<' ) ) {
	if ( defined( 'WP_CLI' ) ) {
		WP_CLI::warning( _fe_customizer_php_version_text() );
	} else {
		add_action( 'admin_notices', '_fe_customizer_php_version_error' );
	}

	return;
}

/**
 * Get the plugin object.
 *
 * @return \FECustomizer\PluginInterface
 */
function fe_customizer() {
	static $instance;

	if ( null === $instance ) {
		$instance = new \FECustomizer\Plugin();
	}

	return $instance;
}

/**
 * Setup the plugin instance.
 */
fe_customizer()
	->set_basename( plugin_basename( __FILE__ ) )
	->set_directory( plugin_dir_path( __FILE__ ) )
	->set_file( __FILE__ )
	->set_slug( 'fe-customizer' )
	->set_url( plugin_dir_url( __FILE__ ) );

/**
 * Register plugin components.
 */
fe_customizer()
	->register_component( new \FECustomizer\View\AdminMenu() );

/**
 * Sometimes we need to do some things after the plugin is loaded, so call the PluginInterface::plugin_loaded().
 */
add_action( 'plugins_loaded', array( fe_customizer(), 'plugin_loaded' ) );
