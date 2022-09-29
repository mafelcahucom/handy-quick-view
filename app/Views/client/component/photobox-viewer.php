<?php
/**
 * Views > Client > Component > Photobox Viewer.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<div id="hqfw-js-photobox-viewer" class="hqfw hqfw-photobox-viewer" data-state="hide">
    <div class="hqfw-photobox-viewer__overlay">
        <div class="hqfw-photobox-viewer__content">
            <div class="hqfw-photobox-viewer__head">
                <div class="hqfw-flex hqfw-flex-ai-c hqfw-flex-jc-ed">
                    <button id="hqfw-js-photobox-fullscreen-btn" class="hqfw-photobox-viewer__controller-btn hqfw-hover hqfw-flex-c" data-event="show" title="Fullscreen" aria-label="Fullscreen">
                        <?php echo Helper::get_icon( 'bs-fullscreen', 'hqfw-fullscreen' ); ?>
                        <?php echo Helper::get_icon( 'bs-fullscreen-exit', 'hqfw-fullscreen-exit' ) ?>
                    </button>
                    <button id ="hqfw-js-photobox-close-btn" class="hqfw-photobox-viewer__controller-btn hqfw-hover hqfw-flex-c" title="Close (Esc)" aria-label="Close (Esc)">
                        <?php echo Helper::get_icon( 'bs-close' ); ?>
                    </button>
                </div>
            </div>
            <div class="hqfw-photobox-viewer__body hqfw-flex-c">
                <div class="hqfw-photobox-viewer__container">
                    <img id="hqfw-js-photobox-viewer-image" src="http://localhost/shop/wp-content/uploads/2022/08/brooke-cagle-EyCEX1e9EiY-unsplash-scaled.jpg">
                </div>
            </div>
            <div class="hqfw-photobox-viewer__footer hqfw-flex-c">
                <span id="hqfw-js-photobox-viewer-caption"></span>
            </div>
        </div>
    </div>
</div>