<?php
namespace HQFW\Admin\Tab\Setting;

use HQFW\Inc\Traits\Singleton;
use HQFW\Admin\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * Admin > Tab Setting API.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author Mafel John Cahucom
 */
final class SettingApi {

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
     * Set of rules for setting fields. This can be use
     * for checking settings fields validity.
     *
     * @since 1.0.0
     * 
     * @return array
     */
    public static function get_field_rules() {
        $rules = [

            // gn_qv_btn
            'gn_qv_btn_position'            => [
                'type'     => 'select',
                'default'  => 2,
                'choices'  => [
                    1, 2, 3, 4, 5, 6, 7, 8, 9
                ]
            ],

            // gn_modal.
            'gn_md_enable_slider'           => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_md_show_close_btn'          => [
                'type'    => 'number',
                'default' => 1
            ],

            // gn_pt.
            'gn_pt_show'                    => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_pt_enable_slider'           => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_pt_enable_zoom'             => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_pt_enable_lightbox'         => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_pt_show_collection'         => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_pt_show_bullet'             => [
                'type'    => 'switch',
                'default' => 1
            ],

            // gn_ps.
            'gn_ps_show'                    => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_ps_show_title'              => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_ps_show_rating'             => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_ps_show_price'              => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_ps_show_exerpt'             => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_ps_show_add_to_cart'        => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_ps_show_meta'               => [
                'type'    => 'switch',
                'default' => 1
            ],

            // gn_tr.
            'gn_tr_use_toaster'             => [
                'type'    => 'switch',
                'default' => 1
            ],
            'gn_tr_show_duration'           => [
                'type'    => 'number',
                'default' => 5000
            ],

            // qv_btn.
            'qv_btn_style'                  => [
                'type'     => 'select',
                'default'  => 'text-icon',
                'choices'  => [
                    'text', 'icon', 'text-icon'
                ]
            ],
            'qv_btn_text'                   => [
                'type'     => 'text',
                'default'  => 'Quick View',
                'max'      => 25
            ],
            'qv_btn_fs'                     => [
                'type'     => 'size',
                'default'  => '14px'
            ],
            'qv_btn_fw'                     => [
                'type'     => 'select',
                'default'  => '500',
                'choices'  => Helper::get_font_weight_choices( 'value' )
            ],
            'qv_btn_icon'                   => [
                'type'     => 'icon',
                'default'  => 'bs-eye',
                'icons'  => [
                    'bs-eye', 'bs-eye-fill', 'bs-search',
                    'bs-expand', 'bs-fullscreen', 'bs-arrow-fullscreen'
                ]
            ],
            'qv_btn_icon_wd'                => [
                'type'     => 'size',
                'default'  => '20px'
            ],
            'qv_btn_icon_ht'                => [
                'type'     => 'size',
                'default'  => 'auto'
            ],
            'qv_btn_icon_clr'               => [
                'type'     => 'color',
                'default'  => 'rgba(0,0,0,0.6)'
            ],
            'qv_btn_icon_hv_clr'            => [
                'type'     => 'color',
                'default'  => 'rgba(0,0,0,0.8)'
            ],
            'qv_btn_clr'                    => [
                'type'     => 'color',
                'default'  => 'rgba(0,0,0,0.6)'
            ],
            'qv_btn_hv_clr'                 => [
                'type'     => 'color',
                'default'  => 'rgba(0,0,0,0.8)'
            ],
            'qv_btn_bg_clr'                 => [
                'type'     => 'color',
                'default'  => 'rgba(224,225,226,1)'
            ],
            'qv_btn_bg_hv_clr'              => [
                'type'     => 'color',
                'default'  => 'rgba(202,203,205,1)'
            ],
            'qv_btn_wd'                     => [
                'type'     => 'size',
                'default'  => '100%'
            ],
            'qv_btn_ht'                     => [
                'type'     => 'size',
                'default'  => 'auto'
            ],
            'qv_btn_pt'                     => [
                'type'     => 'size',
                'default'  => '10px'
            ],
            'qv_btn_pb'                     => [
                'type'     => 'size',
                'default'  => '10px'
            ],
            'qv_btn_pl'                     => [
                'type'     => 'size',
                'default'  => '20px'
            ],
            'qv_btn_pr'                     => [
                'type'     => 'size',
                'default'  => '20px'
            ],
            'qv_btn_bs'                     => [
                'type'     => 'select',
                'default'  => 'none',
                'choices'  => Helper::get_border_style_choices( 'value' )
            ],
            'qv_btn_bw'                     => [
                'type'     => 'size',
                'default'  => '1px'
            ],
            'qv_btn_b_clr'                  => [
                'type'     => 'color',
                'default'  => 'rgba(0,0,0,0)'
            ],
            'qv_btn_hv_b_clr'               => [
                'type'     => 'color',
                'default'  => 'rgba(0,0,0,0)'
            ],
            'qv_btn_br'                => [
                'type'     => 'size',
                'default'  => '4px'
            ],
        ];

        return $rules;
    }

    /**
     * Returns the default value of each fields based in get_field_rules().
     *
     * @since 1.0.0
     * 
     * @return array
     */
    public static function get_fields_default_values() {
        $fields = [];
        foreach ( self::get_field_rules() as $key => $value ) {
            $fields[ $key ] = $value['default'];
        }

        return $fields;
    }

    /**
     * Returns the settings value from _hqfw_main_settings but
     * if _hqfw_main_settings is empty it will get the default value
     * from self::get_fields_default_values().
     *
     * @since 1.0.0
     * 
     * @return array
     */
    public static function get_settings() {
        /**$settings = get_option( '_hqfw_main_settings' );
        if ( empty( $settings ) ) {
            $settings = self::get_fields_default_values();
        }**/

        return self::get_fields_default_values();
    }

    /**
     * Check if the settings has a missing field.
     *
     * @since 1.0.0
     * 
     * @param  array  $settings  Containing all the settings field.
     * @return boolean
     */
    public static function has_missing_fields( $settings ) {
        if ( empty( $settings ) ) {
            return true;
        }

        $field_rules = self::get_field_rules();
        foreach ( $field_rules as $key => $value ) {
            if ( ! array_key_exists( $key, $settings ) ) {
                return true;
            }
        }
        return false;
    }
}