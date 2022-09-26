<?php
/**
 * Views > Client > Component > Modal.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;
?>

<div id="hqfw-js-modal" class="hqfw-modal hqfw" data-state="hide">
	<div class="hqfw-js-close-modal hqfw-modal__overlay hqfw-flex hqfw-flex-ai-c">
		<div class="hqfw-viewer hqfw-flex hqfw-flex-ai-c">
			<div class="hqfw-viewer__navigation">
				<button type="button" class="hqfw-js-navigation-btn hqfw-navigation-btn hqfw-flex-c hqfw-hover" data-product_id="0" data-event="prev" data-state="default" aria-label="Previous" title="Previous">
					<?php echo Helper::get_icon( 'bs-chevron-left' ); ?>
				</button>
			</div>
			<div id="hqfw-js-viewer-content" class="hqfw-viewer__content hqfw-flex hqfw-flex-jc-c" data-state="loading">
				<div class="hqfw-viewer__loader"></div>
				<div id="hqfw-js-viewer-product" class="hqfw-viewer__product">
					<!-- content will be injected -->
				</div>
			</div>
			<div class="hqfw-viewer__navigation">
				<button type="button" class="hqfw-js-navigation-btn hqfw-navigation-btn hqfw-flex-c hqfw-hover" data-product_id="0" data-event="next" data-state="default" aria-label="Next" title="Next">
					<?php echo Helper::get_icon( 'bs-chevron-right' ); ?>
				</button>
			</div>
		</div>
	</div>
</div>