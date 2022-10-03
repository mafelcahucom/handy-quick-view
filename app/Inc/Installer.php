<?php
namespace HQFW\Inc;

use HQFW\Inc\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Installer.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author Mafel John Cahucom
 */
final class Installer {

    /**
     * Inherit Singleton.
     */
    use Singleton;

    /**
     * Protected class constructor to prevent direct object creation.
     *
     * @since 1.0.0
     */
    protected function __construct() {}

    /**
     * Plugin Activation.
     *
     * @since 1.0.0
     */
	public static function activate() {
        flush_rewrite_rules();
        self::set_option_main_settings();

        // Set plugin version.
        update_option( '_hqfw_plugin_version', HQFW_PLUGIN_VERSION );
    }

    /**
     * Plugin Deactivation.
     *
     * @since 1.0.0
     */
    public static function deactivate() {
        flush_rewrite_rules();
    }

    /**
     * Sets the default value of option _hqfw_main_settings.
     *
     * @since 1.0.0
     */
    private static function set_option_main_settings() {
        /**if ( get_option( '_hqfw_main_settings' ) ) {
            return;
        }**/

        $settings = [

            // gn_qv_btn
            'gn_qv_btn_position'            => 2,

            // gn_modal
            'gn_md_enable_slider'           => 1,
            'gn_md_show_close_btn'          => 1,

            // gn_pt
            'gn_ps_show'                    => 1,
            'gn_pt_enable_slider'           => 1,
            'gn_pt_enable_zoom'             => 1,
            'gn_pt_enable_lightbox'         => 1,
            'gn_pt_show_collection'         => 1,
            'gn_pt_show_bullet'             => 1,

            // gn_ps.
            'gn_ps_show'                    => 1,
            'gn_ps_show_title'              => 1,
            'gn_ps_show_rating'             => 1,
            'gn_ps_show_price'              => 1,
            'gn_ps_show_exerpt'             => 1,
            'gn_ps_show_add_to_cart'        => 1,
            'gn_ps_show_meta'               => 1,

            // gn_tr.
            'gn_tr_use_toaster'             => 1,
            'gn_tr_show_duration'           => 5000,

            // qv_btn.
            'qv_btn_style'                  => 'text-icon',
            'qv_btn_text'                   => 'Quick View',
            'qv_btn_fs'                     => '14px',
            'qv_btn_fw'                     => '500',
            'qv_btn_icon'                   => 'bs-eye',
            'qv_btn_icon_wd'                => '20px',
            'qv_btn_icon_ht'                => 'auto',
            'qv_btn_icon_clr'               => 'rgba(0,0,0,0.6)',
            'qv_btn_icon_hv_clr'            => 'rgba(0,0,0,0.8)',
            'qv_btn_clr'                    => 'rgba(0,0,0,0.6)',
            'qv_btn_hv_clr'                 => 'rgba(0,0,0,0.8)',
            'qv_btn_bg_clr'                 => 'rgba(224,225,226,1)',
            'qv_btn_bg_hv_clr'              => 'rgba(202,203,205,1)',
            'qv_btn_wd'                     => '100%',
            'qv_btn_ht'                     => 'auto',
            'qv_btn_pt'                     => '10px',
            'qv_btn_pb'                     => '10px',
            'qv_btn_pl'                     => '20px',
            'qv_btn_pr'                     => '20px',
            'qv_btn_bs'                     => 'none',
            'qv_btn_bw'                     => '1px',
            'qv_btn_b_clr'                  => 'rgba(0,0,0,0)',
            'qv_btn_hv_b_clr'               => 'rgba(0,0,0,0)',
            'qv_btn_br'                     => '4px',
        ];

        // Insert settings in wp_options table.
        update_option( '_hqfw_main_settings', $settings );
    }
}