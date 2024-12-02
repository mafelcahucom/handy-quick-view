<?php
/**
 * App > Client > Inc > Lib > Content.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

namespace HQFW\Client\Inc\Lib;

use HQFW\Inc\Traits\Singleton;
use HQFW\Inc\Plugins;
use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * The `Content` class contains the all quick view
 * sections and components hooked to a custom actions.
 *
 * @since 1.0.0
 */
final class Content {

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
     * Generate and render content for product quick view content. Note
     * generate method must be call inside WP_Query loop.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function generate() {
        /**
         * Settings.
         */
        $settings = get_option( '_hqfw_main_settings' );

        /**
         * Product gallery.
         */
        add_action( 'hqfw_product_gallery', array( __CLASS__, 'product_image_gallery' ), 5 );

        /**
         * Product gallery slider.
         */
        if ( $settings['gn_md_show_close_btn'] ) {
            add_action( 'hqfw_product_gallery_slider', array( __CLASS__, 'close_button' ), 5 );
        }

        if ( $settings['gn_pt_enable_lightbox'] ) {
            add_action( 'hqfw_product_gallery_slider', array( __CLASS__, 'photo_box_button' ), 10 );
        }

        if ( $settings['gn_pt_show_flash_sale'] ) {
            add_action( 'hqfw_product_gallery_slider', 'woocommerce_show_product_sale_flash', 15 );
        }

        /**
         * Product summary head.
         */
        if ( $settings['gn_md_show_close_btn'] ) {
            add_action( 'hqfw_product_summary_head', array( __CLASS__, 'close_button' ), 5 );
        }

        /**
         * Product summary body.
         */
        if ( $settings['gn_ps_show_title'] ) {
            add_action( 'hqfw_product_summary_body', 'woocommerce_template_single_title', 5 );
        }

        if ( $settings['gn_ps_show_rating'] ) {
            add_action( 'hqfw_product_summary_body', 'woocommerce_template_single_rating', 10 );
        }

        if ( $settings['gn_ps_show_price'] ) {
            add_action( 'hqfw_product_summary_body', 'woocommerce_template_single_price', 15 );
        }

        if ( $settings['gn_ps_show_exerpt'] ) {
            add_action( 'hqfw_product_summary_body', 'woocommerce_template_single_excerpt', 20 );
        }

        if ( $settings['gn_ps_show_add_to_cart'] ) {
            add_action( 'hqfw_product_summary_body', 'woocommerce_template_single_add_to_cart', 25 );
            if ( Plugins::is_active( 'handy-add-to-cart' ) ) {
                self::modify_grouped_quantity_input();
            }
        }

        if ( $settings['gn_ps_show_meta'] ) {
            add_action( 'hqfw_product_summary_body', 'woocommerce_template_single_meta', 30 );
        }
    }

    /**
     * Render the product image gallery.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function product_image_gallery() {
        echo Helper::render_view( 'component/product-gallery', array(
            'images' => self::get_product_images( get_the_ID() ),
        ) );
    }

    /**
     * Render the quick view modal close button.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function close_button() {
        echo Helper::render_view( 'component/close-button' );
    }

    /**
     * Render the photobox button.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function photo_box_button() {
        echo Helper::render_view( 'component/photobox-button' );
    }

    /**
     * Return the product images used in featured thumbnail and gallery.
     *
     * @since 1.0.0
     *
     * @param  integer $product_id Contains the target product id.
     * @return array
     */
    private static function get_product_images( $product_id ) {
        if ( empty( $product_id ) ) {
            return;
        }

        $product = wc_get_product( $product_id );
        if ( ! $product ) {
            return;
        }

        // Store images.
        $images = array();

        // Get primary image.
        $primary_image       = Helper::get_product_thumbnail_src( $product_id );
        $primary_image_id    = 0;
        $primary_image_title = get_the_title();
        if ( has_post_thumbnail( $product_id ) ) {
            $primary_image_id    = get_post_thumbnail_id( $product_id );
            $primary_image_title = get_the_title( $primary_image_id );
        }

        // Push primary image.
        array_push( $images, array(
            'id'    => $primary_image_id,
            'title' => $primary_image_title,
            'image' => $primary_image,
        ) );

        // Gat gallery images.
        $attachment_ids = $product->get_gallery_image_ids();
        if ( ! empty( $attachment_ids ) ) {
            foreach ( $attachment_ids as $attachment_id ) {
                // Check if the image id is already exits in $images.
                // phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
                if ( ! in_array( $attachment_id, array_column( $images, 'id' ) ) ) {
                    $image_title = get_the_title( $attachment_id );
                    $image       = Helper::get_attachment_image_src( $attachment_id );

                    // Push gallery image.
                    array_push( $images, array(
                        'id'    => $attachment_id,
                        'title' => $image_title,
                        'image' => $image,
                    ) );
                }
            }
        }

        return $images;
    }

    /**
     * Quantity input adding class attributes if handy-add-to-cart is active.
     *
     * @since 1.0.0
     *
     * @return void
     */
    private static function modify_grouped_quantity_input() {
        $product = wc_get_product( get_the_ID() );
        if ( $product && $product->is_type( 'grouped' ) ) {
            // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed
            add_filter( 'woocommerce_quantity_input_classes', function( $classes, $current_product ) {
                $classes['additional'] = 'hafw-grouped-quantity-input';
                return $classes;
            }, 10, 2 );
        }
    }
}
