<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Persian_Woocommerce_Core' ) ) :

	class Persian_Woocommerce_Core {

		protected $options;

		// sub classes
		public $tools, $widget, $translate, $currencies, $address, $gateways;

		protected static $_instance = null;

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function __construct() {

			$this->activated_plugin();

			$this->options = get_option( 'PW_Options' );

			//add_filter( 'woocommerce_show_addons_page', '__return_false', 100 );
			add_action( 'admin_menu', [ $this, 'admin_menus' ], 59 );
			add_action( 'admin_head', [ $this, 'admin_head' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
			add_action( 'admin_notices', [ $this, 'notices_render' ] );
			add_action( 'wp_ajax_pw_notice_dismiss', [ $this, 'notices_dismiss' ] );
			add_action( 'plugins_loaded', [ $this, 'plugins_loaded' ], 10 );
		}

		public function plugins_loaded() {
			require_once( 'class-gateways.php' );
		}

		public function admin_menus() {

			add_menu_page( 'ووکامرس فارسی', 'ووکامرس فارسی', 'manage_options', 'persian-wc', array(
				$this->translate,
				'translate_page'
			), $this->plugin_url( 'assets/images/logo.png' ), '55.6' );

			add_submenu_page( 'persian-wc', 'حلقه های ترجمه', 'حلقه های ترجمه', 'manage_options', 'persian-wc', array(
				$this->translate,
				'translate_page'
			) );

			add_submenu_page( 'persian-wc', 'ابزار ها', 'ابزار ها', 'manage_options', 'persian-wc-tools', array(
				$this->tools,
				'tools_page'
			) );

			do_action( "PW_Menu" );

			add_submenu_page( 'persian-wc', 'افزونه ها', 'افزونه ها', 'manage_woocommerce', 'persian-wc-plugins', array(
				$this,
				'plugins_page'
			) );

			add_submenu_page( 'persian-wc', 'پوسته ها', 'پوسته ها', 'manage_woocommerce', 'persian-wc-themes', array(
				$this,
				'themes_page'
			) );

			add_submenu_page( 'persian-wc', 'پیشخوان پست تاپین', 'پیشخوان پست تاپین', 'manage_woocommerce', 'https://yun.ir/pwtm' );

			add_submenu_page( 'woocommerce', 'افزونه های پارسی', 'افزونه های پارسی', 'manage_woocommerce', 'wc-persian-plugins', array(
				$this,
				'plugins_page'
			) );

			add_submenu_page( 'woocommerce', 'پوسته های پارسی', 'پوسته های پارسی', 'manage_woocommerce', 'wc-persian-themes', array(
				$this,
				'themes_page'
			) );

			add_submenu_page( 'persian-wc', 'درباره ما', 'درباره ما', 'manage_options', 'persian-wc-about', array(
				$this,
				'about_page'
			) );
		}

		public function admin_head() {
			?>
            <script type="text/javascript">
				jQuery(document).ready(function ( $ ) {
					$("ul#adminmenu a[href$='https://yun.ir/pwtm']").attr('target', '_blank');
				});
            </script>
			<?php
		}

		public function themes_page() {
			wp_enqueue_style( 'woocommerce_admin_styles' );
			include( 'view/html-admin-page-themes.php' );
		}

		public function plugins_page() {
			wp_enqueue_style( 'woocommerce_admin_styles' );
			include( 'view/html-admin-page-plugins.php' );
		}

		public function about_page() {
			include( 'view/html-admin-page-about.php' );
		}

		public function activated_plugin() {
			global $wpdb;

			if ( ! file_exists( PW_DIR . '/.activated' ) ) {
				return false;
			}

			$woocommerce_ir_sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}woocommerce_ir` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`text1` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
			`text2` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
			PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $woocommerce_ir_sql );

			//delete deprecated tables-----------------------------
			$deprecated_tables = [
				'woocommerce_ir_cities',
				'Woo_Iran_Cities_By_HANNANStd',
			];

			foreach ( $deprecated_tables as $deprecated_table ) {
				$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}{$deprecated_table}" );
			}

			//delete deprecated Options-----------------------------
			$deprecated_options = array(
				'is_cities_installed',
				'pw_delete_city_table_2_5',
				'woocommerce_persian_feed',
				'redirect_to_woo_persian_about_page',
				'enable_woocommerce_notice_dismissed',
				'Persian_Woocommerce_rename_old_table',
			);

			foreach ( $deprecated_options as $deprecated_option ) {
				delete_option( $deprecated_option );
			}

			for ( $i = 0; $i < 10; $i ++ ) {
				delete_option( 'persian_woo_notice_number_' . $i );
			}

			unlink( PW_DIR . '/.activated' );

			if ( ! headers_sent() ) {
				wp_redirect( admin_url( 'admin.php?page=persian-wc-about' ) );
				die();
			}
		}

		public function enqueue_scripts() {
			$pages = [
				'persian-wc-about',
				'persian-wc-plugins',
				'wc-persian-plugins',
				'persian-wc-themes',
				'wc-persian-themes',
			];

			if ( ! empty( $_GET['page'] ) && in_array( $_GET['page'], $pages ) ) {
				wp_register_style( 'pw-admin-fonts', $this->plugin_url( 'assets/css/admin.font.css' ) );
				wp_enqueue_style( 'pw-admin-fonts' );
			}
		}

		public function plugin_url( $path = null ) {
			return untrailingslashit( plugins_url( is_null( $path ) ? '/' : $path, PW_FILE ) );
		}

		public function get_options( $option_name = null, $default = false ) {

			if ( is_null( $option_name ) ) {
				return $this->options;
			}

			$default_options = array();

			if ( ! empty( $this->tools ) && method_exists( $this->tools, 'get_tools_default' ) ) {
				$default_options = $this->tools->get_tools_default();
			}

			if ( isset( $this->options[ $option_name ] ) ) {
				return $this->options[ $option_name ];
			} elseif ( isset( $default_options["PW_Options[$option_name]"] ) ) {
				return $default_options["PW_Options[$option_name]"];
			} else {
				return $default;
			}
		}

		public function notices_render() {
			$notices = array();
			$this->notices_texts( $notices );
			$dismissed = (array) get_option( 'persian_woocommerce_dismissed_notices' );

			foreach ( $notices as $id => $notice ) {
				if ( count( $notice ) == 3 && ! $notice[2] ) {
					continue;
				}
				if ( ! in_array( $id, $dismissed ) ) {
					printf( '<div class="notice persian_woocommerce_notice notice-%2$s is-dismissible" id="persian_woocommerce_%1$s"><p>%3$s</p></div>', $id, $notice[0], $notice[1] );
					break;
				}
			}
			?>
            <script type="text/javascript">
				jQuery(document).ready(function ( $ ) {
					$(document.body).on('click', '.notice-dismiss', function () {
						var notice = $(this).closest('.persian_woocommerce_notice');
						notice = notice.attr('id');
						if( notice.indexOf('persian_woocommerce_') !== -1 ) {
							notice = notice.replace('persian_woocommerce_', '');
							$.ajax({
								url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
								type: "post",
								data: {
									notice: notice,
									action: 'pw_notice_dismiss',
									security: "<?php echo wp_create_nonce( 'pw_notice_dismiss' ); ?>"
								},
								success: function ( response ) {
								}
							});
						}
						return false;
					});
				});
            </script>
			<?php
		}

		public function notices_dismiss() {

			check_ajax_referer( 'pw_notice_dismiss', 'security' );

			if ( ! empty( $_POST['notice'] ) ) {
				$dismissed   = (array) get_option( 'persian_woocommerce_dismissed_notices' );
				$dismissed[] = $_POST['notice'];
				update_option( 'persian_woocommerce_dismissed_notices', array_unique( $dismissed ) );
			}
			die();
		}

		private function notices_texts( &$notices ) {
			global $pagenow;

			$post_type = $_GET['post_type'] ?? null;
			$page      = $_GET['page'] ?? null;
			$tab       = $_GET['tab'] ?? null;

			$notices['tapin-orders'] = [
				'success',
				'<b>با افزونه حمل و نقل ووکامرس فارسی یک دفتر پستی اختصاصی داشته باش و بدون مراجعه به پست همه سفارشاتتو ارسال کن.</b>
<ul>
<li>- تولید فاکتور پست همراه با بارکد پستی به صورت آنلاین</li>
<li>- جمع آوری مرسولات از محل شما توسط ماموران پست</li>
<li>- ارسال کد رهگیری پستی برای مشتریان به صورت پیامکی</li>
<li>- بروزرسانی خودکار آخرین وضعیت مرسوله در پنل ووکامرس</li>
</ul>
<a href="https://yun.ir/pwto" target="_blank">
    <input type="button" class="button button-primary" value="اطلاعات بیشتر">
</a>
<a href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=persian-woocommerce-shipping' ) . '" target="_blank">
    <input type="button" class="button" value="نصب افزونه پیشخوان پست">
</a>',
				$pagenow == 'edit.php' && $post_type == 'shop_order'
			];

			$notices['tapin-shipping'] = [
				'success',
				'<b>با افزونه حمل و نقل ووکامرس فارسی به رایگان هزینه پست سفارشی و پیشتاز رو بصورت دقیق و طبق آخرین تعرفه پست محاسبه کنید و سرویس پرداخت در محل رو در سراسر کشور فعال کنید.</b>
<ul>
<li>- محاسبه دقیق هزینه ارسال بر اساس وزن و شهر خریدار</li>
<li>- امکان تخفیف در هزینه ارسال بر اساس میزان خرید</li>
<li>- صدور آنلاین کد رهگیری پستی و تولید فاکتور</li>
<li>- ارسال کد رهگیری به خریدار به صورت پیامکی و در پنل کاربری</li>
</ul>
<a href="https://yun.ir/pwts" target="_blank">
    <input type="button" class="button button-primary" value="اطلاعات بیشتر">
</a>
<a href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=persian-woocommerce-shipping' ) . '" target="_blank">
    <input type="button" class="button" value="نصب افزونه پیشخوان پست">
</a>',
				$page == 'wc-settings' && $tab == 'shipping'
			];

			$notices['tapin-tools'] = [
				'success',
				'
				<a href="https://yun.ir/pwtt" target="_blank">
				    <img src="' . $this->plugin_url( 'assets/images/tapin.jpg' ) . '" style="width: 100%">
                </a>',
				$page == 'persian-wc-tools'
			];

			$notices['tapin-dashboard'] = [
				'success',
				'<b>پیشخوان وردپرس خود را رایگان به شرکت ملی پست متصل کنید و یک دفتر پستی اختصاصی داشته باشید.</b>
<ul>
<li>- محاسبه دقیق هزینه های پستی در سبد خرید</li>
<li>- جمع آری سفارشات از محل شما توسط ماموران پست در سراسر کشور</li>
<li>- صدور فاکتور استاندارد پست همراه با بارکد پست</li>
<li>- ارسال کد رهگیری پست به مشتری به صورت پیامکی و پنل کاربری</li>
</ul>
<a href="https://yun.ir/pwtd" target="_blank">
    <input type="button" class="button button-primary" value="اطلاعات بیشتر">
</a>
<a href="' . admin_url( 'plugin-install.php?tab=plugin-information&plugin=persian-woocommerce-shipping' ) . '" target="_blank">
    <input type="button" class="button" value="نصب افزونه پیشخوان پست">
</a>',
				true
			];

			$notices['persian-date'] = [
				'info',
				'<b>ووکامرس فارسی با طمع ووکامرس شمسی!</b>
<ul>
<li>- شمسی سازی محیط وردپرس بدون نیاز به افزونه جانبی</li>
<li>- شمسی سازی ووکامرس در محصولات، سفارشات، کوپن ها و گزارشات</li>
<li>- افزودن DatePicker شمسی در پنل ووکامرس</li>
<li>- برای فعالسازی شمسی ساز ووکامرس روی کلید زیر کلیک کنید:</li>
</ul>
<a href="' . admin_url( 'admin.php?page=persian-wc-tools' ) . '" target="_blank">
    <input type="button" class="button button-primary" value="فعالسازی شمسی ساز وردپرس و ووکامرس">
</a>',
				$this->get_options( 'enable_jalali_datepicker' ) !== 'yes',
			];

			$notices['pws'] = [
				'info',
				sprintf( 'بنظر میرسه هنوز حمل و نقل (پست پیشتاز، سفارشی، پیک موتوری و...) فروشگاه رو پیکربندی نکردید؟ <a href="%s" target="_blank">نصب افزونه حمل و نقل فارسی ووکامرس و پیکربندی.</a>', admin_url( 'plugin-install.php?tab=plugin-information&plugin=persian-woocommerce-shipping' ) ),
				class_exists( 'WC_Shipping_Zones' ) && ! count( WC_Shipping_Zones::get_zones() ) && current_user_can( 'install_plugins' ),
			];

		}
	}
endif;

if ( ! class_exists( 'Persian_Woocommerce_Plugin' ) ) {
	class Persian_Woocommerce_Plugin extends Persian_Woocommerce_Core {

	}
}
