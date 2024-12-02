<?php
/**
 * App > Views > Admin > Component > Prompt Dialog.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

use HQFW\Admin\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<div id="hd-prompt-dialog" class="hd-pop-up" data-state="default">
    <div class="hd-modal__card hd-modal__card--sm hd-bg-white-1 hd-br-default hd-shadow-2">
        <div class="hd-modal__head hd-p-15 hd-line-bottom">
            <div class="hd-flex hd-flex-jc-sb hd-flex-ai-c hd-gap-10">
                <span id="hd-prompt-dialog-title" class="hd-fs-14 hd-fw-600">
                    <?php echo __( 'Title', 'handy-quick-view' ); ?>
                </span>
                <button id="hd-prompt-dialog-close-btn" class="hd-btn-icon hd-btn-icon--circle" title="<?php echo __( 'Close Prompt', 'handy-quick-view' ); ?>" aria-label="<?php echo __( 'Close Prompt', 'handy-quick-view' ); ?>">
                    <?php echo Helper::get_icon( 'close', 'hd-svg' ); ?>
                </button>
            </div>
        </div>
        <div class="hd-modal__body hd-p-15">
            <p id="hd-prompt-dialog-message">
                <?php echo __( 'Message', 'handy-quick-view' ); ?>
            </p>
        </div>
        <div class="hd-modal__footer hd-p-15">
            <div class="hd-flex hd-flex-jc-fe hd-gap-10">
                <button type="button" id="hd-prompt-dialog-no-btn" class="hd-btn hd-btn--default hd-btn--fit">
                    <?php echo __( 'No', 'handy-quick-view' ); ?>
                </button>
                <button type="button" id="hd-prompt-dialog-yes-btn" class="hd-btn hd-btn--fit">
                    <?php echo __( 'Yes', 'handy-quick-view' ); ?>
                </button>
            </div>
        </div>
    </div>
</div>
