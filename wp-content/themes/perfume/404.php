<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package underscores
 */

get_header('page');
?>
    <div class="space-top"></div>
	<main id="primary" class="site-main">
        <div class="container">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'خطای 404 صفحه مورد نظر شما یافت نشد', 'cobcoperfume' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'صفحه مد نظر شما موجود نیست ممکن است ما آن صفحه را حذف کرده باشیم و یا شما آدرس اشتباهی را وارد کرده باشید.', 'cobcoperfume' ); ?></p>

					<?php
					get_search_form();
?>
                <div class="d-flex pt-5 justify-content-between">
                <?php
					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'دسته بندی ها', 'cobcoperfume' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$underscores_archive_content = '<p>' . sprintf( esc_html__( 'آرشیو ماهانه. %1$s', 'underscores' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$underscores_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>
                </div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
        </div>
	</main><!-- #main -->
    <div class="space-top"></div>
<?php
//get_sidebar();
get_footer('page');
