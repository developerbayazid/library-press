<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/developerbayazid
 * @since             1.0.0
 * @package           Library_Press
 *
 * @wordpress-plugin
 * Plugin Name:       LibraryPress
 * Plugin URI:        https://github.com/developerbayazid/library-press
 * Description:       A comprehensive solution for managing books, authors, and lending in WordPress.
 * Version:           1.0.0
 * Author:            Bayazid Hasan
 * Author URI:        https://github.com/developerbayazid/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       library-press
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LIBRARY_PRESS_VERSION', '1.0.0' );
define( 'LIBRARY_PRESS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'LIBRARY_PRESS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-library-press-activator.php
 */
function activate_library_press() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-library-press-activator.php';
	$activator = new Library_Press_Activator();
	$activator->activate();
	$activator->library_press_installed();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-library-press-deactivator.php
 */
function deactivate_library_press() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-library-press-deactivator.php';
	Library_Press_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_library_press' );
register_deactivation_hook( __FILE__, 'deactivate_library_press' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-library-press.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_library_press() {

	$plugin = new Library_Press();
	$plugin->run();
}
run_library_press();
