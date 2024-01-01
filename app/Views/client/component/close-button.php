<?php
/**
 * Views > Client > Component > Close Button.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<button class="hqfw-js-close-modal hqfw-modal__close-btn hqfw-hover hqfw-flex-c" title="<?php echo __( 'Close (Esc)', HQFW_PLUGIN_DOMAIN ); ?>" aria-label="<?php echo __( 'Close (Esc)', HQFW_PLUGIN_DOMAIN ); ?>">
    <?php echo Helper::get_icon( 'bs-close' ); ?>
</button>
