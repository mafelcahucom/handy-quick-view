<?php
/**
 * App > Views > Client > Component > Product Content.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

defined( 'ABSPATH' ) || exit;

$settings = get_option( '_hqfw_main_settings' );
?>

<div class="hqfw-product">
    <div class="hqfw-product__col-left">
        <div class="hqfw-product__gallery">
            <?php
                /**
                 * HOOK: hqfw_product_gallery.
                 *
                 * @hooked product_image_gallery - 5
                 */
                do_action( 'hqfw_product_gallery' );
            ?>
        </div>
    </div>
    <div class="hqfw-product__col-right">
        <div class="hqfw-product__summary">
            <div class="hqfw-product__summary__head">
                <?php
                    /**
                     * HOOK: hqfw_product_summary_head.
                     *
                     * @hooked close_button - 5
                     */
                    do_action( 'hqfw_product_summary_head' );
                ?>
            </div>
            <div class="hqfw-product__summary__body">
                <div class="hqfw-product__summary__content">
                    <?php
                        /**
                         * HOOK: hqfw_product_summary_body.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 15
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 25
                         * @hooked woocommerce_template_single_meta - 30
                         */
                        do_action( 'hqfw_product_summary_body' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
