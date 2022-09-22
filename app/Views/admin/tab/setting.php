<?php
/**
 * Views > Admin > Tab > Setting.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom 
 */

use HQFW\Admin\Inc\Helper;
use HQFW\Admin\Inc\Component;
use HQFW\Admin\Inc\Field;

defined( 'ABSPATH' ) || exit;

$settings = get_option( '_hqfw_main_settings' );

/**
 * Header
 */
echo Component::get_header( $args['page_title'] ); ?>

<div class="hd-container">

</div>

<?php 
    /**
     * Footer.
     */
    echo Component::get_footer(); 
?>