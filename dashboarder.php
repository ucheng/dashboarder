<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           dashboarder
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Dashboarder
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       An advanced custom WordPress dashboard that helps you anything out in one page.
 * Version:           1.0.0
 * Author:            Bard and Yucheng Wang
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dashboarder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/dashboarder-activator.php
 */
function activate_dashboarder() {
	require_once plugin_dir_path(__FILE__) . 'includes/dashboarder-activator.php';
	Dashboarder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/dashboarder-deactivator.php
 */
function deactivate_dashboarder() {
	require_once plugin_dir_path(__FILE__) . 'includes/dashboarder-deactivator.php';
	Dashboarder_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_dashboarder');
register_deactivation_hook(__FILE__, 'deactivate_dashboarder');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/dashboarder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dashboarder() {

	$plugin = new Dashboarder();
	$plugin->run();

}
run_dashboarder();
