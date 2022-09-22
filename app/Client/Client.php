<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Client\Inc\Helper;
use HQFW\Client\Filters;
use HQFW\Client\Actions;
use HQFW\Client\Events;
use HQFW\Client\Shortcodes;
use HQFW\Client\Style;

defined( 'ABSPATH' ) || exit;

/**
 * Client.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author Mafel John Cahucom
 */
final class Client {

	/**
	 * Inherit Singleton.
	 */
	use Singleton;

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

        if ( ! is_admin() ) {
            // Enqueue styles and scripts.
            add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
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
            Style::class
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
     * Register all styles.
     *
     * @since 1.0.0
     */
    public function register_styles() {
        if ( ! wp_style_is( 'handy-toaster-css' ) ) {
            wp_register_style( 'handy-toaster-css', Helper::get_asset_src( 'css/handy-toaster.min.css' ), [], '1.0.0', 'all' );
            wp_enqueue_style( 'handy-toaster-css' );
        }
    }

    /**
     * Register all scripts.
     *
     * @since 1..0.0
     */
    public function register_scripts() {
        if ( ! wp_script_is( 'handy-toaster-js' ) ) {
            wp_register_script( 'handy-toaster-js', Helper::get_asset_src( 'js/handy-toaster.min.js' ), [], '1.0.0', true );
            wp_enqueue_script( 'handy-toaster-js' );
        }

        if ( ! wp_script_is( 'zoom' ) ) {
            wp_register_script( 'zoom', Helper::get_asset_src( 'zoom/jquery.zoom.min.js' ), [], '', true );
            wp_enqueue_script( 'zoom' );
        }

        wp_register_script( 'hqfw-client-js', Helper::get_asset_src( 'js/hqfw-client.min.js' ), [], '1.0.0', true );
        wp_enqueue_script( 'hqfw-client-js' );

        // Get settings.
        $settings = get_option( '_hqfw_main_settings' );

        // Localize variables.
        wp_localize_script( 'hqfw-client-js', 'hqfwLocal', [
            'crafter' => 'Y35qwbAlyt+y60cldwAatUDyxikpRb30wBPT9Y1Xymk=',
            'url'     => admin_url( 'admin-ajax.php' ),
            'nonce'   => [
                'getProductContent' => wp_create_nonce( 'hqfw_get_product_content' )
            ]
        ]);
    }
}
