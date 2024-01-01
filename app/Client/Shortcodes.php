<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * Shortcodes.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */
final class Shortcodes {

	/**
	 * Register Shortcodes.
     * 
     * @since 1.0.0
	 */
	use Singleton;

	/**
     * Register Shortcodes.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        // Quick view button.
        add_shortcode( 'handy-quick-view-button', [ $this, 'quick_view_button' ] );
    }

    /**
     * Quick view button component.
     *
     * @since 1.0.0
     * 
     * @param  array  $atts  Contains the shortcode attributes.
     * @return HTMLElement
     */
    public function quick_view_button( $atts ) {
        if ( ! isset( $atts['id'] ) ) {
            return;
        }

        return Helper::render_view( 'shortcode/quick-view-button', [
            'id' => $atts['id']
        ]);
    }
}