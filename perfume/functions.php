<?php
/**
 * underscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscores
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'underscores_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function underscores_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on underscores, use a find and replace
		 * to change 'underscores' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'underscores', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'post-thumb', 87, 300, true );
        add_image_size( 'product-larg', 1024, 300, true );
        add_image_size( 'Thumbnail', 150, 150, false );
        add_image_size( 'Medium', 300, 300, false );
        add_image_size( 'Large', 1024, 1024, false );

 		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'underscores' ),
                'menu-2' => esc_html__( 'Secoundry', 'underscores' ),
			)
		);

        function add_additional_class_on_li($classes, $item, $args) {
            if(isset($args->add_li_class)) {
                $classes[] = $args->add_li_class;
            }
            return $classes;
        }
        function add_class_to_all_menu_anchors($atts,$item,$args) {
            if(isset($args->add_a_attr)) {
                $atts['data-depth'] = $args->add_a_attr;
            }
            return $atts;
        }
        function yourtheme_woocommerce_image_dimensions() {
            global $pagenow;

            if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
                return;
            }
            $catalog = array(
                'width'     => '300',   // px
                'height'    => '300',   // px
                'crop'      => 0 // Disabling Hard crop option.
            );
            $single = array(
                'width'     => '150',   // px
                'height'    => '150',   // px
                'crop'      => 0 // Disabling Hard crop option.
            );
            $thumbnail = array(
                'width'     => '90',   // px
                'height'    => '90',   // px
                'crop'      => 0 // Disabling Hard crop option.
            );
            // Image sizes
            update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
            update_option( 'shop_single_image_size', $single );      // Single product image
            update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
        }
        add_action( 'after_switch_theme', 'yourtheme_woocommerce_image_dimensions', 1 );
        add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10 ,3);
        add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
        // for image size
        add_filter( 'image_size_names_choose', 'my_custom_image_sizes' );
        function my_custom_image_sizes( $sizes ) {
            return array_merge( $sizes, array(
                'post-image' => __( 'Post Images' ),
            ) );
        }
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',

			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'underscores_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'underscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function underscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'underscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'underscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function underscores_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'underscores' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	//footers
    $shared_args = array(
        'before_title'  => '<div>',
        'after_title'   => '</div>',
        'before_widget' => '<ul class="no-list-style p-0 m-0">',
        'after_widget'  => '</ul>',
    );
    // Footer #1.
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => esc_html__( 'پاصفحه #1', 'cobco' ),
                'id'          => 'sidebar-2',
                'description' => esc_html__( 'ابزارهای این بخش در ستون اول پا صفحه قرار خواهند گرفت', 'cobco' ),
            )
        )

    );

    // Footer #2.
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => esc_html__( 'پاصفحه #2', 'cobco' ),
                'id'          => 'sidebar-3',
                'description' => esc_html__( 'ابزارهای این بخش در دومین ستون پاصفحه قرار خواهند گرفت', 'cobco' ),
            )
        )

    );

    // Footer #3.
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => esc_html__( 'پاصفحه #3', 'cobco' ),
                'id'          => 'sidebar-4',
                'description' =>esc_html__( 'ابزارهای این صفحه در سومین ستون پاصفحه قرار خواهند گرفت', 'cobco' ),
            )
        )
    );//end footers

}
add_action( 'widgets_init', 'underscores_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function underscores_scripts() {
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'underscores-style', 'rtl', 'replace' );

	wp_enqueue_script( 'underscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

