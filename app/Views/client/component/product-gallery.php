<?php
/**
 * Views > Client > Component > Product Gallery.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */

use HQFW\Client\Inc\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * $args = [
 *     'images'  => (object) Containing the product images.
 * ]
 */

if ( empty( $args['images'] ) ) {
    return;
}

$total_images = count( $args['images'] );
?>

<div id="hqfw-js-photo-slider" class="hqfw-photo-slider" data-current-slide="0">
    <div class="hqfw-photo-slider__container">
        <?php foreach ( $args['images'] as $key => $value ): ?>
            <?php
                $image_class = ( $key === 0 ? 'hqfw-photo-slider__image-primary' : 'hqfw-photo-slider__image-primary' );
                $zoom_class  = Helper::get_zoom_class( $value['image'][1], $value['image'][2] );
                $zoom_class  = ( 1 === 1 ? $zoom_class : '' );
            ?>
            <div class="hqfw-photo-slider__slide <?php echo esc_attr( $zoom_class ); ?>">
                <img src="<?php echo esc_url( $value['image'][0] ); ?>" class="<?php echo esc_attr( $image_class ); ?>" width="<?php echo esc_attr( $value['image'][1] ); ?>" height="<?php echo esc_attr( $value['image'][2] ); ?>" alt="<?php echo esc_attr( $value['title'] ); ?>" role="presentation">
            </div>
        <?php endforeach; ?>
    </div>

    <?php if ( $total_images > 1 ): ?>
        <button class="hqfw-js-photo-slider-controller hqfw-photo-slider__controller hqfw-flex-c hqfw-hover" data-slider="hqfw-js-photo-slider" data-event="prev" aria-label="Previous">
            <?php echo Helper::get_icon( 'bs-chevron-left' ); ?>
        </button>
        <button class="hqfw-js-photo-slider-controller hqfw-photo-slider__controller hqfw-flex-c hqfw-hover" data-slider="hqfw-js-photo-slider" data-event="next" aria-label="Next">
            <?php echo Helper::get_icon( 'bs-chevron-right' ); ?>
        </button>
    <?php endif; ?>

    <?php if ( $total_images > 1 ): ?>
        <ul class="hqfw-photo-slider__bullet hqfw-flex hqfw-flex-jc-c">
            <?php foreach ( $args['images'] as $key => $value ): ?>
                <?php
                    $state = ( $key === 0 ? 'active' : 'default' );
                    $label = $key .' of '. $total_images;
                ?>
                <li>
                    <button class="hqfw-js-photo-slider-shortcut hqfw-hover" data-slider="hqfw-js-photo-slider" data-slide="<?php echo esc_attr( $key ); ?>" data-state="<?php echo esc_attr( $state ); ?>" aria-label="<?php echo esc_attr( $label ); ?>"></button>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
<?php if ( $total_images > 1 ): ?>
    <ul class="hqfw-photo-slider__collection hqfw-flex hqfw-flex-jc-sb">
        <?php foreach ( $args['images'] as $key => $value ): ?>
            <?php
                $state = ( $key === 0 ? 'active' : 'default' );
                $label = $key .' of '. $total_images;
            ?>
            <li class="hqfw-flex-c">
                <img src="<?php echo esc_url( $value['image'][0] ); ?>" class="hqfw-js-photo-slider-shortcut hqfw-hover" data-slider="hqfw-js-photo-slider" data-slide="<?php echo esc_attr( $key ); ?>" data-state="<?php echo esc_attr( $state ); ?>" aria-label="<?php echo esc_attr( $label ); ?>">
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>