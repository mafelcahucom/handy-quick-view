<?php
/**
 * Views > Client > Component > Photobox Button.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<button id="hqfw-js-photobox-trigger-btn" class="hqfw-photobox__trigger-btn hqfw-hover" title="<?php echo __( 'Zoom In', HQFW_PLUGIN_DOMAIN ); ?>" aria-label="<?php echo __( 'Zoom In', HQFW_PLUGIN_DOMAIN ); ?>">
    <?php echo Helper::get_icon( 'bs-search-plus' ); ?>
</button>