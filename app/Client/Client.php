<?php
/**
 * App > Client > Client.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Inc\Traits\Instantiator;
use HQFW\Inc\Plugins;
use HQFW\Client\Inc\Helper;
use HQFW\Client\Actions;
use HQFW\Client\Filters;
use HQFW\Client\Events;
use HQFW\Client\Shortcodes;
use HQFW\Client\Style;

defined( 'ABSPATH' ) || exit;

/**
 * The `Client` class contains all the services and
 * settings that needs to be loaded in the client
 * side or front-end.
 *
 * @since 1.0.0
 */
final class Client {

	/**
	 * Inherit Singleton.
     *
     * @since 1.0.0
	 */
	use Singleton;

    /**
     * Inherit Instantiator.
     *
     * @since 1.0.0
     */
    use Instantiator;

    /**
     * Holds the settings.
     *
     * @since 1.0.0
     *
     * @var array
     */
    private $settings;

	/**
     * Initialize.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        if ( Helper::plugin_has_error() ) {
            return;
        }

        $this->settings = get_option( '_hqfw_main_settings' );
        if ( $this->settings['gn_enable'] == false ) {
            return;
        }

        if ( ! is_admin() ) {
            add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
        }

        /**
         * Instantiate or load services.
         */
        self::instantiate(array(
            Actions::class,
            Filters::class,
            Events::class,
            Shortcodes::class,
            Style::class,
        ));
    }

    /**
     * Register defined scripts asset.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function register_scripts() {
        $asset                 = include HQFW_PLUGIN_PATH . 'public/client/scripts/hqfw-client.asset.php';
        $asset['src']          = Helper::get_public_src( 'scripts/hqfw-client.js' );
        $asset['dependencies'] = array( 'jquery' );

        $is_zoom_enabled = false;
        if ( $this->settings['gn_pt_enable_zoom'] || $this->settings['gn_pt_enable_lightbox'] ) {
            $is_zoom_enabled = true;
            array_push( $asset['dependencies'], 'zoom' );
        }

        if ( $this->settings['gn_ps_show_add_to_cart'] ) {
            array_push( $asset['dependencies'], 'wc-add-to-cart-variation' );
        }

        wp_register_script( 'hqfw-client', $asset['src'], $asset['dependencies'], $asset['version'], true );
        wp_enqueue_script( 'hqfw-client' );

        wp_localize_script( 'hqfw-client', 'hqfwLocal', array(
            'api'    => 'HNJOELMAFUCOHACM',
            'url'    => admin_url( 'admin-ajax.php' ),
            'plugin' => array(
                'isHATFWActive' => Plugins::is_active( 'handy-added-to-cart-toaster-notifier' ),
                'isHAPFWActive' => Plugins::is_active( 'handy-added-to-cart-popup-notifier' ),
                'isHVTFWActive' => Plugins::is_active( 'handy-product-variation-table' ),
            ),
            'setting' => array(
                'isZoomEnabled' => $is_zoom_enabled,
            ),
            'icon'    => array(
                'searchPlus' => Helper::get_icon( 'bs-search-plus' ),
            ),
            'nonce'   => array(
                'getProductContent' => wp_create_nonce( 'hqfw_get_product_content' ),
            ),
        ));
    }
}
