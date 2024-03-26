<?php
/**
 * Admin Footer Template.
 *
 * @since   1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom 
 */

use HQFW\Admin\Inc\Helper;

defined( 'ABSPATH' ) || exit; 
?>

        <!-- end: footer -->
        <div class="hd-footer">
            <p>
                <span>
                    <?php echo __( 'Handcrafted by', HQFW_PLUGIN_DOMAIN ); ?>
                </span>
                <a class="hd-fw-600" href="#" target="_blank">
                    <?php echo __( 'Mafel John Cahucom', HQFW_PLUGIN_DOMAIN ); ?>
                </a>
            </p>
            <div class="hd-sitemap">
                <a href="#" target="_blank">
                    <?php echo __( 'Documentation', HQFW_PLUGIN_DOMAIN ); ?>
                </a>
                <span class="hd-sitemap__separator">/</span>
                <a href="#" target="_blank">
                    <?php echo __( 'Plugins', HQFW_PLUGIN_DOMAIN ); ?>
                </a>
                <span class="hd-sitemap__separator">/</span>
                <a href="#" target="_blank">
                    <?php echo __( 'Developer', HQFW_PLUGIN_DOMAIN ); ?>
                </a>
            </div>
            <ul class="hd-social-media">
                <li>
                    <a href="#" target="_blank">
                        <?php echo Helper::get_icon( 'facebook', 'hd-svg' ); ?>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <?php echo Helper::get_icon( 'github', 'hd-svg' ); ?>
                    </a>
                </li>
                <li>
                    <a href="#" target="_blank">
                        <?php echo Helper::get_icon( 'browser', 'hd-svg' ); ?>
                    </a>
                </li>
            </ul>
        </div>
        <!-- end: footer -->

        </div>
    </div>
</main>