<?php
/**
 * App > Views > Client > Shortcode > Quick View Button.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * $args = [
 *     'id' => (integer) Contains the ID of the product to be view.
 *]
 */

if ( ! isset( $args['id'] ) ) {
    return;
}

$settings = get_option( '_hqfw_main_settings' );
?>

<button type="button" class="hqfw hqfw-js-quick-view-btn hqfw-quick-view-btn hqfw-hover <?php echo esc_attr( $settings['qv_btn_style'] ); ?>" data-product_id="<?php echo esc_attr( $args['id'] ); ?>" title="<?php echo __( 'Quick View', 'handy-quick-view' ); ?>" aria-label="<?php echo __( 'Quick View', 'handy-quick-view' ); ?>">
    <div class="hqfw-flex hqfw-flex-ai-c">
        <?php if ( in_array( $settings['qv_btn_style'], array( 'text', 'text-icon' ), true ) ) : ?>
            <span>
                <?php echo esc_html( $settings['qv_btn_text'] ); ?>
            </span>
        <?php endif; ?>
        <?php
            if ( in_array( $settings['qv_btn_style'], array( 'icon', 'text-icon' ), true ) ) {
			    if ( ! empty( $settings['qv_btn_icon'] ) ) {
				    echo Helper::get_icon( $settings['qv_btn_icon'] );
                }
            }
        ?>
    </div>
</button>
