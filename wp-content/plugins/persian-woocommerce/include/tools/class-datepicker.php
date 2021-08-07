<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'PW_Tools_DatePicker' ) ) :

	class PW_Tools_DatePicker {

		const SCREENS = [
			'product'                 => 'product',
			'shop_order'              => 'shop_order',
			'shop_coupon'             => 'shop_coupon',
			'ووکامرس_page_wc-reports' => 'report'
		];

		public function __construct() {

			if ( PW()->get_options( 'enable_jalali_datepicker' ) == 'yes' ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'datepicker' ), 1000 );
				add_action( 'admin_print_footer_scripts', array( $this, 'inline_js' ) );
			}

		}

		public function datepicker() {

			if ( isset( self::SCREENS[ urldecode( get_current_screen()->id ) ] ) ) {
				wp_enqueue_style( 'pw-datepicker-css', PW()->plugin_url( 'assets/css/persian-datepicker.css' ) );
				wp_enqueue_script( 'pw-datepicker-js', PW()->plugin_url( 'assets/js/persian-datepicker.min.js' ) );
			}
		}

		public function inline_js() {

			$screen = get_current_screen()->id;

			if ( ! isset( self::SCREENS[ urldecode( $screen ) ] ) ) {
				return true;
			}

			$method_name = "inline_js_" . self::SCREENS[ urldecode( $screen ) ];

			?>
            <style type="text/css">
                #ui-datepicker-div {
                    display: none !important;
                }
            </style>
			<?php

			$this->{$method_name}();
		}

		public function inline_js_product() {
			?>
            <script type="text/javascript">
				jQuery(function ( $ ) {

					let _sale_price_dates_from = $("#_sale_price_dates_from").val();

					$("#_sale_price_dates_from").persianDatepicker({
						formatDate: "YYYY-0M-0D",
						selectedBefore: _sale_price_dates_from.length ? 1 : 0,
						selectedDate: _sale_price_dates_from.length ? _sale_price_dates_from.replace(/-/gi, "/") : null
					});

					let _sale_price_dates_to = $("#_sale_price_dates_to").val();

					$("#_sale_price_dates_to").persianDatepicker({
						formatDate: "YYYY-0M-0D",
						selectedBefore: _sale_price_dates_to.length ? 1 : 0,
						selectedDate: _sale_price_dates_to.length ? _sale_price_dates_to.replace(/-/gi, "/") : null
					});

					$("div.woocommerce_variations").on("click", "a.sale_schedule", function () {
						let el_to = $(this).parent().parent().next().find("input[name*=to]");

						let el_date_to = el_to.val();

						el_to.persianDatepicker({
							formatDate: "YYYY-0M-0D",
							selectedBefore: el_date_to.length ? 1 : 0,
							selectedDate: el_date_to.length ? el_date_to.replace(/-/gi, "/") : null
						});

						let el_from = $(this).parent().parent().next().find("input[name*=from]");

						let el_date_from = el_from.val();

						el_from.persianDatepicker({
							formatDate: "YYYY-0M-0D",
							selectedBefore: el_date_from.length ? 1 : 0,
							selectedDate: el_date_from.length ? el_date_from.replace(/-/gi, "/") : null
						});

					});

				});
            </script>
			<?php
		}

		public function inline_js_shop_order() {
			?>
            <script type="text/javascript">
				jQuery(function ( $ ) {

					let order_date = $("input[name=order_date]").val();

					$("input[name=order_date]").persianDatepicker({
						formatDate: "YYYY-0M-0D",
						selectedBefore: 1,
						selectedDate: order_date.length ? order_date.replace(/-/gi, "/") : null
					});

				});
            </script>
			<?php
		}

		public function inline_js_shop_coupon() {

			$coupon = new WC_Coupon( intval( $_GET['post'] ) );

			$expiry_date = $coupon->get_date_expires( 'edit' ) ? $coupon->get_date_expires( 'edit' )->date_i18n( 'Y/m/d' ) : '';

			?>
            <script type="text/javascript">
				jQuery(function ( $ ) {

					$("input[name=expiry_date]").val('<?php echo $expiry_date; ?>');
					let expiry_date = $("input[name=expiry_date]").val();

					$("input[name=expiry_date]").persianDatepicker({
						formatDate: "YYYY-0M-0D",
						selectedBefore: 1,
						selectedDate: expiry_date.length ? expiry_date.replace(/-/gi, "/") : null
					});

				});
            </script>
			<?php
		}

		public function inline_js_report() {
			?>
            <script type="text/javascript">
				jQuery(function ( $ ) {

					$("input[name=start_date]").persianDatepicker({
						formatDate: "YYYY-0M-0D",
						showGregorianDate: 1,
					});

					$("input[name=end_date]").persianDatepicker({
						formatDate: "YYYY-0M-0D",
						showGregorianDate: 1,
					});

				});
            </script>
			<?php
		}
	}

endif;

PW()->tools->datepicker = new PW_Tools_DatePicker();
