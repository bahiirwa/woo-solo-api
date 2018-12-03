<?php
/**
 *
 * Plugin main file
 *
 * @link                 https://madebydenis.com
 * @since                1.0.0
 * @package              Woo_Solo_Api
 *
 * Plugin Name:          Woo Solo Api
 * Plugin URI:           https://wordpress.org/plugins/woo-solo-api/
 * Description:          This plugin provides integration of the SOLO API service with WooCommerce.
 * Version:              1.9.4
 * Author:               Denis Žoljom
 * Author URI:           https://madebydenis.com
 * License:              GPL-2.0+
 * License URI:          http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:          woo-solo-api
 * Domain Path:          /languages
 * WC requires at least: 3.0.0
 * WC tested up to:      3.5.2
 */

namespace Woo_Solo_Api;

use Woo_Solo_Api\Includes as Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

/**
 * Include the autoloader so we can dynamically include the rest of the classes.
 *
 * @since 1.8.1
 * @package Woo_Solo_Api
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-solo-api-activator.php
 */
function activate_woo_solo_api() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
  Includes\Activator::activate();
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\\activate_woo_solo_api' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woo_solo_api() {
  $plugin = new Includes\Woo_Solo_Api();
  $plugin->run();
}

run_woo_solo_api();
