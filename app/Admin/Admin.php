<?php
namespace HQFW\Admin;

use HQFW\Inc\Traits\Singleton;
use HQFW\Admin\Inc\Helper;
use HQFW\Admin\Modules\Setting\Setting;
use HQFW\Admin\Modules\ImporterExporter\ImporterExporter;

defined( 'ABSPATH' ) || exit;

/**
 * Admin.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */
final class Admin {

	/**
	 * Inherit Singleton.
     * 
     * @since 1.0.0
	 */
	use Singleton;

    /**
     * Holds all the tabs.
     *
     * @since 1.0.0
     * 
     * @var array
     */
    private $tabs = [];

    /**
     * Initialize.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        // Load all classes.
        self::register_classes();

        // Load admin dashboard.
        add_action( 'admin_menu', [ $this, 'menu' ] );

        if ( Helper::is_correct_menu() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register_menu_styles' ] );
        }

        if ( Helper::is_correct_submenu() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register_submenu_styles' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'register_submenu_scripts' ] );

            add_action( 'admin_head', [ $this, 'hide_all_notices' ] );
        }
    }

    /**
     * Admin Dashboard Menu.
     *
     * @since 1.0.0
     */
    public function menu() {
        if ( Helper::is_menu_exists( 'handy-tools' ) === false ) {
            add_menu_page( 
                'Handy Tools', 
                'Handy Tools', 
                'manage_options', 
                'handy-tools', 
                '', 
                Helper::get_asset_src( 'images/icon.svg' ), 
                null 
            );

            add_submenu_page( 
                'handy-tools', 
                'Handy Tools', 
                'Handy Tools', 
                'manage_options', 
                'handy-tools', 
                [ $this, 'render_menu_dashboard' ] 
            );
        }

        add_submenu_page( 
            'handy-tools', 
            'Quick View', 
            'Quick View', 
            'manage_options', 
            'hqfw', 
            [ $this, 'render_submenu_dashboard' ] 
        );
    }

    /**
     * Render the main menu dashboard.
     *
     * @since 1.0.0
     */
    public function render_menu_dashboard() {
        echo Helper::render_view( 'home' );
    }

    /**
     * Render the submenu dashboard.
     * 
     * @since 1.0.0
     */
    public function render_submenu_dashboard() {
        if ( Helper::plugin_has_error() ) {
            echo Helper::render_view( 'component/error-notice' );
            return;
        }

        if ( Helper::is_correct_submenu() ) {
            if ( isset( $_GET['tab'] ) ) {
                switch ( $_GET['tab'] ) {
                    case 'setting':
                        Setting::render_tab_content();
                        break;
                    case 'import-export':
                        ImporterExporter::render_tab_content();
                        break;
                }
            } else {
                Setting::render_tab_content();
            }
        }
    }

    /**
     * Returns all the class services.
     *
     * @return array  List of classes
     */
    private static function get_classes() {
        return [
            Setting::class,
            ImporterExporter::class
        ];
    }

    /**
     * Loop through the services classes and instantiate each class.
     *
     * @since 1.0.0
     */
    public static function register_classes() {
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
     * Register all parent menu styles.
     *
     * @since 1.0.0
     */
    public function register_menu_styles() {
        wp_register_style( 'lexend-deca', Helper::get_asset_src( 'fonts/lexend-deca/lexend-deca.css' ), [], '1.0.0', 'all' );
        wp_enqueue_style( 'lexend-deca' );
        
        wp_register_style( 'hqfw-home', Helper::get_asset_src( 'css/hqfw-home.min.css' ), [], '1.0.0', 'all' );
        wp_enqueue_style( 'hqfw-home' );
    }

    /**
     * Register all submenu styles.
     *
     * @since 1.0.0
     */
    public function register_submenu_styles() {
        wp_register_style( 'lexend-deca', Helper::get_asset_src( 'fonts/lexend-deca/lexend-deca.css' ), [], '1.0.0', 'all' );
        wp_enqueue_style( 'lexend-deca' );

        wp_register_style( 'pickr', Helper::get_asset_src( 'pickr/pickr.min.css' ), [], '1.0.0', 'all' );
        wp_enqueue_style( 'pickr' );

        wp_register_style( 'hqfw-admin', Helper::get_asset_src( 'css/hqfw-admin.min.css' ), [], '1.0.0', 'all' );
        wp_enqueue_style( 'hqfw-admin' );
    }

    /**
     * Register all submenu scripts.
     *
     * @since 1.0.0
     */
    public function register_submenu_scripts() {
        wp_register_script( 'pickr', Helper::get_asset_src( 'pickr/pickr.min.js' ), [], '1.0.0', true );
        wp_enqueue_script( 'pickr' );

        wp_register_script( 'hqfw-admin', Helper::get_asset_src( 'js/hqfw-admin.min.js' ), [], '1.0.0', true );
        wp_enqueue_script( 'hqfw-admin' );

        wp_localize_script( 'hqfw-admin', 'hqfwLocal', [
            'api'    => 'HNJOELMAFUCOHACM',
            'url'    => admin_url( 'admin-ajax.php' ),
            'module' => [
                'setting' => [
                    'nonce' => [
                        'saveSettings' => wp_create_nonce( 'hqfw_save_settings' )
                    ]
                ],
                'importerExporter' => [
                    'nonce' => [
                        'exportSettings' => wp_create_nonce( 'hqfw_export_settings' ),
                        'importSettings' => wp_create_nonce( 'hqfw_import_settings' )
                    ]
                ]
            ]
        ]);
    }

    /**
     * Hides all the admin notices.
     *
     * @since 1.0.0
     */
    public function hide_all_notices() {
        remove_all_actions( 'admin_notices' );
    }
}