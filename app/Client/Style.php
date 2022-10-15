<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Client\Inc\Helper;
use HQFW\Client\Inc\Loader;

defined( 'ABSPATH' ) || exit;

/**
 * Style.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author Mafel John Cahucom
 */
final class Style {

	/**
	 * Inherit Singleton.
	 */
	use Singleton;

	/**
     * Print internal css in wp_head.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        add_action( 'wp_head', [ $this, 'custom_internal_css' ], 100 );
    }

    /**
     * Return the validated property values.
     *
     * @since 1.0.0
     *
     * @param  array   $settings  Contains all the settings from _hqfw_main_settings.
     * @param  arrray  $rules     Contains the rule of the property key & default value.
     * @param  string  $prefix    The prefix of the class name.
     * @return string
     */
    private function get_properties( $settings, $rules, $prefix ) {
        if ( empty( $settings ) || empty( $rules ) || empty( $prefix ) ) {
            return;
        }

        $output = '';
        foreach ( $rules as $key => $default ) {
            $index   = $prefix .'_'. $key;
            $output .= ' '. ( isset( $settings[ $index ] ) ? $settings[ $index ] : $default );
        }
        return $output;
    }

    /**
     * Return property values of padding in single line.
     *
     * @since 1.0.0
     * 
     * @param  array   $settings  Contains all the settings from _hqfw_main_settings.
     * @param  string  $prefix    The prefix of the class name.
     * @return string
     */
    private function get_padding( $settings, $prefix ) {
        if ( empty( $settings ) || empty( $prefix ) ) {
            return;
        }

        $rules = [
            'pt' => '0px',
            'pr' => '0px',
            'pb' => '0px',
            'pl' => '0px'
        ];

        return $this->get_properties( $settings, $rules, $prefix );
    }

    /**
     * Return property values of margin in single line.
     *
     * @since 1.0.0
     * 
     * @param  array   $settings  Contains all the settings from _hqfw_main_settings.
     * @param  string  $prefix    The prefix of the class name.
     * @return string
     */
    private function get_margin( $settings, $prefix ) {
        if ( empty( $settings ) || empty( $prefix ) ) {
            return;
        }

        $rules = [
            'mt' => '0px',
            'mr' => '0px',
            'mb' => '0px',
            'ml' => '0px'
        ];

        return $this->get_properties( $settings, $rules, $prefix );
    }

    /**
     * Return property values of border in single line.
     *
     * @since 1.0.0
     * 
     * @param  array   $settings  Contains all the settings from _hqfw_main_settings.
     * @param  string  $prefix    The prefix of the class name.
     * @return string
     */
    private function get_border( $settings, $prefix ) {
        if ( empty( $settings ) || empty( $prefix ) ) {
            return;
        }

        $rules = [
            'bw'    => '0px',
            'bs'    => 'none',
            'b_clr' => '#000000'
        ];

        return $this->get_properties( $settings, $rules, $prefix );
    }

    /**
     * Minify the internal css.
     *
     * @since 1.0.0
     * 
     * @param  string  $css  The internal css to be minify.
     * @return string
     */
    private function minify_internal_css( $css ) {
        $css = preg_replace( '/\s+/', ' ', $css );
        $css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
        $css = preg_replace( '/(,|:|;|\{|}) /', '$1', $css );
        $css = preg_replace( '/ (,|;|\{|})/', '$1', $css );
        $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
        $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

        return trim( $css );
    }

