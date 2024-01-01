<?php
namespace HQFW\Client;

use HQFW\Inc\Traits\Singleton;
use HQFW\Inc\Traits\Security;
use HQFW\Inc\Plugins;
use HQFW\Client\Inc\Helper;
use HQFW\Client\Inc\Lib\Content;

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
	 * 
	 * @since 1.0.0
	 */
	use Singleton;

	/**
	 * Inherit Security.
	 * 
	 * @since 1.0.0
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
       	$product   = wc_get_product( $productId );
       	if ( ! $product ) {
       		wp_send_json_success([
       			'response' => 'PRODUCT_ID_NOT_FOUND',
       		]);
      	}

      	// Apply filter if hady-add-to-cart-for-woocommerce is active.
      	if ( Plugins::is_active( 'handy-add-to-cart-for-woocommerce' ) ) {
      		if ( $product->is_type( 'grouped' ) ) {
      			// Additional class to quantity_input.
	            add_filter( 'woocommerce_quantity_input_classes', function( $classes, $product ) {
	                $classes['additional'] = 'hafw-js-grouped-quantity-input';
	                return $classes;
	            }, 10, 2 );
	        }
      	}

      	// Query post based on product id.
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