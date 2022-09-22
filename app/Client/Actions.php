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
     * Execute Actions.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        // Render quick view buttn.
        add_action( 'woocommerce_after_shop_loop_item', [ $this, 'render_quick_view_button' ], 20 );

        // Render quick view modal.
        add_action( 'wp_footer', [ $this, 'render_quick_view_modal' ] );
    }

    /**
     * Render the quick view button component/shortcode in
     * the woocommerce product list thumbnail.
     *
     * @since 1.0.0
     */
    public function render_quick_view_button() {
        echo do_shortcode( '[handy-quick-view-button id="'. get_the_ID() .'"]' );
    }

    /**
     * Render the quick view modal in wp_footer.
     *
     * @since 1.0.0
     */
    public function render_quick_view_modal() {
        echo Helper::render_view( 'component/modal' );
    }
}