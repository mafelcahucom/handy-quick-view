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

$settings = get_option( '_hqfw_main_settings' ); 
?>

<div id="hqfw-js-modal" class="hqfw-modal hqfw" data-state="hide">
	<div class="hqfw-js-close-modal hqfw-modal__overlay hqfw-flex hqfw-flex-ai-c">
		<div class="hqfw-js-close-modal hqfw-viewer hqfw-flex hqfw-flex-ai-c">
			<?php if ( $settings['gn_md_enable_slider'] ): ?>
				<div class="hqfw-viewer__navigation">
					<button type="button" class="hqfw-js-navigation-btn hqfw-navigation-btn hqfw-flex-c hqfw-hover" data-product_id="0" data-event="prev" data-state="disabled" title="<?php echo __( 'Previous', HQFW_PLUGIN_DOMAIN ); ?>" aria-label="<?php echo __( 'Previous', HQFW_PLUGIN_DOMAIN ); ?>">
						<?php
							if ( ! empty( $settings['md_sldr_btn_icon_prev'] ) ) {
								echo Helper::get_icon( $settings['md_sldr_btn_icon_prev'] );
							}
						?>
					</button>
				</div>
			<?php endif; ?>
			<div id="hqfw-js-viewer-content" class="hqfw-js-close-modal hqfw-viewer__content hqfw-flex hqfw-flex-jc-c" data-state="loading">
				<div class="hqfw-viewer__loader"></div>
				<div id="hqfw-js-viewer-product" class="hqfw-viewer__product">
					<!-- content will be injected -->
				</div>
			</div>
			<?php if ( $settings['gn_md_enable_slider'] ): ?>
				<div class="hqfw-viewer__navigation">
					<button type="button" class="hqfw-js-navigation-btn hqfw-navigation-btn hqfw-flex-c hqfw-hover" data-product_id="0" data-event="next" data-state="disabled" title="<?php echo __( 'Next', HQFW_PLUGIN_DOMAIN ); ?>" aria-label="<?php echo __( 'Next', HQFW_PLUGIN_DOMAIN ); ?>">
						<?php
							if ( ! empty( $settings['md_sldr_btn_icon_next'] ) ) {
								echo Helper::get_icon( $settings['md_sldr_btn_icon_next'] );
							}
						?>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>