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
        
        // Global
        $class = "
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

        $class .= "
            .hqfw-quick-view-btn > * {
                pointer-events: none;
            }
            .hqfw-quick-view-btn svg {
                margin-left: 10px;
                width: 20px;
            }
        ";

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
                background-color: rgba(0,0,0,0.5);
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
            .hqfw-viewer__content[data-state='default'] .hqfw-viewer__product {
                display: block;
            }
            .hqfw-viewer__loader {
                display: none !important;
            }
            .hqfw-viewer__product {
                display: none;
            }
        ";

        $class .= "
            .hqfw-navigation-btn {
                padding: 0;
                width: 45px;
                height: 45px;
                fill: rgba(255,255,255,0.7);
                background-color: transparent;
                border-radius: 4px;
            }
            .hqfw-navigation-btn[data-event='prev'] {
                margin-right: 20px;
            }
            .hqfw-navigation-btn[data-event='next'] {
                margin-left: 20px;
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

        $class .= Loader::get([
            'classname' => 'hqfw-viewer__loader',
            'name'      => 'pulse-2',
            'width'     => '40px',
            'height'    => '40px',
            'stroke'    => '2px',
            'color_1'   => 'rgba(255,255,255,1)',
            'color_2'   => 'rgba(255,255,255,1)'
        ]);

        $class .= "
            .hqfw-product {
                display: flex;
                width: 100%;
                max-width: 950px;
                background-color: #ffffff;
                border-radius: 4px;
            }
            .hqfw-product__gallery {
                padding: 15px;
                width: 50%;
            }
            .hqfw-product__summary {
                padding: 15px;
                width: 50%;
                overflow: auto;
            }
        ";

        $class .= "
            .hqfw-photo-zoomer {
                width:  100%;
                height:  auto;
                overflow: hidden;
            }
            .hqfw-photo-zoomer img {
                transform-origin: center;
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        ";

        $class .= "
            .hqfw-photo-slider {
                position: relative;
                width: 100%;
                overflow:  hidden;
            }
            .hqfw-photo-slider__container {
                display: flex;
                transform: translate(0);
                transition: transform 0.8s ease;
            }
            .hqfw-photo-slider__slide {
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
                display: flex;
                width:  100%;
                max-width: fit-content;
                height: auto;
                border-radius: 4px;
            }
        ";

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

        $class .= "
            .hqfw-photo-slider__collection {
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
        

        $style    = '<style id="hqfw-inline-style">'. $class .'</style>';
        echo $this->minify_inline_css( $style );
    }
}