<?php
/**
 * App > Client > Inc > Helper.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

namespace HQFW\Client\Inc;

use HQFW\Inc\Traits\Singleton;
use HQFW\Client\Inc\Icon;

defined( 'ABSPATH' ) || exit;

/**
 * The `Helper` class contains all the helper methods
 * solely for client side or front-end.
 *
 * @since 1.0.0
 */
final class Helper {

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
     * Return boolean whether the plugin has a missing
     * options "_hqfw_plugin_version" or "_hqfw_main_settings";
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function plugin_has_error() {
        return ( empty( get_option( '_hqfw_plugin_version' ) ) || empty( get_option( '_hqfw_main_settings' ) ) );
    }

    /**
     * Return the base url of client public asset folder.
     *
     * @since 1.0.0
     *
     * @param  string $file_path Contains the relative path with filename.
     * @return string
     */
    public static function get_public_src( $file_path = '' ) {
        return HQFW_PLUGIN_URL . 'public/client/' . $file_path;
    }

    /**
     * Return the base url of client resources asset folder.
     *
     * @since 1.0.0
     *
     * @param  string $file_path Contains the relative path with filename.
     * @return string
     */
    public static function get_resource_src( $file_path = '' ) {
        return HQFW_PLUGIN_URL . 'resources/client/' . $file_path;
    }

    /**
     * Return the client asset version.
     *
     * @since 1.0.0
     *
     * @param  string $file Contains the target filename.
     * @return string
     */
    public static function get_asset_version( $file ) {
        $version = '1.0.0';
        if ( ! empty( $file ) ) {
            $settings = get_option( '_hqfw_main_settings' );
            if ( $settings['ad_opt_enable_cache'] ) {
                $version = filemtime( HQFW_PLUGIN_PATH . 'assets/client/dist/' . $file );
            }
        }

        return $version;
    }

    /**
     * Render client view.
     *
     * @since 1.0.0
     *
     * @param  string $filename Contains the target filename.
     * @param  array  $args     Contains the additional arguments.
     * @return string
     */
    public static function render_view( $filename, $args = array() ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
        $file = HQFW_PLUGIN_PATH . 'app/Views/client/' . $filename . '.php';
        if ( ! file_exists( $file ) ) {
            return;
        }

        ob_start();
        require $file;
        return ob_get_clean();
    }

    /**
     * Returns the svg icon.
     *
     * @since 1.0.0
     *
     * @param  string $type      Contains the type of icon.
     * @param  string $classname Contains the additional classname.
     * @return string
     */
    public static function get_icon( $type, $classname = '' ) {
        return Icon::get( $type, $classname );
    }

    /**
     * Returns the attachment image with title tag & lazyload attribute.
     *
     * @since 1.0.0
     *
     * @param  integer $attachment_id         Contains the target attachment id.
     * @param  string  $size                  Contains the specific image size from add_image_size().
     * @param  array   $additional_attributes Contains the additional attributes.
     * @return string
     */
    public static function get_attachment_image( $attachment_id, $size = 'full', $additional_attributes = array() ) {
        $output = '';
        if ( ! empty( $attachment_id ) ) {
            $default_attributes = array(
                'title'   => get_the_title( $attachment_id ),
                'loading' => 'lazy',
            );
            $attributes = array_merge( $additional_attributes, $default_attributes );
            $output     = wp_get_attachment_image( $attachment_id, $size, false, $attributes );
        }

        return $output;
    }

    /**
     * Return the product placeholder image source.
     *
     * @since 1.0.0
     *
     * @param  string $size Contains the registered image sizes.
     * @return string
     */
    public static function get_product_thumbnail_placeholder_src( $size = 'full' ) {
        $source = wc_placeholder_img_src( $size );
        if ( empty( $source ) ) {
            $source = self::get_resource_src( 'images/thumbnail-placeholder.webp' );
        }

        return $source;
    }

    /**
     * Return the product placeholder image.
     *
     * @since 1.0.0
     *
     * @param  string $alt        Contains the will be used in alt attribute.
     * @param  string $title      Contains the Will be used in title attribute.
     * @param  string $classnames Contains the additional classnames.
     * @return string
     */
    public static function get_product_thumbnail_placeholder( $alt = '', $title = '', $classnames = '' ) {
        $source = self::get_product_thumbnail_placeholder_src( 'woocommerce_thumbnail' );

        return sprintf(
            '<img src="%s" class="%s" alt="%s" title="%s">',
            esc_url( $source ),
            esc_attr( $classnames ),
            esc_attr( $alt ),
            esc_attr( $title )
        );
    }

    /**
     * Return the product thumbnail image.
     *
     * @since 1.0.0
     *
     * @param  array $args Contaings all the parameters need to render product thumbnail.
     * $args = [
     *     'product_id'   => (integer) Contains the target product id.
     *     'variation_id' => (integer) Contains the target variation id.
     *     'class'        => (string)  Contains the additional class.
     * ]
     * @return string
     */
    public static function get_product_thumbnail( $args = array() ) {
        if ( ! isset( $args['product_id'] ) && ! isset( $args['variation_id'] ) ) {
            return;
        }

        $output = '';
        $title  = '';
        $class  = ( isset( $args['class'] ) ? $args['class'] : '' );
        if ( ! empty( $args['variation_id'] ) ) {
            $title = get_the_title( $args['variation_id'] );
            if ( has_post_thumbnail( $args['variation_id'] ) ) {
                $output = self::get_attachment_image( get_post_thumbnail_id( $args['variation_id'] ), 'woocommerce_thumbnail',  array(
                    'class' => $class,
                ));
            }
        }

        if ( empty( $output ) ) {
            $title = get_the_title( $args['product_id'] );
            if ( has_post_thumbnail( $args['product_id'] ) ) {
                $output = self::get_attachment_image( get_post_thumbnail_id( $args['product_id'] ), 'woocommerce_thumbnail',  array(
                    'class' => $class,
                ));
            }
        }

        if ( empty( $output ) ) {
            $output = self::get_product_thumbnail_placeholder( $title, $title, $class );
        }

        return $output;
    }

    /**
     * Return the product thumnail image source.
     *
     * @since 1.0.0
     *
     * @param  integer $product_id Contains the target product id.
     * @return string
     */
    public static function get_product_thumbnail_src( $product_id ) {
        if ( empty( $product_id ) ) {
            return;
        }

        $source = '';
        if ( has_post_thumbnail( $product_id ) ) {
            $source = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'full' );
        }

        if ( empty( $source ) ) {
            $source = self::get_product_thumbnail_placeholder_src( 'full' );
        }

        return $source;
    }

    /**
     * Return the attachment image source with product image placeholder.
     *
     * @since 1.0.0
     *
     * @param  integer $attachment_id Contains the target attachment id.
     * @return string
     */
    public static function get_attachment_image_src( $attachment_id ) {
        if ( empty( $attachment_id ) ) {
            return;
        }

        $source = wp_get_attachment_image_src( $attachment_id, 'full' );
        if ( empty( $source ) ) {
            $source = self::get_product_thumbnail_placeholder_src( 'full' );
        }

        return $source;
    }

    /**
     * Return the image zoom class, if the image width & height is valid.
     *
     * @since 1.0.0
     *
     * @param  integer $width  Contains the width of the image.
     * @param  integer $height Contains the height of the image.
     * @return string
     */
    public static function get_zoom_class( $width, $height ) {
        if ( empty( $width ) || empty( $height ) ) {
            return;
        }

        $output = '';
        if ( $width >= 475 && $height >= 475 ) {
            $output = 'hqfw-image-zoom';
        }

        return $output;
    }
}
