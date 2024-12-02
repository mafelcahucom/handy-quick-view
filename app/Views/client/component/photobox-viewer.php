<?php
/**
 * App > Views > Client > Component > Photobox Viewer.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

defined( 'ABSPATH' ) || exit;
?>

<div id="hqfw-js-photobox-viewer" class="hqfw hqfw-photobox-viewer" data-state="hide">
    <div class="hqfw-photobox-viewer__overlay">
        <div class="hqfw-photobox-viewer__content">
            <div class="hqfw-photobox-viewer__head">
                <div class="hqfw-flex hqfw-flex-ai-c hqfw-flex-jc-ed">
                    <button id="hqfw-js-photobox-fullscreen-btn" class="hqfw-photobox-viewer__controller-btn" data-event="show" title="<?php echo __( 'Fullscreen', 'handy-quick-view' ); ?>" aria-label="<?php echo __( 'Fullscreen', 'handy-quick-view' ); ?>"></button>
                    <button id ="hqfw-js-photobox-close-btn" class="hqfw-photobox-viewer__controller-btn" title="<?php echo __( 'Close (ESC)', 'handy-quick-view' ); ?>" aria-label="<?php echo __( 'Close (ESC)', 'handy-quick-view' ); ?>"></button>
                </div>
            </div>
            <div class="hqfw-photobox-viewer__body hqfw-flex-c">
                <div class="hqfw-photobox-viewer__container">
                    <img id="hqfw-js-photobox-viewer-image" src="">
                </div>
            </div>
            <div class="hqfw-photobox-viewer__footer hqfw-flex-c">
                <span id="hqfw-js-photobox-viewer-caption"></span>
            </div>
        </div>
    </div>
</div>