    /**
     * Custom Internal Css.
     *
     * @since 1.0.0
     * 
     * @return string
     */
    public function custom_internal_css() {
        $settings = get_option( '_hqfw_main_settings' );

        // Keyframes.
        $class = "
            @-webkit-keyframes hqfw-fade-in-top {
                0% {
                    -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            @keyframes hqfw-fade-in-top {
                0% {
                    -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
                    opacity: 0;
                }
                100% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            @-webkit-keyframes hqfw-fade-out-top {
                0% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
                    opacity: 0;
                }
            }
            @keyframes hqfw-fade-out-top {
                0% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
                    opacity: 0;
                }
            }
        ";
        
        // Global
        $class .= "
            .hqfw * {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            .hqfw p,
            .hqfw figure {
                margin: 0;
            }
            .hqfw ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }
            .hqfw a {
                text-decoration: none;
            }
            .hqfw button {
                cursor: pointer;
                outline: none;
            }
            .hqfw button[data-state='loading'] {
                cursor: loading;
            }
            .hqfw button[data-state='disabled'] {
                cursor: not-allowed;
            }
            .hqfw button > * {
                pointer-events: none;
            }
            .hqfw svg {
                display: block;
            }
            .hqfw-flex {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }
            .hqfw-flex-ai-c {
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            .hqfw-flex-jc-c {
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
            }
            .hqfw-flex-jc-sb {
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
            }
            .hqfw-flex-jc-ed {
                -webkit-box-pack: end;
                -ms-flex-pack: end;
                justify-content: flex-end
            }
            .hqfw-flex-c {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
            }
            .hqfw-hover:hover,
            .hqfw-hover:focus {
                -webkit-transition: all 320ms ease-in-out 0s;
                -o-transition: all 320ms ease-in-out 0s;
                transition: all 320ms ease-in-out 0s;
            }
        ";

        // Quick View Button.
        $class .= "
            .hqfw-quick-view-btn {
                display: inline-block;
                cursor: pointer;
                width: {$settings['qv_btn_wd']};
                height: {$settings['qv_btn_ht']};
                font-size: {$settings['qv_btn_fs']};
                font-weight: {$settings['qv_btn_fw']};
                line-height: {$settings['qv_btn_fs']};
                fill: {$settings['qv_btn_icon_clr']};
                color: {$settings['qv_btn_clr']};
                background-color: {$settings['qv_btn_bg_clr']};
                padding: {$this->get_padding( $settings, 'qv_btn' )};
                border: {$this->get_border( $settings, 'qv_btn' )};
                border-radius: {$settings['qv_btn_br']};
            }
            .hqfw-quick-view-btn:hover,
            .hqfw-quick-view-btn:focus {
                fill: {$settings['qv_btn_icon_hv_clr']};
                color: {$settings['qv_btn_hv_clr']};
                background-color: {$settings['qv_btn_bg_hv_clr']};
                border-color: {$settings['qv_btn_hv_b_clr']};
            }
            .hqfw-quick-view-btn > * {
                pointer-events: none;
            }
            .hqfw-quick-view-btn svg {
                width: {$settings['qv_btn_icon_wd']};
                height: {$settings['qv_btn_icon_ht']};
            }
            .hqfw-quick-view-btn.text-icon svg {
                margin-left: 10px;
            }
        ";

        // Modal
        $class .= "
            .hqfw-modal {
                position: fixed;
                z-index: 999999;
            }
            .hqfw-modal[data-state='hide'] {
                display: none;
            }
            .hqfw-modal[data-state='show'] {
                display: block;
            }
            .hqfw-modal__overlay {
                position: fixed;
                top: 0;
                left: 0;
                padding: 10px;
                width: 100%;
                height: 100vh;
                background-color: {$settings['md_overlay_bg_clr']};
                overflow: auto;
            }
            .hqfw-viewer {
                width: 100%;
            }
            .hqfw-viewer__content {
                width: 100%;
            }
            .hqfw-viewer__content[data-state='loading'] .hqfw-viewer__loader {
                display: block !important;
            }
            .hqfw-viewer__content[data-state='prepare'] .hqfw-viewer__product {
                display: block;
                visibility: hidden;
            }
            .hqfw-viewer__content[data-state='display'] .hqfw-viewer__product {
                display: block;
            }
            .hqfw-viewer__content[data-state='default'] .hqfw-viewer__product {
                display: block;
                -webkit-animation: hqfw-fade-in-top 320ms cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
                animation: hqfw-fade-in-top 320ms cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
            }
            .hqfw-viewer__content[data-state='hidden'] .hqfw-viewer__product {
                display: block;
                -webkit-animation: hqfw-fade-out-top 320ms cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                animation: hqfw-fade-out-top 320ms cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            }
            .hqfw-viewer__loader {
                display: none !important;
            }
            .hqfw-viewer__product {
                display: none;
            }
        ";

        // Loader
        $class .= Loader::get([
            'classname' => 'hqfw-viewer__loader',
            'name'      => $settings['md_loader_style'],
            'width'     => $settings['md_loader_wd'],
            'height'    => $settings['md_loader_ht'],
            'stroke'    => $settings['md_loader_stroke_wd'],
            'color_1'   => $settings['md_loader_clr_1'],
            'color_2'   => $settings['md_loader_clr_2']
        ]);

        // Product Viewer.
        $class .= "
            .hqfw-product {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                width: 100%;
                max-width: 950px;
                background-color: {$settings['md_bg_clr']};
                border-radius: {$settings['md_br']};
            }
            @media ( max-width: 992px ) {
                .hqfw-product {
                    -ms-flex-direction: column;
                    flex-direction: column;
                    max-width: 500px;
                    max-height: 770px;
                    overflow: auto;
                }
                .hqfw-product::-webkit-scrollbar {
                    width: 5px;
                }
                .hqfw-product::-webkit-scrollbar-thumb {
                    background-color: rgba(224,225,226,1);
                }
                .hqfw-product::-webkit-scrollbar-thumb:hover {
                    background-color: rgba(202, 203, 205, 1);
                }
                .hqfw-product__col-left {
                    width: 100% !important;
                }
                .hqfw-product__col-right {
                    width: 100% !important;
                }
            }
        ";

        // Navigation Button.
        if ( $settings['gn_md_enable_slider'] ) {
            $class .= "
                .hqfw-navigation-btn {
                    padding: 0;
                    width: {$settings['md_sldr_btn_wd']};
                    height: {$settings['md_sldr_btn_ht']};
                    fill: {$settings['md_sldr_btn_icon_clr']};
                    background-color: {$settings['md_sldr_btn_bg_clr']};
                    border: {$this->get_border( $settings, 'md_sldr_btn' )};
                    border-radius: {$settings['md_sldr_btn_br']};
                }
                .hqfw-navigation-btn[data-state='hidden'] {
                    display: none;
                }
                .hqfw-navigation-btn[data-event='prev'] {
                    margin-right: 10px;
                }
                .hqfw-navigation-btn[data-event='next'] {
                    margin-left: 10px;
                }
                .hqfw-navigation-btn:hover,
                .hqfw-navigation-btn:focus {
                    fill: {$settings['md_sldr_btn_icon_hv_clr']};
                    background-color: {$settings['md_sldr_btn_bg_hv_clr']};
                    border-color: {$settings['md_sldr_btn_hv_b_clr']};
                }
                .hqfw-navigation-btn svg {
                    width: {$settings['md_sldr_btn_icon_wd']};
                    height: {$settings['md_sldr_btn_icon_ht']};
                }
                @media ( max-width: 992px ) {
                    .hqfw-navigation-btn {
                        width: 35px;
                        height: 35px;
                    }
                    .hqfw-navigation-btn svg {
                        width: 18px;
                        height: auto;
                    }
                }
                @media ( max-width: 480px ) {
                    .hqfw-navigation-btn {
                        display: none;
                    }
                }
            ";
        }

        // Close Button.
        if ( $settings['gn_md_show_close_btn'] ) {
            $class .= "
                .hqfw-modal__close-btn {
                    padding: 0;
                    width: {$settings['md_close_btn_wd']};
                    height: {$settings['md_close_btn_ht']};
                    fill: {$settings['md_close_btn_icon_clr']};
                    background-color: {$settings['md_close_btn_bg_clr']};
                    border: {$this->get_border( $settings, 'md_close_btn' )};
                    border-radius: {$settings['md_close_btn_br']};
                }
                .hqfw-modal__close-btn:hover,
                .hqfw-modal__close-btn:focus {
                    fill: {$settings['md_close_btn_icon_hv_clr']};
                    background-color: {$settings['md_close_btn_bg_hv_clr']};
                    border-color: {$settings['md_close_btn_hv_b_clr']};
                }
                .hqfw-modal__close-btn svg {
                    width: {$settings['md_close_btn_icon_wd']};
                    height: {$settings['md_close_btn_icon_ht']};
                }
                .hqfw-product__summary .hqfw-modal__close-btn {
                    margin-left: auto;
                }
                .hqfw-product__gallery .hqfw-modal__close-btn {
                    display: none;
                    position: absolute;
                }
                @media ( max-width: 992px ) {
                    .hqfw-product__summary .hqfw-modal__close-btn {
                        display: none;
                    }
                    .hqfw-product__gallery .hqfw-modal__close-btn {
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        top: 0;
                        right: 0;
                        z-index: 9;
                    }
                }
            ";
        }

        // Product gallery
        $class .= "
            .hqfw-product__col-left {
                position: relative;
                width: 50%;
            }
            .hqfw-product__gallery {
                position: relative;
                padding: {$this->get_padding( $settings, 'pt_panel' )};
                width: 100%;
            }
        ";

        // Photo slider
        $class .= "
            .hqfw-photo-slider {
                position: relative;
                width: 100%;
                overflow: hidden;
            }
            .hqfw-photo-slider__container {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-transform: translate(0);
                -ms-transform: translate(0);
                transform: translate(0);
                -webkit-transition: -webkit-transform 0.8s ease;
                transition: -webkit-transform 0.8s ease;
                -o-transition: transform 0.8s ease;
                transition: transform 0.8s ease;
                transition: transform 0.8s ease, -webkit-transform 0.8s ease;
            }
            .hqfw-photo-slider__slide {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 100%;
                height: 475px;
            }
            .hqfw-photo-slider__slide > * {
                pointer-events: none;
            }
            .hqfw-photo-slider__container img {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                width:  100%;
                max-width: fit-content;
                height: auto;
                border-radius: 4px;
            }
        ";

        if ( $settings['gn_pt_enable_zoom'] ) {
            $class .= "
                .hqfw-photo-zoomer {
                    width:  100%;
                    height:  auto;
                    overflow: hidden;
                }
                .hqfw-photo-zoomer img {
                    -webkit-transform-origin: center;
                    -ms-transform-origin: center;
                    transform-origin: center;
                    -o-object-fit: cover;
                    object-fit: cover;
                    width: 100%;
                    height: 100%;
                }
            ";
        }

        // Photo slider onsale.
        if ( $settings['gn_pt_show_flash_sale'] ) {
            $class .= "
                .hqfw-photo-slider .onsale {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    position: absolute !important;
                    top: 0 !important;
                    left: 0 !important;
                    margin: 15px !important;
                    font-size: 1em !important;
                    line-height: 1em !important;
                    z-index: 9 !important;
                }
            ";
        }

        // Photo slider controller.
        if ( $settings['gn_pt_enable_slider'] ) {
            $class .= "
                .hqfw-photo-slider__controller {
                    position: absolute;
                    top: 50%;
                    padding: 0;
                    width: {$settings['pt_sldr_btn_wd']};
                    height: {$settings['pt_sldr_btn_ht']};
                    fill: {$settings['pt_sldr_btn_icon_clr']};
                    background-color: {$settings['pt_sldr_btn_bg_clr']};
                    border: {$this->get_border( $settings, 'pt_sldr_btn' )};
                    border-radius: {$settings['pt_sldr_btn_br']};
                    -webkit-transform: translateY(-50%);
                    -ms-transform: translateY(-50%);
                    transform: translateY(-50%);
                }
                .hqfw-photo-slider__controller:hover,
                .hqfw-photo-slider__controller:focus {
                    fill: {$settings['pt_sldr_btn_icon_hv_clr']};
                    background-color: {$settings['pt_sldr_btn_bg_hv_clr']};
                    border-color: {$settings['pt_sldr_btn_hv_b_clr']};
                }
                .hqfw-photo-slider__controller[data-event='prev'] {
                    left: 0;
                }
                .hqfw-photo-slider__controller[data-event='next'] {
                    right: 0;
                }
                .hqfw-photo-slider__controller svg {
                    width: {$settings['pt_sldr_btn_icon_wd']};
                    height: {$settings['pt_sldr_btn_icon_ht']};
                }
            ";
        }

        // Photo slider bullet.
        if ( $settings['gn_pt_show_bullet'] ) {
            $class .= "
                .hqfw-photo-slider__bullet {
                    position: absolute;
                    bottom: 20px;
                    width: 100%;
                }
                .hqfw-photo-slider__bullet button {
                    padding: 0;
                    margin: 0 {$settings['pt_bul_gap']};
                    width: {$settings['pt_bul_wd']};
                    height: {$settings['pt_bul_ht']};
                    background-color: {$settings['pt_bul_bg_clr']};
                    border-radius: {$settings['pt_bul_br']};
                    border: 0;
                }
                .hqfw-photo-slider__bullet button:hover,
                .hqfw-photo-slider__bullet button:focus {
                    background-color: {$settings['pt_bul_bg_ac_clr']};
                }
                .hqfw-photo-slider__bullet button[data-state='active'] {
                    background-color: {$settings['pt_bul_bg_ac_clr']};
                }
            ";
        }

        // Photo slider collection.
        if ( $settings['gn_pt_show_collection'] ) {
            $class .= "
                .hqfw-photo-slider__collection {
                    display: -ms-grid;
                    display: grid;
                    grid-gap: {$settings['pt_col_gap']};
                    grid-auto-rows: 1fr;
                    grid-template-columns: repeat(auto-fill, minmax({$settings['pt_col_mx_wd']}, 3fr));
                    margin-top: 10px !important;
                }
                .hqfw-photo-slider__collection img {
                    height: auto;
                    max-width: {$settings['pt_col_mx_wd']};
                    max-height: {$settings['pt_col_mx_wd']};
                    cursor: pointer;
                    opacity: 0.5;
                    border-radius: {$settings['pt_col_br']};
                }
                .hqfw-photo-slider__collection img:hover,
                .hqfw-photo-slider__collection img:focus {
                    opacity: 1;
                }
                .hqfw-photo-slider__collection img[data-state='active'] {
                    opacity: 1;
                }
                @media ( max-width: 992px ) {
                    .hqfw-photo-slider__collection {
                        grid-template-columns: repeat(auto-fill,minmax(40px,3fr));
                        margin-top: 5px !important;
                    }
                    .hqfw-photo-slider__collection img {
                        max-width: 40px;
                        max-height: 40px;    
                    }
                }
            ";
        }

        // Photo box.
        if ( $settings['gn_pt_enable_lightbox'] ) {
            $icon   = Helper::get_asset_src( 'images/photobox-icon.png' );
            $class .= "
                .hqfw-photobox-viewer {
                    position: fixed;
                    z-index: 9999999;
                }
                .hqfw-photobox-viewer[data-state='hide'] {
                    display: none;
                }
                .hqfw-photobox-viewer[data-state='show'] {
                    display: block;
                }
                .hqfw-photobox-viewer {
                    position: fixed;
                    top: 0;
                    left: 0;
                    padding: 10px;
                    width: 100%;
                    height: 100vh;
                    background-color: rgba(0,0,0,1);
                }
                .hqfw-photobox-viewer__controller-btn {
                    padding: 0;
                    width: 44px;
                    height: 44px;
                    background-color: transparent !important;
                    background-image: url({$icon}) !important;
                    opacity: 0.7;
                }
                .hqfw-photobox-viewer__controller-btn:hover,
                .hqfw-photobox-viewer__controller-btn:focus {
                    opacity: 1;
                }
                #hqfw-js-photobox-fullscreen-btn[data-event='show'] {
                    background-position: 0px 0px;
                }
                #hqfw-js-photobox-fullscreen-btn[data-event='exit'] {
                    background-position: -44px 0px;
                }
                #hqfw-js-photobox-close-btn {
                    background-position: 0px 44px;
                }
                .hqfw-photobox-viewer__body {
                    height: calc(100vh - 105px);
                }
                .hqfw-photobox-viewer__container {
                    width: 100%;
                    max-width: 1290px;
                }
                .hqfw-photobox-viewer__container img {
                    margin: auto;
                    max-width: 100%;
                    max-height: 100%;
                    display: block;
                }
                .hqfw-photobox-viewer__container.hqfw-photobox-zoom {
                    cursor: zoom-in;
                }
                .hqfw-photobox-viewer__container img:nth-child(2) {
                    display: none !important;
                }
                .hqfw-photobox-viewer__container.hqfw-photobox-zoom img:nth-child(2) {
                    display: block !important;
                }
                .hqfw-photobox-viewer__footer {
                    height: 40px;
                    font-size: 13px;
                    line-height: 20px;
                    color: rgba(213,213,213,1);
                    text-align: center;
                }
                .hqfw-photobox__trigger-btn,
                .woocommerce-product-gallery__trigger {
                    display: -webkit-box !important;
                    display: -ms-flexbox !important;
                    display: flex !important;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    padding: 0;
                    width: {$settings['pt_zoom_btn_wd']} !important;
                    height: {$settings['pt_zoom_btn_ht']} !important;
                    fill: {$settings['pt_zoom_btn_icon_clr']} !important;
                    background-color: {$settings['pt_zoom_btn_bg_clr']} !important;
                    border: {$this->get_border( $settings, 'pt_zoom_btn' )} !important;
                    border-radius: {$settings['pt_zoom_btn_br']} !important;
                }
                .hqfw-photobox__trigger-btn {
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    margin: 15px;
                    z-index: 9;
                }
                .woocommerce-product-gallery__trigger:before {
                    display: none !important;
                }
                .hqfw-photobox__trigger-btn:hover,
                .hqfw-photobox__trigger-btn:focus,
                .woocommerce-product-gallery__trigger:hover,
                .woocommerce-product-gallery__trigger:focus {
                    fill: {$settings['pt_zoom_btn_icon_hv_clr']} !important;
                    background-color: {$settings['pt_zoom_btn_bg_hv_clr']} !important;
                    border-color: {$settings['pt_zoom_btn_hv_b_clr']} !important;
                }
                .hqfw-photobox__trigger-btn svg,
                .woocommerce-product-gallery__trigger svg {
                    width: {$settings['pt_zoom_btn_icon_wd']} !important;
                    height: {$settings['pt_zoom_btn_icon_ht']} !important;
                }
            ";
        }

