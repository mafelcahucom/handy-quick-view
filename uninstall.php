<?php
/**
 * Uninstall.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

/**
 * Delete all the options used by quick view.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'hqfw_uninstall' ) ) {
    function hqfw_uninstall() {
        /**
         * Delete option _hafw_main_settings.
         *
         * @since 1.0.0
         */
        delete_option( '_hqfw_main_settings' );

        /**
         * Delete option _hafw_plugin_version.
         *
         * @since 1.0.0
         */
        delete_option( '_hsqw_plugin_version' );
    }
    hqfw_uninstall();
}