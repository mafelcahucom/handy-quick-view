<?php
/**
 * App > Admin > Modules > Setting > Setting.
 *
 * @since   1.0.0
 *
 * @version 1.0.0
 * @author  Mafel John Cahucom
 * @package handy-quick-view
 */

namespace HQFW\Admin\Modules\Setting;

use HQFW\Inc\Traits\Singleton;
use HQFW\Inc\Traits\Instantiator;
use HQFW\Admin\Inc\Helper;
use HQFW\Admin\Modules\Setting\Events;

defined( 'ABSPATH' ) || exit;

/**
 * The `Setting` class modules contains the all
 * services of admin settng page.
 *
 * @since 1.0.0
 */
final class Setting {

	/**
	 * Inherit Singleton.
     *
     * @since 1.0.0
	 */
	use Singleton;

    /**
     * Inherit Instantiator.
     *
     * @since 1.0.0
     */
    use Instantiator;

    /**
     * Instantiate.
     *
     * @since 1.0.0
     */
    protected function __construct() {
        /**
         * Instantiate or load services.
         */
        self::instantiate(array(
            Events::class,
        ));
    }

    /**
     * Render the setting tab content.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public static function render_tab_content() {
        echo Helper::render_view( 'tab/setting' );
    }
}