        // Product Summary.
        $class .= "
            .hqfw-product__col-right {
                position: relative;
                width: 50%;
            }
            .hqfw-product__summary {
                position: relative;
                width: 100%;
            }
            .hqfw-product__summary__body {
                overflow: auto;
            }
            .hqfw-product__summary__content {
                padding: {$this->get_padding( $settings, 'ps_panel' )};
                padding-top: 0;
            }
            .hqfw-product__summary__body::-webkit-scrollbar {
                width: 5px;
            }
            .hqfw-product__summary__body::-webkit-scrollbar-thumb {
                background-color: rgba(224,225,226,1);
            }
            .hqfw-product__summary__body::-webkit-scrollbar-thumb:hover {
                background-color: rgba(202, 203, 205, 1);
            }
        ";

        // Product Title.
        if ( $settings['gn_ps_show_title'] ) {
            $class .= "
                .hqfw .product_title {
                    margin-bottom: {$settings['ps_name_mb']};
                    color: {$settings['ps_name_clr']};
                    font-size: {$settings['ps_name_fs']};
                    font-weight: {$settings['ps_name_fw']};
                    line-height: {$settings['ps_name_lh']};
                }
            ";
        }

        // Product Rating.
        if ( $settings['gn_ps_show_rating'] ) {
            $class .= "
                .hqfw .woocommerce-product-rating {
                    margin-bottom: {$settings['ps_rating_mb']};
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                }
                .hqfw .star-rating {
                    margin-right: 10px;
                }
                .hqfw .star-rating::before {
                    opacity: 1;
                    color: {$settings['ps_rating_star_clr_2']};
                }
                .hqfw .star-rating span:before {
                    color: {$settings['ps_rating_star_clr_1']};
                }
                .hqfw .woocommerce-review-link {
                    color: {$settings['ps_rating_label_clr']};
                    font-size: {$settings['ps_rating_label_fs']};
                    font-weight: {$settings['ps_rating_label_fw']};
                    line-height: {$settings['ps_rating_label_lh']};
                }
            ";
        }

