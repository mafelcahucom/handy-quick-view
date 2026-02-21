<?php
/**
 * Plugin Name:          Handy Quick View For WooCommerce
 * Description:          Handy Quick View is a powerful WooCommerce plugin that lets customers preview product details instantly through a custom-designed modal for reducing clicks, speeding up browsing, and creating a smoother, more engaging shopping experience.
 * Author:               Mafel John Cahucom
 * Author URI:           https://www.facebook.com/mafeljohn.cahucom
 * Version:              1.0.0
 * Text Domain:          handy-quick-view
 * Domain Path:          /languages
 * Requires at least:    5.8
 * WC requires at least: 5.0.0
 * License:              GPLv3 or later
 */

defined( 'ABSPATH' ) || exit;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! defined( 'HQFW_PLUGIN_VERSION' ) ) {
    define( 'HQFW_PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'HQFW_PLUGIN_BASENAME' ) ) {
    define( 'HQFW_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'HQFW_PLUGIN_URL' ) ) {
    define( 'HQFW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'HQFW_PLUGIN_PATH' ) ) {
    define( 'HQFW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if ( class_exists( 'HQFW\\Inc\\Installer' ) ) {
    register_activation_hook( __FILE__, array( 'HQFW\\Inc\\Installer', 'activate' ) );

    register_deactivation_hook( __FILE__, array( 'HQFW\\Inc\\Installer', 'deactivate' ) );
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
    if ( class_exists( 'HQFW\\Init' ) ) {
        HQFW\Init::get_instance();
    }
} else {
    add_action( 'admin_notices', function() {
        printf(
            '<div class="notice notice-error is-dismissible"><p>%s</p></div>',
            __( 'Handy Quick View for WooCommerce requires WooCommerce Plugin to be activated. Please install WooCommerce to continue.', 'handy-quick-view' )
        );
    });
}
