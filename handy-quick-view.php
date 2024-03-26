<?php
/**
 * Plugin Name:          Handy Quick View For WooCommerce
 * Description:          Handy Quick View is a very helpful WooCommerce plugin that enables store owners to design a custom Quick View modal that enables customers to get a quick look at a product without visiting the product page.
 * Author:               Mafel John Cahucom
 * Author URI:           https://www.facebook.com/mafeljohn.cahucom
 * Version:              1.0.0
 * Text Domain:          handy-quick-view
 * Domain Path:          /languages
 * Requires at least:    5.8
 * WC requires at least: 5.0.0
 * License:              GPLv2 or later
 */

defined( 'ABSPATH' ) || exit;

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( ! defined( 'HQFW_PLUGIN_DOMAIN' ) ) {
    define( 'HQFW_PLUGIN_DOMAIN', 'handy-quick-view' );
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
    register_activation_hook( __FILE__, [ 'HQFW\\Inc\\Installer', 'activate' ] );

    register_deactivation_hook( __FILE__, [ 'HQFW\\Inc\\Installer', 'deactivate' ] );
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    if ( class_exists( 'HQFW\\Init' ) ) {
        HQFW\Init::get_instance();
    }
} else {
    add_action( 'admin_notices', function() {
        echo sprintf(
            '<div class="notice notice-error is-dismissible"><p>%s</p></div>',
            'Handy Quick View for WooCommerce requires WooCommerce Plugin to be activated. Please install WooCommerce to continue.'
        );
    });
}