        // Product Price.
        if ( $settings['gn_ps_show_price'] ) {
            $class .= "
                .hqfw .price {
                    margin-bottom: {$settings['ps_price_mb']};
                    color: {$settings['ps_price_clr']};
                    font-size: {$settings['ps_price_fs']};
                    font-weight: {$settings['ps_price_fw']};
                    line-height: {$settings['ps_price_lh']};
                }
            ";
        }

        // Product Short Description.
        if ( $settings['gn_ps_show_exerpt'] ) {
            $class .= "
                .hqfw .woocommerce-variation-description,
                .hqfw .woocommerce-product-details__short-description {
                    color: {$settings['ps_desc_clr']};
                    font-size: {$settings['ps_desc_fs']};
                    font-weight: {$settings['ps_desc_fw']};
                    line-height: {$settings['ps_desc_lh']};
                }
                .hqfw .woocommerce-product-details__short-description {
                    margin-bottom: {$settings['ps_desc_mb']};
                }
            ";
        }

        // Product Add To Cart.
        if ( $settings['gn_ps_show_add_to_cart'] ) {
            $class .= "
                .hqfw form.cart {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    margin-bottom: {$settings['ps_form_atc_mb']};
                }
                .hqfw form.cart .quantity {
                    margin-right: 10px;
                    margin-bottom: 10px;
                }
                .hqfw form.cart .quantity.hidden {
                    margin-right: 0;
                }
                .hqfw form.cart .single_add_to_cart_button {
                    margin-right: 10px;
                    margin-bottom: 10px;
                }
                .hqfw form.variations_form.cart {
                    display: block;
                }
                .hqfw form.cart .woocommerce-variation-add-to-cart {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap
                }
                .hqfw form.grouped_form.cart {
                    display: block;
                }
                .hqfw table.variations {
                    margin-bottom: {$settings['ps_form_var_mb']};
                }
                .hqfw table.variations tr {
                    display: block;
                    margin-bottom: 10px;
                }
                .hqfw table.variations tr:last-child {
                    margin-bottom: 0;
                }
                .hqfw table.variations th.label {
                    display: block;
                    padding: 0;
                    margin-bottom: 5px;
                    text-align: left;
                    background-color: transparent;
                }
                .hqfw table.variations td.value {
                    display: block;
                    padding: 0;
                    background-color: transparent;
                }
                .hqfw .woocommerce-variation.single_variation {
                    display: none;
                    margin-bottom: 20px;
                }
                .hqfw .single_variation_wrap .woocommerce-variation-description {
                    margin-bottom: 10px;
                }
                .hqfw .single_variation_wrap .woocommerce-variation-price {
                    margin-bottom: 10px;
                }
                .hqfw .single_variation_wrap .woocommerce-variation-availability {
                    margin-bottom: 10px;
                }
            ";
        }

