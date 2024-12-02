<?php
/**
 * Uninstall.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

/**
 * Delete all the data in database associated with quick view.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'hqfw_uninstall' ) ) {

    function hqfw_uninstall() {
        /**
         * Delete option _hqfw_main_settings.
         *
         * @since 1.0.0
         */
        delete_option( '_hqfw_main_settings' );

        /**
         * Delete option _hqfw_plugin_version.
         *
         * @since 1.0.0
         */
        delete_option( '_hqfw_plugin_version' );
    }

    hqfw_uninstall();
}
