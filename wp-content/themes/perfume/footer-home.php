<footer id="footer">

    <div class="container">
        <!-- Dodanie strzałki powrótnej do góry strony -->
        <a href="https://webb.hekko24.pl/74_multi_cosmetics/en/en.html#" id="do_gory"></a>
        <!-- End Dodanie strzałki powrótnej do góry strony -->
        <div class="row">
        </div>
    </div>
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 links">
                    <div class="d-flex">
                    <?php
                   if ( is_active_sidebar( 'sidebar-2' ) ) {
                        dynamic_sidebar( 'sidebar-2' );
                    }else{

                        ?>

                        <h3 class="h3 hidden-sm-down">محصولات</h3>
                        <div class="title clearfix hidden-md-up" data-target="#footer_sub_menu_5917"
                             data-toggle="collapse">
                            <span class="h3">محصولات</span>
                            <span class="pull-xs-right">
                                  <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE313;</i>
                                    <i class="material-icons remove">&#xE316;</i>
                                  </span>
                                </span>
                        </div>
                        <ul id="footer_sub_menu_5917" class="collapse">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 3
                            );
                            $loop = new WP_Query($args);
                            if ($loop->have_posts()) {
                                $counter = 1;
                                while ($loop->have_posts()) : $loop->the_post();
                                    echo "
                                <li>
                                    <a
                                        id=\"link-product-page-prices-drop-{$counter}\"
                                        class=\"cms-page-link\"
                                        href=\"" . get_permalink() . "\"
                                        title=\"" . get_the_title() . "\">" .
                                        get_the_title() . "
                                    </a>
                                </li>";
                                endwhile;
                            }
                            wp_reset_postdata();
                            ?>


                        </ul>
                        <?php
                        // Display this widget

                    }
                    ?>
                    </div>
                </div>
                <div class="block_newsletter col-lg-4 col-md-12 col-sm-12">
                    <div class="row">
                        <?php
                        if ( is_active_sidebar( 'sidebar-3' ) ) {
                            dynamic_sidebar( 'sidebar-3' );
                        }else{

                            ?>
                            <div class="footerpadding">
                                <h2 class="newsletter h3 hidden-sm-down">تماس با ما</h2>

                                <p class="col-md-5 col-xs-12">شماره تماس: 64 31 4460 21 98+</p>
                            </div>
                            <?php
                            // Display this widget

                        }
                        ?>
                    </div>
                </div>
                <div class="block_newsletter col-lg-4 col-md-12 col-sm-12">
                    <?php
                    if ( is_active_sidebar( 'sidebar-4' ) ) {
                        dynamic_sidebar( 'sidebar-4' );
                    }

                    ?>
                </div>
            </div>
        </div>

</footer>

</main>

<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/assets/js/apps.js"></script> 
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/modules/apps.js"></script> 
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/assets/js/jquery.elevatezoom.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/modules/ddproductcomments/views/js/ddproductcomments.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/modules/ddproductcomments/views/js/jquery.rating.pack.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/assets/js/custom.js"></script>
<script src="<?php echo esc_url(home_url('/')); ?>wp-content/themes/perfume/assets/js/script.js"></script>



<?php wp_footer(); ?>
</body>

</html>