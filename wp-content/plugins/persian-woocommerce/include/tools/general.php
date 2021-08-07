<?php

if ( PW()->get_options( 'fix_load_states' ) != 'no' ) {
	add_action( 'wp_footer', 'pw_checkout_state_dropdown_fix', 50 );
}

function pw_checkout_state_dropdown_fix() {

	if ( function_exists( 'is_checkout' ) && ! is_checkout() ) {
		return false;
	}

	?>
    <script>
		jQuery(function () {
			// Snippets.ir
			jQuery('#billing_country').trigger('change');
			jQuery('#billing_state_field').removeClass('woocommerce-invalid');
		});
    </script>
	<?php
}

if ( is_admin() && PW()->get_options( 'fix_orders_list' ) != 'no' ) {
	add_filter( 'pre_get_posts', 'pw_sort_orders_list_by_pay_date' );
}

function pw_sort_orders_list_by_pay_date( $query ) {

	if ( ! function_exists( 'get_current_screen' ) ) {
		return $query;
	}

	$screen = get_current_screen();

	if ( is_null( $screen ) || $screen->id != 'edit-shop_order' ) {
		return $query;
	}

	$query->set( 'order', 'DESC' );
	$query->set( 'meta_key', '_date_paid' );
	$query->set( 'orderby', 'meta_value' );

	return $query;
}

if ( ! function_exists( 'pw_convert_number' ) ) {

	function pw_convert_number( $num ) {
		return str_replace( array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ), range( 0, 9 ), $num );
	}

}

if ( PW()->get_options( 'fix_postcode_persian_number' ) != 'no' ) {
	add_filter( 'woocommerce_checkout_process', 'pw_checkout_process_postcode', 20, 1 );
}

function pw_checkout_process_postcode() {

	if ( isset( $_POST['billing_postcode'] ) ) {
		$_POST['billing_postcode'] = pw_convert_number( $_POST['billing_postcode'] );
	}

	if ( isset( $_POST['shipping_postcode'] ) ) {
		$_POST['shipping_postcode'] = pw_convert_number( $_POST['shipping_postcode'] );
	}

}

if ( PW()->get_options( 'postcode_validation' ) != 'no' ) {
	add_filter( 'woocommerce_validate_postcode', 'pw_validate_postcode', 10, 3 );
}

function pw_validate_postcode( $valid, $postcode, $country ) {

	if ( $country != 'IR' ) {
		return $valid;
	}

	return (bool) preg_match( '/^([0-9]{10})$/', $postcode );
}

if ( PW()->get_options( 'fix_phone_persian_number' ) != 'no' ) {
	add_filter( 'woocommerce_checkout_process', 'pw_checkout_process_phone', 20, 1 );
}

function pw_checkout_process_phone() {

	if ( isset( $_POST['billing_phone'] ) ) {
		$_POST['billing_phone'] = pw_convert_number( $_POST['billing_phone'] );
	}

	if ( isset( $_POST['shipping_phone'] ) ) {
		$_POST['shipping_phone'] = pw_convert_number( $_POST['shipping_phone'] );
	}

}

if ( PW()->get_options( 'phone_validation' ) != 'no' ) {
	add_action( 'woocommerce_after_checkout_validation', 'pw_validate_phone', 10, 3 );
}

function pw_validate_phone( $data, $errors ) {

	if ( (bool) preg_match( '/^(09[0-9]{9})$/', $data['billing_phone'] ) ) {
		return false;
	}

	$errors->add( 'validation', '<b>تلفن همراه</b> وارد شده، معتبر نمی باشد.' );
}
