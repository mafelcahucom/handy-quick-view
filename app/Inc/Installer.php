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
        if ( get_option( '_hqfw_main_settings' ) ) {
            return;
        }

        $settings = [

            // gn_qv_btn
            'gn_qv_btn_position'            => 2,

            // gn_modal
            'gn_md_enable_slider'           => 1,
            'gn_md_show_close_btn'          => 1,

            // gn_pt
            'gn_pt_enable_slider'           => 1,
            'gn_pt_enable_zoom'             => 1,
            'gn_pt_enable_lightbox'         => 1,
            'gn_pt_show_collection'         => 1,
            'gn_pt_show_bullet'             => 1,
            'gn_pt_show_flash_sale'         => 1,

            // gn_ps.
            'gn_ps_show_title'              => 1,
            'gn_ps_show_rating'             => 1,
            'gn_ps_show_price'              => 1,
            'gn_ps_show_exerpt'             => 1,
            'gn_ps_show_add_to_cart'        => 1,
            'gn_ps_show_meta'               => 1,

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
            'qv_btn_wd'                     => 'fit-content',
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

            // md.
            'md_bg_clr'                     => 'rgba(255,255,255,1)',
            'md_overlay_bg_clr'             => 'rgba(0,0,0,0.8)',
            'md_br'                         => '4px',

            // md_close_btn.
            'md_close_btn_wd'               => '35px',
            'md_close_btn_ht'               => '35px',
            'md_close_btn_icon_wd'          => '18px',
            'md_close_btn_icon_ht'          => '18px',
            'md_close_btn_icon_clr'         => 'rgba(0,0,0,0.6)',
            'md_close_btn_icon_hv_clr'      => 'rgba(0,0,0,0.8)',
            'md_close_btn_bg_clr'           => 'rgba(0,0,0,0)',
            'md_close_btn_bg_hv_clr'        => 'rgba(0,0,0,0)',
            'md_close_btn_bs'               => 'none',
            'md_close_btn_bw'               => '1px',
            'md_close_btn_b_clr'            => 'rgba(0,0,0,0)',
            'md_close_btn_hv_b_clr'         => 'rgba(0,0,0,0)',
            'md_close_btn_br'               => '4px',

            // md_sldr_btn.
            'md_sldr_btn_wd'                => '45px',
            'md_sldr_btn_ht'                => '45px',
            'md_sldr_btn_icon_prev'         => 'bs-chevron-left',
            'md_sldr_btn_icon_next'         => 'bs-chevron-right',
            'md_sldr_btn_icon_wd'           => '25px',
            'md_sldr_btn_icon_ht'           => '25px',
            'md_sldr_btn_icon_clr'          => 'rgba(255,255,255,0.7)',
            'md_sldr_btn_icon_hv_clr'       => 'rgba(255,255,255,1)',
            'md_sldr_btn_bg_clr'            => 'rgba(0,0,0,0)',
            'md_sldr_btn_bg_hv_clr'         => 'rgba(0,0,0,0.7)',
            'md_sldr_btn_bs'                => 'none',
            'md_sldr_btn_bw'                => '1px',
            'md_sldr_btn_b_clr'             => 'rgba(0,0,0,0)',
            'md_sldr_btn_hv_b_clr'          => 'rgba(0,0,0,0)',
            'md_sldr_btn_br'                => '4px',

            // md_loader.
            'md_loader_style'               => 'spinner-5',
            'md_loader_wd'                  => '30px',
            'md_loader_ht'                  => '30px',
            'md_loader_stroke_wd'           => '2px',
            'md_loader_clr_1'               => 'rgba(255,255,255,1)',
            'md_loader_clr_2'               => 'rgba(255,255,255,1)',

            // pt_panel.
            'pt_panel_pt'                   => '15px',
            'pt_panel_pb'                   => '15px',
            'pt_panel_pl'                   => '15px',
            'pt_panel_pr'                   => '15px',

            // pt_sldr_btn.
            'pt_sldr_btn_wd'                => '35px',
            'pt_sldr_btn_ht'                => '35px',
            'pt_sldr_btn_icon_prev'         => 'bs-chevron-left',
            'pt_sldr_btn_icon_next'         => 'bs-chevron-right',
            'pt_sldr_btn_icon_wd'           => '20px',
            'pt_sldr_btn_icon_ht'           => '20px',
            'pt_sldr_btn_icon_clr'          => 'rgba(0,0,0,0.7)',
            'pt_sldr_btn_icon_hv_clr'       => 'rgba(255,255,255,1)',
            'pt_sldr_btn_bg_clr'            => 'rgba(0,0,0,0)',
            'pt_sldr_btn_bg_hv_clr'         => 'rgba(0,0,0,0.7)',
            'pt_sldr_btn_bs'                => 'none',
            'pt_sldr_btn_bw'                => '1px',
            'pt_sldr_btn_b_clr'             => 'rgba(0,0,0,0)',
            'pt_sldr_btn_hv_b_clr'          => 'rgba(0,0,0,0)',
            'pt_sldr_btn_br'                => '4px',

            // pt_zoom_btn.
            'pt_zoom_btn_wd'                => '30px',
            'pt_zoom_btn_ht'                => '30px',
            'pt_zoom_btn_icon_wd'           => '18px',
            'pt_zoom_btn_icon_ht'           => 'auto',
            'pt_zoom_btn_icon_clr'          => 'rgba(51,51,51,1)',
            'pt_zoom_btn_icon_hv_clr'       => 'rgba(51,51,51,1)',
            'pt_zoom_btn_bg_clr'            => 'rgba(238,238,238,1)',
            'pt_zoom_btn_bg_hv_clr'         => 'rgba(213,213,213,1)',
            'pt_zoom_btn_bs'                => 'none',
            'pt_zoom_btn_bw'                => '1px',
            'pt_zoom_btn_b_clr'             => 'rgba(0,0,0,0)',
            'pt_zoom_btn_hv_b_clr'          => 'rgba(0,0,0,0)',
            'pt_zoom_btn_br'                => '4px',

            // pt_bul.
            'pt_bul_wd'                     => '8px',
            'pt_bul_ht'                     => '8px',
            'pt_bul_bg_clr'                 => 'rgba(0,0,0,0.4)',
            'pt_bul_bg_ac_clr'              => 'rgba(0,0,0,0.7)',
            'pt_bul_gap'                    => '4px',
            'pt_bul_br'                     => '10px',

            // pt_col.
            'pt_col_mx_wd'                  => '45px',
            'pt_col_gap'                    => '10px',
            'pt_col_br'                     => '4px',

            // ps_panel.
            'ps_panel_pt'                   => '15px',
            'ps_panel_pb'                   => '15px',
            'ps_panel_pl'                   => '15px',
            'ps_panel_pr'                   => '15px',

            // ps_name.
            'ps_name_fs'                    => '26px',
            'ps_name_fw'                    => '500',
            'ps_name_lh'                    => '34px',
            'ps_name_clr'                   => 'rgba(51,51,51,1)',
            'ps_name_mb'                    => '10px',

            // ps_rating.
            'ps_rating_label_fs'            => '16px',
            'ps_rating_label_fw'            => '400',
            'ps_rating_label_lh'            => '24px',
            'ps_rating_label_clr'           => 'rgba(51,51,51,1)',
            'ps_rating_star_clr_1'          => 'rgba(127,84,179,1)',
            'ps_rating_star_clr_2'          => 'rgba(44,45,51,0.25)',
            'ps_rating_mb'                  => '20px',

            // ps_price.
            'ps_price_fs'                   => '22px',
            'ps_price_fw'                   => '500',
            'ps_price_lh'                   => '26px',
            'ps_price_clr'                  => 'rgba(51,51,51,1)',
            'ps_price_mb'                   => '20px',

            // ps_desc.
            'ps_desc_fs'                    => '16px',
            'ps_desc_fw'                    => '400',
            'ps_desc_lh'                    => '24px',
            'ps_desc_clr'                   => 'rgba(51,51,51,1)',
            'ps_desc_mb'                    => '20px',

            // ps_form.
            'ps_form_var_mb'                => '20px',
            'ps_form_atc_mb'                => '20px',

            // ps_stst.
            'ps_stst_fs'                    => '16px',
            'ps_stst_fw'                    => '400',
            'ps_stst_lh'                    => '24px',
            'ps_stst_ink_clr'               => 'rgba(15,131,77,1)',
            'ps_stst_aob_clr'               => 'rgba(51,51,51,1)',
            'ps_stst_ook_clr'               => 'rgba(226,64,28,1)',

            // ps_meta.
            'ps_meta_fs'                    => '14px',
            'ps_meta_fw'                    => '400',
            'ps_meta_lh'                    => '21px',
            'ps_meta_clr'                   => 'rgba(51,51,51,1)',
            'ps_meta_link_clr'              => 'rgba(127,84,179,1)',
            'ps_meta_link_hv_clr'           => 'rgba(96,35,171,1)',
            'ps_meta_bs'                    => 'solid',
            'ps_meta_bw'                    => '1px',
            'ps_meta_b_clr'                 => 'rgba(0,0,0,0.05)',

            // ad_stg.
            'ad_stg_additional_css'         => ''
        ];

        // Insert settings in wp_options table.
        update_option( '_hqfw_main_settings', $settings );
    }
}