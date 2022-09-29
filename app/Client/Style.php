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
	 * Register Shortcodes.
	 */
	use Singleton;

	/**
     * Print inline css in wp_head.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        add_action( 'wp_head', [ $this, 'custom_inline_css' ], 100 );
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
     * Minify the inline css.
     *
     * @since 1.0.0
     * 
     * @param  string  $css  The inline css to be minify.
     * @return string
     */
    private function minify_inline_css( $css ) {
        $css = preg_replace( '/\s+/', ' ', $css );
        $css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
        $css = preg_replace( '/(,|:|;|\{|}) /', '$1', $css );
        $css = preg_replace( '/ (,|;|\{|})/', '$1', $css );
        $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
        $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

        return trim( $css );
    }

    /**
     * Custom Inline Css.
     *
     * @since 1.0.0
     * 
     * @return string
     */
    public function custom_inline_css() {
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

        // Quick view button
        $class .= "
            .hqfw-quick-view-btn > * {
                pointer-events: none;
            }
            .hqfw-quick-view-btn svg {
                margin-left: 10px;
                width: 20px;
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
                background-color: rgba(0,0,0,0.8);
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
            'name'      => 'pulse-2',
            'width'     => '40px',
            'height'    => '40px',
            'stroke'    => '2px',
            'color_1'   => 'rgba(255,255,255,1)',
            'color_2'   => 'rgba(255,255,255,1)'
        ]);

        // Navigation button.
        $class .= "
            .hqfw-navigation-btn {
                padding: 0;
                width: 45px;
                height: 45px;
                fill: rgba(255,255,255,0.7);
                background-color: transparent;
                border-radius: 4px;
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
                fill: rgba(255,255,255,1);
                background-color: rgba(0,0,0,0.7);
            }
            .hqfw-navigation-btn svg {
                width: 25px;
                height: auto;
            }
        ";

        // Product viewer
        $class .= "
            .hqfw-product {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                width: 100%;
                max-width: 950px;
                background-color: #ffffff;
                border-radius: 4px;
            }
        ";

        // Close Button.
        $class .= "
            .hqfw-modal__close-btn {
                padding: 0;
                width: 35px;
                height: 35px;
                fill: rgba(0,0,0,0.6);
                background-color: rgba(0,0,0,0);
            }
            .hqfw-modal__close-btn:hover,
            .hqfw-modal__close-btn:focus {
                fill: rgba(0,0,0,0.8);
                background-color: rgba(0,0,0,0);
            }
            .hqfw-modal__close-btn svg {
                width: 30px;
                height: 30px;
            }
            .hqfw-product__summary .hqfw-modal__close-btn {
                margin-left: auto;
            }
            .hqfw-product__gallery .hqfw-modal__close-btn {
                display: none;
                position: absolute;
            }
        ";

        // Product gallery
        $class .= "
            .hqfw-product__col-left {
                position: relative;
                width: 50%;
            }
            .hqfw-product__gallery {
                position: relative;
                padding: 15px;
                width: 100%;
            }
        ";

        // Photo Zoomer
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

        // Photo slider onsale.
        $class .= "
            .hqfw-photo-slider .onsale {
                position: absolute;
                top: 0;
                left: 0;
                margin: 15px;
                z-index: 9;
            }
        ";

        // Photo slider controller.
        $class .= "
            .hqfw-photo-slider__controller {
                position: absolute;
                top: 50%;
                padding: 0;
                width: 35px;
                height: 35px;
                fill: rgba(0,0,0,0.7);
                background-color: transparent;
                border-radius: 4px;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .hqfw-photo-slider__controller:hover,
            .hqfw-photo-slider__controller:focus {
                fill: rgba(255,255,255,1);
                background-color: rgba(0,0,0,0.7);
            }
            .hqfw-photo-slider__controller[data-event='prev'] {
                left: 0;
            }
            .hqfw-photo-slider__controller[data-event='next'] {
                right: 0;
            }
            .hqfw-photo-slider__controller svg {
                width: 20px;
                height: 20px;
            }
        ";

        // Photo slider bullet.
        $class .= "
            .hqfw-photo-slider__bullet {
                position: absolute;
                bottom: 20px;
                width: 100%;
            }
            .hqfw-photo-slider__bullet button {
                padding: 0;
                margin: 0 4px;
                width: 8px;
                height: 8px;
                background-color: rgba(0,0,0,0.4);
                border-radius: 10px;
            }
            .hqfw-photo-slider__bullet button:hover,
            .hqfw-photo-slider__bullet button:focus {
                background-color: rgba(0,0,0,0.7);
            }
            .hqfw-photo-slider__bullet button[data-state='active'] {
                background-color: rgba(0,0,0,0.7);
            }
        ";

        // Photo slider collection.
        $class .= "
            .hqfw-photo-slider__collection {
                display: -ms-grid;
                display: grid;
                grid-gap: 10px;
                grid-auto-rows: 1fr;
                grid-template-columns: repeat(auto-fill, minmax(45px, 3fr));
                margin-top: 10px !important;
            }
            .hqfw-photo-slider__collection img {
                height: auto;
                max-height: 45px;
                cursor: pointer;
                opacity: 0.5;
            }
            .hqfw-photo-slider__collection img:hover,
            .hqfw-photo-slider__collection img:focus {
                opacity: 1;
            }
            .hqfw-photo-slider__collection img[data-state='active'] {
                opacity: 1;
            }
        ";

        // Photo box.
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
                width: 45px;
                height: 45px;
                fill: rgba(213,213,213,1);
                background-color: transparent;
            }
            .hqfw-photobox-viewer__controller-btn:hover,
            .hqfw-photobox-viewer__controller-btn:focus {
                fill: rgba(255,255,255,1);
                background-color: transparent;
            }
            .hqfw-photobox-viewer__controller-btn svg {
                width: 16px;
                height: auto;
            }
            #hqfw-js-photobox-fullscreen-btn[data-event='show'] .hqfw-fullscreen {
                display: block;
            }
            #hqfw-js-photobox-fullscreen-btn[data-event='show'] .hqfw-fullscreen-exit {
                display: none;
            }
            #hqfw-js-photobox-fullscreen-btn[data-event='exit'] .hqfw-fullscreen {
                display: none;
            }
            #hqfw-js-photobox-fullscreen-btn[data-event='exit'] .hqfw-fullscreen-exit {
                display: block;
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
            .hqfw-photobox-viewer__footer {
                height: 40px;
                font-size: 13px;
                line-height: 20px;
                color: rgba(213,213,213,1);
                text-align: center;
            }
            .hqfw-photobox__trigger-btn {
                position: absolute;
                bottom: 0;
                right: 0;
                padding: 0;
                margin: 15px;
                width: 30px;
                height: 30px;
                fill: rgba(51,51,51,1);
                background-color: rgba(238,238,238,1);
                border: 1px solid rgba(238,238,238,1);
                border-radius: 4px;
                z-index: 9;
            }
            .hqfw-photobox__trigger-btn:hover,
            .hqfw-photobox__trigger-btn:focus {
                fill: rgba(51,51,51,1);
                background-color: rgba(213,213,213,1);
                border: 1px solid rgba(213,213,213,1);
            }
            .hqfw-photobox__trigger-btn svg {
                width: 18px;
                height: auto;
            }
        ";

        // Product summary.
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
                padding: 15px;
                padding-top: 0;
            }
        ";

        // Product summary body.
        $class .= "
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

        // Product title.
        $class .= "
            .hqfw .product_title {
                margin-bottom: 10px;
                color: rgba(51,51,51,1);
                font-size: 26px;
                font-weight: 500;
                line-height: 33.6px;
            }
        ";

        // Product rating.
        $class .= "
            .hqfw .woocommerce-product-rating {
                margin-bottom: 20px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }
            .hqfw .star-rating {
                margin-right: 10px;
            }
            .hqfw .star-rating::before {
                opacity: 1;
                color: rgba(44,45,51,0.25);
            }
            .hqfw .star-rating span:before {
                color: rgba(127,84,179,1);
            }
            .hqfw .woocommerce-review-link {
                color: rgba(51,51,51,1);
                font-size: 16px;
                font-weight: 400;
                line-height: 24px;
            }
        ";

        // Product price.
        $class .= "
            .hqfw .price {
                margin-bottom: 20px;
                color: rgba(51,51,51,1);
                font-size: 22px;
                font-weight: 500;
                line-height: 26.4px;
            }
        ";

        // Product short description.
        $class .= "
            .hqfw .woocommerce-product-details__short-description {
                margin-bottom: 20px;
                color: rgba(51,51,51,1);
                font-size: 16px;
                font-weight: 400;
                line-height: 24px;
            }
        ";

        // Product description.
        $class .= "
            .hqfw .woocommerce-variation-description {
                color: rgba(51,51,51,1);
                font-size: 16px;
                font-weight: 400;
                line-height: 24px;
            }
        ";

        // Product stock.
        $class .= "
            .hqfw .stock {
                font-size: 16px;
                font-weight: 400;
                line-height: 24px;
            }
            .hqfw .stock.in-stock {
                color: rgba(15,131,77,1);
            }
            .hqfw .stock.available-on-backorder {
                color: rgba(51,51,51,1);
            }
            .hqfw .stock.out-of-stock {
                color: rgba(226,64,28,1);
            }
        ";

        // Product form.
        $class .= "
            .hqfw form.cart {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap
                margin-bottom: 20px;
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
                margin-bottom: 20px;
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

        // Product meta.
        $class .= "
            .hqfw .product_meta > span {
                display: block;
                padding: 5px 0;
                color: rgba(51,51,51,1);
                font-size: 14px;
                font-weight: 400;
                line-height: 21px;
                border-top: 1px solid rgba(0,0,0,0.05);
            }
            .hqfw .product_meta > span:last-child {
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }
        ";

        // Media query.
        $class .= "
            @media ( max-width: 992px ) {
                .hqfw-navigation-btn {
                    width: 35px;
                    height: 35px;
                }
                .hqfw-navigation-btn svg {
                    width: 18px;
                    height: auto;
                }
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
                    width: 100%;
                }
                .hqfw-product__col-right {
                    width: 100%;
                }
                .hqfw-photo-slider__collection {
                    grid-template-columns: repeat(auto-fill,minmax(30px,3fr));
                    margin-top: 5px !important;
                }
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
            @media ( max-width: 480px ) {
                .hqfw-navigation-btn {
                    display: none;
                }
            }
        ";

        $style    = '<style id="hqfw-inline-style">'. $class .'</style>';
        echo $this->minify_inline_css( $style );
    }
}