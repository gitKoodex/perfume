<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'PW_Tools_Checkout' ) ) :

	class PW_Tools_Checkout {

		public function __construct() {

			if ( PW()->get_options( 'remove_extra_field_physical' ) == 'yes' ) {
				add_filter( 'woocommerce_checkout_fields', array( $this, 'remove_extra_field_physical' ) );
			}
			
		}

		public function remove_extra_field_physical( $fields ) {

			$has_physical_product = false;

			if ( ! empty( WC()->cart->cart_contents ) ) {

				$cart = WC()->cart->get_cart();

				foreach ( $cart as $key => $values ) {

					/** @var WC_Product $_product */
					$_product = wc_get_product( $values['variation_id'] ? $values['variation_id'] : $values['product_id'] );

					if ( ! empty( $_product ) && $_product->exists() && $values['quantity'] > 0 ) {
						if ( $_product->virtual == 'no' && $_product->downloadable == 'no' ) {
							$has_physical_product = true;
							break;
						}
					}
				}
			}

			if ( ! $has_physical_product ) {
				unset( $fields['billing']['billing_address_1'] );
				unset( $fields['billing']['billing_address_2'] );
				unset( $fields['billing']['billing_company'] );
				unset( $fields['billing']['billing_city'] );
				unset( $fields['billing']['billing_postcode'] );
				unset( $fields['billing']['billing_country'] );
				unset( $fields['billing']['billing_state'] );
				add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
			}

			return $fields;
		}

	}

endif;

PW()->tools->checkout = new PW_Tools_Checkout();
