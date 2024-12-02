<?php
/**
 * App > Api > Setting API.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

namespace HQFW\Api;

use HQFW\Inc\Traits\Singleton;
use HQFW\Admin\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * The `SettingApi` class contains the all available
 * APIs for setting.
 *
 * @since 1.0.0
 */
final class SettingApi {

	/**
	 * Inherit Singleton.
     *
     * @since 1.0.0
	 */
	use Singleton;

    /**
     * Protected class constructor to prevent direct object creation.
     *
     * @since 1.0.0
     */
    protected function __construct() {}

    /**
     * Return the set of setting fields with each schema or rules. There
     * are 3 types of format to return the raw, schemas and fields.
     *
     * @since 1.0.0
     *
     * @param  string $type Contains the format of data to be returned.
     * @return array
     */
    public static function get_settings( $type = 'raw' ) {
        $settings = array(
            'GEN' => array(
                'gn_enable'                     => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_qv_btn_position'            => array(
                    'type'     => 'select',
                    'default'  => 2,
                    'choices'  => array( 1, 2, 3 ),
                ),
                'gn_md_enable_slider'           => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_md_show_close_btn'          => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_pt_enable_slider'           => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_pt_enable_zoom'             => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_pt_enable_lightbox'         => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_pt_show_collection'         => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_pt_show_bullet'             => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_pt_show_flash_sale'         => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_ps_show_title'              => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_ps_show_rating'             => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_ps_show_price'              => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_ps_show_exerpt'             => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_ps_show_add_to_cart'        => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'gn_ps_show_meta'               => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
            ),
            'BTN' => array(
                'qv_btn_style'                  => array(
                    'type'     => 'select',
                    'default'  => 'text-icon',
                    'choices'  => array(
                        'text',
'icon',
'text-icon',
                    ),
                ),
                'qv_btn_text'                   => array(
                    'type'     => 'text',
                    'default'  => 'Quick View',
                    'max'      => 25,
                ),
                'qv_btn_fs'                     => array(
                    'type'     => 'size',
                    'default'  => '14px',
                ),
                'qv_btn_fw'                     => array(
                    'type'     => 'select',
                    'default'  => '600',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                'qv_btn_icon'                   => array(
                    'type'     => 'icon',
                    'default'  => 'bs-eye',
                    'icons'  => array(
                        'bs-eye',
'bs-eye-fill',
'bs-search',
                        'bs-expand',
'bs-fullscreen',
'bs-arrow-fullscreen',
                    ),
                ),
                'qv_btn_icon_wd'                => array(
                    'type'     => 'size',
                    'default'  => '18px',
                ),
                'qv_btn_icon_ht'                => array(
                    'type'     => 'size',
                    'default'  => 'auto',
                ),
                'qv_btn_icon_clr'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
                'qv_btn_icon_hv_clr'            => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
                'qv_btn_clr'                    => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
                'qv_btn_hv_clr'                 => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
                'qv_btn_bg_clr'                 => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,113,242,1)',
                ),
                'qv_btn_bg_hv_clr'              => array(
                    'type'     => 'color',
                    'default'  => 'rgba(2,97,205,1)',
                ),
                'qv_btn_wd'                     => array(
                    'type'     => 'size',
                    'default'  => 'fit-content',
                ),
                'qv_btn_ht'                     => array(
                    'type'     => 'size',
                    'default'  => 'auto',
                ),
                'qv_btn_pt'                     => array(
                    'type'     => 'size',
                    'default'  => '13px',
                ),
                'qv_btn_pb'                     => array(
                    'type'     => 'size',
                    'default'  => '13px',
                ),
                'qv_btn_pl'                     => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'qv_btn_pr'                     => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'qv_btn_bs'                     => array(
                    'type'     => 'select',
                    'default'  => 'none',
                    'choices'  => Helper::get_border_style_choices( 'value' ),
                ),
                'qv_btn_bw'                     => array(
                    'type'     => 'size',
                    'default'  => '0px',
                ),
                'qv_btn_b_clr'                  => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'qv_btn_hv_b_clr'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'qv_btn_br'                     => array(
                    'type'     => 'size',
                    'default'  => '2px',
                ),
            ),
            'MOD' => array(
                'md_bg_clr'                     => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
                'md_overlay_bg_clr'             => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0.8)',
                ),
                'md_br'                         => array(
                    'type'     => 'size',
                    'default'  => '2px',
                ),
                'md_close_btn_wd'               => array(
                    'type'     => 'size',
                    'default'  => '35px',
                ),
                'md_close_btn_ht'               => array(
                    'type'     => 'size',
                    'default'  => '35px',
                ),
                'md_close_btn_icon_wd'          => array(
                    'type'     => 'size',
                    'default'  => '18px',
                ),
                'md_close_btn_icon_ht'          => array(
                    'type'     => 'size',
                    'default'  => '18px',
                ),
                'md_close_btn_icon_clr'         => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'md_close_btn_icon_hv_clr'      => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'md_close_btn_bg_clr'           => array(
                    'type'     => 'color',
                    'default'  => 'rgba(224,225,226,1)',
                ),
                'md_close_btn_bg_hv_clr'        => array(
                    'type'     => 'color',
                    'default'  => 'rgba(202,203,205,1)',
                ),
                'md_close_btn_bs'               => array(
                    'type'     => 'select',
                    'default'  => 'none',
                    'choices'  => Helper::get_border_style_choices( 'value' ),
                ),
                'md_close_btn_bw'               => array(
                    'type'     => 'size',
                    'default'  => '0px',
                ),
                'md_close_btn_b_clr'            => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'md_close_btn_hv_b_clr'         => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'md_close_btn_br'               => array(
                    'type'     => 'size',
                    'default'  => '100px',
                ),
                'md_sldr_btn_wd'                => array(
                    'type'     => 'size',
                    'default'  => '45px',
                ),
                'md_sldr_btn_ht'                => array(
                    'type'     => 'size',
                    'default'  => '45px',
                ),
                'md_sldr_btn_icon_prev'         => array(
                    'type'     => 'icon',
                    'default'  => 'bs-chevron-left',
                    'icons'  => array(
                        'bs-chevron-left',
'bs-arrow-left',
'bs-arrow-left-circle',
'bs-arrow-left-circle-fill',
                        'bs-arrow-left-square',
'bs-arrow-left-square-fill',
'bs-caret-left',
'bs-caret-left-fill',
                    ),
                ),
                'md_sldr_btn_icon_next'         => array(
                    'type'     => 'icon',
                    'default'  => 'bs-chevron-right',
                    'icons'  => array(
                        'bs-chevron-right',
'bs-arrow-right',
'bs-arrow-right-circle',
'bs-arrow-right-circle-fill',
                        'bs-arrow-right-square',
'bs-arrow-right-square-fill',
'bs-caret-right',
'bs-caret-right-fill',
                    ),
                ),
                'md_sldr_btn_icon_wd'           => array(
                    'type'     => 'size',
                    'default'  => '25px',
                ),
                'md_sldr_btn_icon_ht'           => array(
                    'type'     => 'size',
                    'default'  => '25px',
                ),
                'md_sldr_btn_icon_clr'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,0.7)',
                ),
                'md_sldr_btn_icon_hv_clr'       => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'md_sldr_btn_bg_clr'            => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'md_sldr_btn_bg_hv_clr'         => array(
                    'type'     => 'color',
                    'default'  => 'rgba(214,216,220,1)',
                ),
                'md_sldr_btn_bs'                => array(
                    'type'     => 'select',
                    'default'  => 'none',
                    'choices'  => Helper::get_border_style_choices( 'value' ),
                ),
                'md_sldr_btn_bw'                => array(
                    'type'     => 'size',
                    'default'  => '0px',
                ),
                'md_sldr_btn_b_clr'             => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'md_sldr_btn_hv_b_clr'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'md_sldr_btn_br'                => array(
                    'type'     => 'size',
                    'default'  => '100px',
                ),
                'md_loader_style'               => array(
                    'type'     => 'loader',
                    'default'  => 'spinner-1',
                    'choices'  => array(
                        'spinner-1',
'spinner-2',
'spinner-3',
                        'spinner-4',
'spinner-5',
'spinner-6',
                        'spinner-7',
'spinner-8',
'spinner-9',
                        'pulse-1',
'pulse-2',
'pulse-3',
'pulse-4',
                    ),
                ),
                'md_loader_wd'                  => array(
                    'type'     => 'size',
                    'default'  => '30px',
                ),
                'md_loader_ht'                  => array(
                    'type'     => 'size',
                    'default'  => '30px',
                ),
                'md_loader_stroke_wd'           => array(
                    'type'     => 'size',
                    'default'  => '2px',
                ),
                'md_loader_clr_1'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
                'md_loader_clr_2'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(255,255,255,1)',
                ),
            ),
            'PRT' => array(
                'pt_panel_pt'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'pt_panel_pb'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'pt_panel_pl'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'pt_panel_pr'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'pt_sldr_btn_wd'                => array(
                    'type'     => 'size',
                    'default'  => '35px',
                ),
                'pt_sldr_btn_ht'                => array(
                    'type'     => 'size',
                    'default'  => '35px',
                ),
                'pt_sldr_btn_icon_prev'         => array(
                    'type'     => 'icon',
                    'default'  => 'bs-chevron-left',
                    'icons'  => array(
                        'bs-chevron-left',
'bs-arrow-left',
'bs-arrow-left-circle',
'bs-arrow-left-circle-fill',
                        'bs-arrow-left-square',
'bs-arrow-left-square-fill',
'bs-caret-left',
'bs-caret-left-fill',
                    ),
                ),
                'pt_sldr_btn_icon_next'         => array(
                    'type'     => 'icon',
                    'default'  => 'bs-chevron-right',
                    'icons'  => array(
                        'bs-chevron-right',
'bs-arrow-right',
'bs-arrow-right-circle',
'bs-arrow-right-circle-fill',
                        'bs-arrow-right-square',
'bs-arrow-right-square-fill',
'bs-caret-right',
'bs-caret-right-fill',
                    ),
                ),
                'pt_sldr_btn_icon_wd'           => array(
                    'type'     => 'size',
                    'default'  => '18px',
                ),
                'pt_sldr_btn_icon_ht'           => array(
                    'type'     => 'size',
                    'default'  => '18px',
                ),
                'pt_sldr_btn_icon_clr'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'pt_sldr_btn_icon_hv_clr'       => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'pt_sldr_btn_bg_clr'            => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'pt_sldr_btn_bg_hv_clr'         => array(
                    'type'     => 'color',
                    'default'  => 'rgba(214,216,220,1)',
                ),
                'pt_sldr_btn_bs'                => array(
                    'type'     => 'select',
                    'default'  => 'none',
                    'choices'  => Helper::get_border_style_choices( 'value' ),
                ),
                'pt_sldr_btn_bw'                => array(
                    'type'     => 'size',
                    'default'  => '0px',
                ),
                'pt_sldr_btn_b_clr'             => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'pt_sldr_btn_hv_b_clr'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'pt_sldr_btn_br'                => array(
                    'type'     => 'size',
                    'default'  => '100px',
                ),
                'pt_zoom_btn_wd'                => array(
                    'type'     => 'size',
                    'default'  => '35px',
                ),
                'pt_zoom_btn_ht'                => array(
                    'type'     => 'size',
                    'default'  => '35px',
                ),
                'pt_zoom_btn_icon_wd'           => array(
                    'type'     => 'size',
                    'default'  => '16px',
                ),
                'pt_zoom_btn_icon_ht'           => array(
                    'type'     => 'size',
                    'default'  => 'auto',
                ),
                'pt_zoom_btn_icon_clr'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'pt_zoom_btn_icon_hv_clr'       => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'pt_zoom_btn_bg_clr'            => array(
                    'type'     => 'color',
                    'default'  => 'rgba(224,225,226,1)',
                ),
                'pt_zoom_btn_bg_hv_clr'         => array(
                    'type'     => 'color',
                    'default'  => 'rgba(202,203,205,1)',
                ),
                'pt_zoom_btn_bs'                => array(
                    'type'     => 'select',
                    'default'  => 'none',
                    'choices'  => Helper::get_border_style_choices( 'value' ),
                ),
                'pt_zoom_btn_bw'                => array(
                    'type'     => 'size',
                    'default'  => '0px',
                ),
                'pt_zoom_btn_b_clr'             => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'pt_zoom_btn_hv_b_clr'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0)',
                ),
                'pt_zoom_btn_br'                => array(
                    'type'     => 'size',
                    'default'  => '100px',
                ),
                'pt_bul_wd'                     => array(
                    'type'     => 'size',
                    'default'  => '8px',
                ),
                'pt_bul_ht'                     => array(
                    'type'     => 'size',
                    'default'  => '8px',
                ),
                'pt_bul_bg_clr'                 => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0.4)',
                ),
                'pt_bul_bg_ac_clr'              => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,0,0,0.7)',
                ),
                'pt_bul_gap'                    => array(
                    'type'     => 'size',
                    'default'  => '4px',
                ),
                'pt_bul_br'                     => array(
                    'type'     => 'size',
                    'default'  => '10px',
                ),
                'pt_col_mx_wd'                  => array(
                    'type'     => 'size',
                    'default'  => '45px',
                ),
                'pt_col_gap'                    => array(
                    'type'     => 'size',
                    'default'  => '10px',
                ),
                'pt_col_br'                     => array(
                    'type'     => 'size',
                    'default'  => '2px',
                ),
            ),
            'PRS' => array(
                'ps_panel_pt'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'ps_panel_pb'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'ps_panel_pl'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'ps_panel_pr'                   => array(
                    'type'     => 'size',
                    'default'  => '15px',
                ),
                'ps_name_fs'                    => array(
                    'type'     => 'size',
                    'default'  => '26px',
                ),
                'ps_name_fw'                    => array(
                    'type'     => 'select',
                    'default'  => '500',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                'ps_name_lh'                   => array(
                    'type'     => 'size',
                    'default'  => '34px',
                ),
                'ps_name_clr'                   => array(
                    'type'     => 'color',
                    'default'  => 'rgba(17,14,39,1)',
                ),
                'ps_name_mb'                   => array(
                    'type'     => 'size',
                    'default'  => '10px',
                ),
                'ps_rating_label_fs'            => array(
                    'type'     => 'size',
                    'default'  => '16px',
                ),
                'ps_rating_label_fw'            => array(
                    'type'     => 'select',
                    'default'  => '400',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                'ps_rating_label_lh'            => array(
                    'type'     => 'size',
                    'default'  => '24px',
                ),
                'ps_rating_label_clr'           => array(
                    'type'     => 'color',
                    'default'  => 'rgba(96,103,113,1)',
                ),
                'ps_rating_star_clr_1'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(14,121,242,1)',
                ),
                'ps_rating_star_clr_2'          => array(
                    'type'     => 'color',
                    'default'  => 'rgba(44,45,51,0.25)',
                ),
                'ps_rating_mb'                  => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'ps_price_fs'                   => array(
                    'type'     => 'size',
                    'default'  => '22px',
                ),
                'ps_price_fw'                   => array(
                    'type'     => 'select',
                    'default'  => '500',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                'ps_price_lh'                  => array(
                    'type'     => 'size',
                    'default'  => '26px',
                ),
                'ps_price_clr'                  => array(
                    'type'     => 'color',
                    'default'  => 'rgba(96,103,113,1)',
                ),
                'ps_price_mb'                  => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'ps_desc_fs'                    => array(
                    'type'     => 'size',
                    'default'  => '16px',
                ),
                'ps_desc_fw'                    => array(
                    'type'     => 'select',
                    'default'  => '400',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                'ps_desc_lh'                   => array(
                    'type'     => 'size',
                    'default'  => '24px',
                ),
                'ps_desc_clr'                   => array(
                    'type'     => 'color',
                    'default'  => 'rgba(96,103,113,1)',
                ),
                'ps_desc_mb'                   => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'ps_form_var_mb'                => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'ps_form_atc_mb'                => array(
                    'type'     => 'size',
                    'default'  => '20px',
                ),
                'ps_stst_fs'                    => array(
                    'type'     => 'size',
                    'default'  => '16px',
                ),
                'ps_stst_fw'                    => array(
                    'type'     => 'select',
                    'default'  => '400',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                 'ps_stst_lh'                   => array(
                    'type'     => 'size',
                    'default'  => '24px',
                ),
                'ps_stst_ink_clr'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(15,131,77,1)',
                ),
                'ps_stst_aob_clr'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(96,103,113,1)',
                ),
                'ps_stst_ook_clr'               => array(
                    'type'     => 'color',
                    'default'  => 'rgba(226,64,28,1)',
                ),
                'ps_meta_fs'                    => array(
                    'type'     => 'size',
                    'default'  => '14px',
                ),
                'ps_meta_fw'                    => array(
                    'type'     => 'select',
                    'default'  => '400',
                    'choices'  => Helper::get_font_weight_choices( 'value' ),
                ),
                 'ps_meta_lh'                   => array(
                    'type'     => 'size',
                    'default'  => '21px',
                ),
                'ps_meta_clr'                   => array(
                    'type'     => 'color',
                    'default'  => 'rgba(96,103,113,1)',
                ),
                'ps_meta_link_clr'              => array(
                    'type'     => 'color',
                    'default'  => 'rgba(0,113,242,1)',
                ),
                'ps_meta_link_hv_clr'           => array(
                    'type'     => 'color',
                    'default'  => 'rgba(2,97,205,1)',
                ),
                'ps_meta_bs'                    => array(
                    'type'     => 'select',
                    'default'  => 'solid',
                    'choices'  => Helper::get_border_style_choices( 'value' ),
                ),
                'ps_meta_bw'                    => array(
                    'type'     => 'size',
                    'default'  => '1px',
                ),
                'ps_meta_b_clr'                 => array(
                    'type'     => 'color',
                    'default'  => 'rgba(229,231,235,1)',
                ),
            ),
            'ADV' => array(
                'ad_add_custom_css'             => array(
                    'type'     => 'textarea',
                    'default'  => '',
                ),
                'ad_opt_enable_cache'           => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'ad_opt_enable_minify'          => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
                'ad_opt_enable_defer'           => array(
                    'type'    => 'switch',
                    'default' => 1,
                ),
            ),
        );

        $output = $settings;
        if ( in_array( $type, array( 'schemas', 'fields' ), true ) ) {
            $schemas = array();
            foreach ( $settings as $setting ) {
                $schemas = array_merge( $schemas, $setting );
            }

            $output = $schemas;

            if ( $type === 'fields' ) {
                $fields = array();
                foreach ( $schemas as $key => $schema ) {
                    $fields[ $key ] = $schema['default'];
                }

                $output = $fields;
            }
        }

        return $output;
    }

    /**
     * Return the settings from option _hqfw_main_settings but if option is
     * empty it will be get the default settings values.
     *
     * @since 1.0.0
     *
     * @return array
     */
    public static function get_current_settings() {
        $settings = get_option( '_hqfw_main_settings' );
        if ( empty( $settings ) ) {
            $settings = self::get_settings( 'fields' );
        }

        return $settings;
    }
}
