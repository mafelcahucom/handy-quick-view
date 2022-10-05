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

<button id="hqfw-js-photobox-trigger-btn" class="hqfw-photobox__trigger-btn hqfw-hover" title="Zoom In" aria-label="Zoom In">
    <?php echo Helper::get_icon( 'bs-search-plus' ); ?>
</button>