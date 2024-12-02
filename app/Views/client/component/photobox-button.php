<?php
/**
 * App > Views > Client > Component > Photobox Button.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<button id="hqfw-js-photobox-trigger-btn" class="hqfw-photobox__trigger-btn hqfw-hover" title="<?php echo __( 'Zoom In', 'handy-quick-view' ); ?>" aria-label="<?php echo __( 'Zoom In', 'handy-quick-view' ); ?>">
    <?php echo Helper::get_icon( 'bs-search-plus' ); ?>
</button>
