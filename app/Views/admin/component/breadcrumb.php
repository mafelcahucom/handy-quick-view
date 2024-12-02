<?php
/**
 * App > Views > Admin > Component > Breadcrumb.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

use HQFW\Admin\Inc\Helper;

defined( 'ABSPATH' ) || exit;

$tab   = ( isset( $_GET['tab'] ) && ! empty( $_GET['tab'] ) ? $_GET['tab'] : 'setting' );
$tabs  = array(
    'setting'       => __( 'Setting', 'handy-quick-view' ),
    'import-export' => __( 'Import & Export', 'handy-quick-view' ),
);
$title = ( isset( $tabs[ $tab ] ) ? $tabs[ $tab ] : __( 'Setting', 'handy-quick-view' ) );
?>

<ul class="hd-breadcrumb">
    <li class="hd-breadcrumb__item" data-type="home">
        <?php echo Helper::get_icon( 'house', 'hd-house' ); ?>
    </li>
    <li class="hd-breadcrumb__item" data-type="page">
        <?php echo esc_html( $title ); ?>
    </li>
    <?php if ( $title === 'Setting' ) : ?>
        <li class="hd-breadcrumb__item" data-type="tab">
            <?php echo __( 'General', 'handy-quick-view' ); ?>
        </li>
    <?php endif; ?>
</ul>
