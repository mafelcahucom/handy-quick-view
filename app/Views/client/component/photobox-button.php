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

<button id="hqfw-js-photobox-trigger-btn" class="hqfw-photobox__trigger-btn hqfw-hover hqfw-flex-c" title="Zoom In" aria-label="Zoom In">
    <?php echo Helper::get_icon( 'bs-zoom-in' ); ?>
</button>