        // Product Stock Status.
        $class .= "
            .hqfw .stock {
                font-size: {$settings['ps_stst_fs']};
                font-weight: {$settings['ps_stst_fw']};
                line-height: {$settings['ps_stst_lh']};
            }
            .hqfw .stock.in-stock {
                color: {$settings['ps_stst_ink_clr']};
            }
            .hqfw .stock.available-on-backorder {
                color: {$settings['ps_stst_aob_clr']};
            }
            .hqfw .stock.out-of-stock {
                color: {$settings['ps_stst_ook_clr']};
            }
        ";

        // Product Meta.
        if ( $settings['gn_ps_show_meta'] ) {
            $class .= "
                .hqfw .product_meta > span {
                    display: block;
                    padding: 5px 0;
                    color: {$settings['ps_meta_clr']};
                    font-size: {$settings['ps_meta_fs']};
                    font-weight: {$settings['ps_meta_fw']};
                    line-height: {$settings['ps_meta_lh']};
                    border-top: {$this->get_border( $settings, 'ps_meta' )};
                }
                .hqfw .product_meta > span:last-child {
                    border-bottom: {$this->get_border( $settings, 'ps_meta' )};
                }
                .hqfw .product_meta a {
                    color: {$settings['ps_meta_link_clr']};
                }
                .hqfw .product_meta a:hover,
                .hqfw .product_meta a:focus {
                    color: {$settings['ps_meta_link_hv_clr']};
                }
            ";
        }

        // Additional CSS.
        if ( ! empty( $settings['ad_stg_additional_css'] ) ) {
            $class .= $settings['ad_stg_additional_css'];
        }

        $style = '<style id="hqfw-internal-style">'. $class .'</style>';
        echo $this->minify_internal_css( $style );
    }
}