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

<button class="hqfw-js-close-modal hqfw-modal__close-btn hqfw-hover hqfw-flex-c" title="Close (Esc)" aria-label="Close (Esc)">
    <?php echo Helper::get_icon( 'bs-close' ); ?>
</button>
