<?php
/**
 * Plugin Name:          Handy Quick View For WooCommerce
 * Description:          Handy Quick View For WooCommerce lets you add a modal to view a certain product in your woocommerce store.
 * Author:               Mafel John Cahucom
 * Author URI:           https://www.facebook.com/mafeljohn.cahucom
 * Version:              1.0.0
 * Text Domain:          handy-quick-view
 * Domain Path:          /languages
 * Requires at least:    5.8
 * WC requires at least: 5.0.0
 * License:              GPLv2 or later
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Include the autoloader.
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Define plugin domain.
if ( ! defined( 'HQFW_PLUGIN_DOMAIN' ) ) {
    define( 'HQFW_PLUGIN_DOMAIN', 'handy-quick-view' );
}

// Define plugin version.
if ( ! defined( 'HQFW_PLUGIN_VERSION' ) ) {
    define( 'HQFW_PLUGIN_VERSION', '1.0.0' );
}

// Define plugin basename.
if ( ! defined( 'HQFW_PLUGIN_BASENAME' ) ) {
    define( 'HQFW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

// Define plugin url.
if ( ! defined( 'HQFW_PLUGIN_URL' ) ) {
    define( 'HQFW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

// Define plugin path.
if ( ! defined( 'HQFW_PLUGIN_PATH' ) ) {
    define( 'HQFW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

// Installer.
if ( class_exists( 'HQFW\\Inc\\Installer' ) ) {
    // Plugin Activation.
    register_activation_hook( __FILE__, [ 'HQFW\\Inc\\Installer', 'activate' ] );

    // Plugin Deactivation.
    register_deactivation_hook( __FILE__, [ 'HQFW\\Inc\\Installer', 'deactivate' ] );
}

// Check if WooCommerce Plugin is installed.
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Initialize Plugin.
    if ( class_exists( 'HQFW\\Init' ) ) {
        HQFW\Init::get_instance();
    }
} else {
    echo sprintf(
        '<div class="notice notice-error is-dismissible"><p>%s</p></div>',
        'Handy Quick View for WooCommerce requires WooCommerce Plugin to be activated. Please install WooCommerce to continue.'
    );
}