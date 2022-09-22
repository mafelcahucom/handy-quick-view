<?php
/**
 * Views > Client > Component > Product Content.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<div class="hqfw-product">
    <div class="hqfw-product__gallery">
        <?php
            /**
             * HOOK: hqfw_product_gallery.
             *
             * 
             */
            do_action( 'hqfw_product_gallery' );
        ?>
    </div>
    <div class="hqfw-product__summary">
        <?php
            /**
             * HOOK: hqfw_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 15
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 25
             * @hooked woocommerce_template_single_meta - 30
             */
            do_action( 'hqfw_product_summary' ); 
        ?>
    </div>
</div>
