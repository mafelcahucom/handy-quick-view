<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * Actions.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author Mafel John Cahucom
 */
final class Actions {

	/**
	 * Inherit Singleton.
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
     * Execute Actions.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        // Set the value of setting property.
        $this->settings = get_option( '_hqfw_main_settings' );

        // Render quick view button.
        $this->render_quick_view_button();

        // Render quick view modal.
        add_action( 'wp_footer', [ $this, 'render_quick_view_modal' ] );

        // Render photobox viewer modal.
        if ( $this->settings['gn_pt_enable_lightbox'] ) {
            add_action( 'wp_footer', [ $this, 'render_photo_box_viewer_modal' ] );
        }
    }

    /**
     * Render the quick view button component/shortcode
     *
     * @since 1.0.0
     */
    public function render_quick_view_button() {
        // Get the hook index.
        $position = ( $this->settings['gn_qv_btn_position'] - 1 );
        $hooks = [
            [
                'name'      => 'woocommerce_after_shop_loop_item',
                'priority'  => 1
            ],
            [
                'name'      => 'woocommerce_after_shop_loop_item',
                'priority'  => 20
            ],
            [
                'name'      => 'woocommerce_before_shop_loop_item_title',
                'priority'  => 9
            ],
            [
                'name'      => 'woocommerce_before_shop_loop_item_title',
                'priority'  => 11
            ],
            [
                'name'      => 'woocommerce_shop_loop_item_title',
                'priority'  => 11
            ],
            [
                'name'      => 'woocommerce_after_shop_loop_item_title',
                'priority'  => 6
            ],
            [
                'name'      => 'woocommerce_after_shop_loop_item_title',
                'priority'  => 7
            ],
            [
                'name'      => 'woocommerce_after_shop_loop_item_title',
                'priority'  => 11
            ]
        ];

        if ( ! isset( $hooks[ $position ] ) ) {
            return;
        }

        add_action( $hooks[ $position ]['name'], function() {
            echo do_shortcode( '[handy-quick-view-button id="'. get_the_ID() .'"]' );
        }, $hooks[ $position ]['priority'] );
    }

    /**
     * Render the quick view modal in wp_footer.
     *
     * @since 1.0.0
     */
    public function render_quick_view_modal() {
        echo Helper::render_view( 'component/modal' );
    }

    /**
     * Render the photobox viewer modal in wp_footer.
     *
     * @since 1.0.0
     */
    public function render_photo_box_viewer_modal() {
        echo Helper::render_view( 'component/photobox-viewer' );
    }
}