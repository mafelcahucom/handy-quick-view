<?php
/**
 * Views > Client > Shortcode > Quick View Button.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit; 

/**
 * $args = [
 *     'id' => (integer) The ID of the product to be view.
 *]
 **/

if ( ! isset( $args['id'] ) ) {
    return;
}
?>

<button type="button" class="hqfw-js-quick-view-btn hqfw-quick-view-btn hqfw" data-product_id="<?php echo esc_attr( $args['id'] ); ?>">
    <div class="hqfw-flex hqfw-ai-c">
        <div>
            <span>Quick View</span>
        </div>
        <div>
            <?php echo Helper::get_icon( 'bs-eye' ); ?>
        </div>
    </div>
</button>