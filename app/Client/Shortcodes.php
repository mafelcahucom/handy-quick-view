<?php
/**
 * App > Client > Shortcode.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * The `Shortcode` class contains the all available
 * shortcodes that can be only used in the client
 * side or front-end.
 *
 * @since 1.0.0
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
        /**
         * Quick view button shortcode.
         */
        add_shortcode( 'handy-quick-view-button', array( $this, 'quick_view_button' ) );
    }

    /**
     * Quick view button component.
     *
     * @since 1.0.0
     *
     * @param  array $atts Contains the shortcode attributes.
     * @return string
     */
    public function quick_view_button( $atts ) {
        if ( ! isset( $atts['id'] ) ) {
            return;
        }

        return Helper::render_view( 'shortcode/quick-view-button', array(
            'id' => $atts['id'],
        ));
    }
}
