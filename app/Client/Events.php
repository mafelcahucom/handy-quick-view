<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Inc\Traits\Security;
use HQFW\Client\Inc\Content;
use HQFW\Client\Inc\Helper;

/**
 * Events.
 *
 * @since 	1.0.0
 * @version 1.0.0
 * @author  Mafel John Cahucom
 */
final class Events {

	/**
	 * Inherit Singleton.
	 */
	use Singleton;

	/**
	 * Inherit Security.
	 */
	use Security;

	/**
	 * Register all ajax action classes.
	 *
	 * @since 1.0.0
	 *
	 * @return void.
	 */
	protected function __construct() {
		// Get product content.
		add_action( 'wp_ajax_hqfw_get_product_content', [ $this, 'get_product_content' ] );
		add_action( 'wp_ajax_nopriv_hqfw_get_product_content', [ $this, 'get_product_content' ] );

	}

	/**
	 * Return the product content for quick view.
	 *
	 * @since 1.0.0
	 * 
	 * @return json
	 */
	public function get_product_content() {
		if ( ! self::is_security_passed( $_POST ) ) {
			wp_send_json_error([
				'error' => 'SECURITY_ERROR'
			]);
		}

		if ( self::has_post_empty_data( $_POST, [ 'productId' ] ) ) {
            wp_send_json_error([
                'error' => 'MISSING_DATA_ERROR'
            ]);
        }

       	$productId = absint( sanitize_text_field( $_POST['productId'] ) );
       	$product = wc_get_product( $productId );
       	if ( ! $product ) {
       		wp_send_json_success([
       			'response' => 'PRODUCT_ID_NOT_FOUND',
       		]);
      	}

      	$query = new \WP_Query([
      		'p'				 => $productId,
      		'post_type' 	 => 'product',
      		'post_status' 	 => 'publish',
      		'posts_per_page' => 1,
      	]);

      	if ( $query->have_posts() ) {
      		while ( $query->have_posts() ) {
      			$query->the_post();

      			// Generate product content.
      			Content::generate();

      			wp_send_json_success([
      				'response' => 'SUCCESSFULLY_RETRIEVED',
      				'content'  => Helper::render_view( 'component/product-content' )
      			]);
      		}
      		wp_reset_postdata();
      	}
	}
}