<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Inc\Plugins;
use HQFW\Client\Inc\Helper;
use HQFW\Client\Actions;
use HQFW\Client\Filters;
use HQFW\Client\Events;
use HQFW\Client\Shortcodes;
use HQFW\Client\Style;

defined( 'ABSPATH' ) || exit;

/**
 * Client.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */
final class Client {

	/**
	 * Inherit Singleton.
     * 
     * @since 1.0.0
	 */
	use Singleton;

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
        // Check if plugin has error.
        if ( Helper::plugin_has_error() ) {
            return;
        }

        // Check if the plugin is enable in front-end.
        $this->settings = get_option( '_hqfw_main_settings' );
        if ( $this->settings['gn_enable'] == false ) {
            return;
        }

        if ( ! is_admin() ) {
            // Enqueue styles and scripts.
            add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
        }

        // Register all classes.
        self::register_classes();
    }

    /**
     * Returns all the class services.
     *
     * @return array  List of classes
     */
    private static function get_classes() {
        return [
            Filters::class,
            Actions::class,
            Events::class,
            Shortcodes::class,
            Style::class,
        ];
    }

    /**
     * Loop through the services classes and instantiate each class.
     *
     * @since 1.0.0
     */
    private static function register_classes() {
        foreach ( self::get_classes() as $class ) {
            if ( method_exists( $class, 'get_instance' ) ) {
                self::instantiate( $class );
            }
        }
    }

    /**
     * Instantiate the given service class.
     *
     * @since 1.0.0
     *
     * @param  class  $class  Containing a class from self::get_classes().
     * @return class
     */
    private static function instantiate( $class ) {
        $class::get_instance();
    }

    /**
     * Register all scripts.
     *
     * @since 1..0.0
     */
    public function register_scripts() {
        // Include dependency.
        $dependency = [ 'jquery' ];

        // Zoom dependency.
        $is_zoom_enabled = false;
        if ( $this->settings['gn_pt_enable_zoom'] || $this->settings['gn_pt_enable_lightbox'] ) {
            $is_zoom_enabled     = true;
            $dependency[] = 'zoom';
        }

        // Add to cart variation dependency.
        if ( $this->settings['gn_ps_show_add_to_cart'] ) {
            $dependency[] = 'wc-add-to-cart-variation';
        }

        // Client js.
        $source  = Helper::get_asset_src( 'js/hqfw-client.min.js' );
        $version = Helper::get_asset_version( 'js/hqfw-client.min.js' );
        wp_register_script( 'hqfw-client', $source, $dependency, $version, true );
        wp_enqueue_script( 'hqfw-client' );

        // Localize variables.
        wp_localize_script( 'hqfw-client', 'hqfwLocal', [
            'crafter' => 'Y35qwbAlyt+y60cldwAatUDyxikpRb30wBPT9Y1Xymk=',
            'url'     => admin_url( 'admin-ajax.php' ),
            'plugin'  => [
                'isHATFWActive' => Plugins::is_active( 'handy-added-to-cart-toaster-notifier' ),
                'isHAPFWActive' => Plugins::is_active( 'handy-added-to-cart-popup-notifier' ),
                'isHVTFWActive' => Plugins::is_active( 'handy-product-variation-table' )
            ],
            'setting' => [
                'isZoomEnabled' => $is_zoom_enabled
            ], 
            'icon'    => [
                'searchPlus' => Helper::get_icon( 'bs-search-plus' )
            ],
            'nonce'   => [
                'getProductContent' => wp_create_nonce( 'hqfw_get_product_content' )
            ]
        ]);
    }
}
