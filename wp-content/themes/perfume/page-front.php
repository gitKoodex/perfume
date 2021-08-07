<?php

/*
Template Name: frontpage
Template Post Type: post, page, event
*/
// Page code here...

get_header('home');
?>


<body id="index" class="lang-en country-pl currency-pln layout-full-width page-index tax-display-enabled">


<main>


    <header id="header">


        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="tlo_menu"></div>
                    <div class="tlo_belka"></div>
                    <div class="belka">
                        <div class="lewabelka col-xs-12" style="padding: 0px;">

                            <div class="menu_and_logo">

                                <div class="col-md-10 col-sm-12 position-static float-right">
                                    <div class="row">

                                        <div class="menu col-lg-12 js-top-menu position-static hidden-md-down"
                                             id="_desktop_top_menu">

                                            <?php
                                            $args = array(
                                                'theme_location' => 'menu-1',
                                                'menu_id' => 'primary-menu',
                                                'container' => false,
                                                'items_wrap' => '<ul class="nav top-menu" data-depth="1">%3$s</ul>',
                                                'add_li_class' => 'category',
                                                'add_a_attr' => '0'
                                            );
                                            wp_nav_menu($args);
                                            //                                                        wp_nav_menu(
                                            //                                                            array(
                                            //                                                                'theme_location' => 'menu-1',
                                            //                                                                'menu_id'        => 'primary-menu',
                                            //                                                                'container' => false,
                                            //                                                                'items_wrap' => '<ul class="nav top-menu" data-depth="1">%3$s</ul>',
                                            //                                                            )
                                            //                                                        );
                                            ?>


                                        </div>
                                        <script type="text/javascript">
                                            console.log(false);
                                            // var wishlistProductsIds = false;
                                            // var loggin_required = "You must be logged in to manage your wishlist.";
                                            // var added_to_wishlist = "The product was successfully added to your wishlist.";
                                            // var mywishlist_url = "//webb.hekko24.pl/74_multi_cosmetics/en/module/blockwishlist/mywishlist";
                                            // var baseDir = "https://webb.hekko24.pl/74_multi_cosmetics/";
                                            //
                                            // var isLoggedWishlist = false

                                        </script>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 hidden-sm-down float-right remove-space" id="_desktop_logo">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-2',
                                            'menu_id' => 'secoundry-menu',
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>


                        <nav class="header-nav">
                            <div class="hidden-md-up text-xs-center mobile">
                                <div class="pull-xs-left bars-container" id="menu-icon">
                                    <i class="fas fa-bars"></i>
                                </div>
                                <div class="pull-xs-right" id="_mobile_cart"></div>
                                <div class="pull-xs-right" id="_mobile_user_info"></div>
                                <div class="top-logo" id="_mobile_logo"></div>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </nav>
                </div>

                <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
                    <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
                    <div class="js-top-menu-bottom">
                        <div id="_mobile_currency_selector"></div>
                        <div id="_mobile_language_selector"></div>
                        <div id="_mobile_contact_link"></div>
                    </div>
                </div>

            </div>
        </div>


    </header>


    <aside id="notifications">
        <div class="container">


        </div>
    </aside>


    <article id="wrapper">

        <div class="container">

            <nav data-depth="1" class="breadcrumb hidden-sm-down">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <span itemprop="name">خانه</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>
            </nav>


            <div id="content-wrapper">


                <section id="main">


                    <section id="content" class="page-home">


                        <div class="dd-loading-background"></div>
                        <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="5000"
                             data-pause="">
                            <ul class="carousel-inner" role="listbox">
                                <li class="carousel-item active">
                                    <figure>
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <?php
                                            $image = get_field('first-slider');
                                            if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                            <figcaption class="caption">
                                                <h2 class="display-1 text-uppercase"></h2>
                                                <div class="caption-description"><p>
                                                        <!--                                                        <a-->
                                                        <!--                                                                href="-->
                                                        <?php //echo esc_url( home_url( '/' ) ); ?><!--"-->
                                                        <!--                                                                class="shop_now"> Shop now </a>-->
                                                    </p></div>
                                            </figcaption>
                                        </a>
                                    </figure>
                                </li>
                                <li class="carousel-item ">
                                    <figure>
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <?php
                                            $image = get_field('sec-slider');
                                            if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                            <figcaption class="caption">
                                                <h2 class="display-1 text-uppercase"></h2>
                                                <div class="caption-description"><p>
                                                        <!--                                                        <a-->
                                                        <!--                                                                href="-->
                                                        <?php //echo esc_url( home_url( '/' ) ); ?><!--"-->
                                                        <!--                                                                class="shop_now"> Shop now </a>-->
                                                    </p></div>
                                            </figcaption>
                                        </a>
                                    </figure>
                                </li>
                            </ul>
                            <div class="direction">
                                <a class="left carousel-control" href="#carousel" role="button"
                                   data-slide="prev">
                                        <span class="icon-prev hidden-xs" aria-hidden="true">
                                          <i class="fas fa-angle-left"></i>
                                        </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel" role="button"
                                   data-slide="next">
                                        <span class="icon-next" aria-hidden="true">
                                          <i class="fas fa-angle-right"></i>
                                        </span>
                                    <span class="sr-only">بعدی</span>
                                </a>
                            </div>
                        </div>.
                        <section id="coloreddevision">
                        <div class="row d-block d-md-flex">
                            <!--i am here-->
                            <?php
                             $featured_posts = get_field('product-with-ground');
                             if( $featured_posts ): $counter = 1;?>
 
                                 <?php foreach( $featured_posts as $post ):
 
                                         // Setup this post for WP functions (variable must be named $post).
                                         setup_postdata($post);
                                         echo "
                                 <div class=\"custom-banner-{$counter}  custome-banner position-relative p-3 col-12 col-md-4\">
                                     <div class=\"position-relative full-cover\">
                                         <img src=\"".esc_url( home_url( '/' ) )."wp-content/uploads/2021/04/unnamed.jpg\" alt=\"پس زمینه\" class=\"w-100\">
                                     </div>
                                     <div class=\"position-absolute product-on-image w-50\">
                                          <img src=\"" . get_the_post_thumbnail_url() . "\" alt=\"محصول\">
                                     </div>
                                     <div class=\"mobile-relative desktop-absolute mobile-full-cover mobile-bg-white borderd desktop-center has-back-content\">";
                                         echo get_the_title();
                                         echo "<div class=\"buttons-banners\">بیشتر</div>";
                                     echo"    
                                     </div>
                                 </div>";
                                  $counter++; endforeach;
                                 // Reset the global post object so that the rest of the page works correctly.
                                 wp_reset_postdata();
                                 endif; ?>
                                 <!--                            End here-->
 
                             </div>
                             </section>
                             <div class="row">
                                 <div class="p-3">
                                     <hr>
                                 </div>
                             </div>
                        <article class="featured-products clearfix" id="cologne">
                            <div class="linia_tytul">
                                <div class="tytuly">
                                    ادکلن های جدید
                                </div>
                                <div class="SliderNavigation">
                                    <a class="btn prev slider_new_prev">&nbsp;</a>
                                    <a class="btn next slider_new_next">&nbsp;</a>
                                </div>
                            </div>
                            <div class="products">
                                <!-- Define Number of product for SLIDER -->
                                <ul id="new-carousel" class="bestseller_grid product_list grid row gridcount">
                                    <?php
                                    $args = array(
                                        'post_type' => 'product',
                                        'product_cat_id'=>'21',
                                        'posts_per_page' => 7,
                                        'tax_query'             => array(
                                            array(
                                                'taxonomy'      => 'product_cat',
                                                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                                                'terms'         => 21,
                                            ),
                                    )
                                    );
                                    $productsLoop = new WP_Query($args);
                                    if ($productsLoop->have_posts()) {
                                        $counter = 1;
                                        while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                            echo "
                                    
                                    <li class=\"item\">
                                        <article class=\"product-miniature js-product-miniature\" data-id-product=\"{$productsLoop->ID}\"
                                                 data-id-product-attribute=\"{$productsLoop->ID}\" itemscope itemtype=\"http://schema.org/Product\">
                                            <div class=\"thumbnail-container\">
                                                <div class=\"dd-product-image\">

                                                    <a href=\"" . get_permalink() . "\"
                                                       class=\"thumbnail product-thumbnail\">
                                                        <img
                                                                class=\"ddproduct-img1\"
                                                                src=\"" . get_the_post_thumbnail_url() . "\"
                                                                alt=\"" . get_the_title() . "\"
                                                                data-full-size-image-url=\"" . get_the_post_thumbnail_url() . "\"
                                                        >
                                                        <img class=\"drugi_image img-responsive\" src=\"" . get_the_post_thumbnail_url() . "\"
                                                             data-full-size-image-url=\"" . get_the_post_thumbnail_url() . "\"
                                                             alt=\"" . get_the_title() . "\"/>

                                                    </a>


                                                    <ul class=\"product-flags\">
                                                        <li class=\"new\">جدید</li>
                                                    </ul>

                                                </div>

                                                <div class=\"product-desc\">
                                                    <div class=\"product-description\">

                                                        <h3 class=\"h3 product-title\" itemprop=\"name\"><a
                                                                    href=\"" . get_permalink() . "\">" . get_the_title() . "
                                                                </a></h3>


                                                        <div class=\"product-price-and-shipping\">


                                                            <span class=\"sr-only\">Price</span>
                                                            <span itemprop=\"price\" class=\"price\">" . get_post_meta(get_the_ID(), '_regular_price', true) . "</span>


                                                        </div>

                                                        <div class=\"hook-reviews\">
                                                            <div class=\"comments_note\" itemprop=\"aggregateRating\" itemscope
                                                                 itemtype=\"https://schema.org/AggregateRating\">
                                                                <div class=\"star_content clearfix\">
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <meta itemprop=\"worstRating\" content=\"0\"/>
                                                                    <meta itemprop=\"ratingValue\" content=\"5\"/>
                                                                    <meta itemprop=\"bestRating\" content=\"5\"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"highlighted-informations\">
                                                        <div class=\"buttons-actions_align\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>                        
                                 </li>";
                                        endwhile;
                                    } else {
                                        echo __('محصولی برای نمایش موجود نیست!');
                                    }
                                    wp_reset_postdata();
                                    ?>

                                </ul>

                            </div>
                            <div class="view_more">
                                <a class="all-product-link" href="product-category/ادکلن/">
                                    مشاهده همه ادکلن ها
                                </a>
                            </div>

                    </article>


                        <article class="featured-products clearfix" id="espray">
                            <div class="linia_tytul">
                                <div class="tytuly">
                                    اسپری های جدید
                                </div>
                                <div class="SliderNavigation">
                                    <a class="btn prev slider_new_prev">&nbsp;</a>
                                    <a class="btn next slider_new_next">&nbsp;</a>
                                </div>
                            </div>
                            <div class="products">
                                <!-- Define Number of product for SLIDER -->
                                <ul id="new-carousel-2" class="bestseller_grid product_list grid row gridcount ltr">
                                    <?php
                                    $args = array(
                                        'post_type' => 'product',
                                        'posts_per_page' => 7,
                                        'tax_query'             => array(
                                            array(
                                                'taxonomy'      => 'product_cat',
                                                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                                                'terms'         => 24,
                                            ),
                                        ),
                                    );
                                    $productsLoop = new WP_Query($args);
                                    if ($productsLoop->have_posts()) {
                                        $counter = 1;
                                        while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                            echo "
                                    
                                    <li class=\"item\">
                                        <article class=\"product-miniature js-product-miniature\" data-id-product=\"{$productsLoop->ID}\"
                                                 data-id-product-attribute=\"{$productsLoop->ID}\" itemscope itemtype=\"http://schema.org/Product\">
                                            <div class=\"thumbnail-container\">
                                                <div class=\"dd-product-image\">

                                                    <a href=\"" . get_permalink() . "\"
                                                       class=\"thumbnail product-thumbnail\">
                                                        <img
                                                                class=\"ddproduct-img1\"
                                                                src=\"" . get_the_post_thumbnail_url() . "\"
                                                                alt=\"" . get_the_title() . "\"
                                                                data-full-size-image-url=\"" . get_the_post_thumbnail_url() . "\"
                                                        >
                                                        <img class=\"drugi_image img-responsive\" src=\"" . get_the_post_thumbnail_url() . "\"
                                                             data-full-size-image-url=\"" . get_the_post_thumbnail_url() . "\"
                                                             alt=\"" . get_the_title() . "\"/>

                                                    </a>


                                                    <ul class=\"product-flags\">
                                                        <li class=\"new\">جدید</li>
                                                    </ul>

                                                </div>

                                                <div class=\"product-desc\">
                                                    <div class=\"product-description\">

                                                        <h3 class=\"h3 product-title\" itemprop=\"name\"><a
                                                                    href=\"" . get_permalink() . "\">" . get_the_title() . "
                                                                </a></h3>


                                                        <div class=\"product-price-and-shipping\">


                                                            <span class=\"sr-only\">Price</span>
                                                            <span itemprop=\"price\" class=\"price\">" . get_post_meta(get_the_ID(), '_regular_price', true) . "</span>


                                                        </div>

                                                        <div class=\"hook-reviews\">
                                                            <div class=\"comments_note\" itemprop=\"aggregateRating\" itemscope
                                                                 itemtype=\"https://schema.org/AggregateRating\">
                                                                <div class=\"star_content clearfix\">
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <meta itemprop=\"worstRating\" content=\"0\"/>
                                                                    <meta itemprop=\"ratingValue\" content=\"5\"/>
                                                                    <meta itemprop=\"bestRating\" content=\"5\"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"highlighted-informations\">
                                                        <div class=\"buttons-actions_align\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>                        
                                 </li>";
                                        endwhile;
                                    } else {
                                        echo __('محصولی برای نمایش موجود نیست!');
                                    }
                                    wp_reset_postdata();
                                    ?>

                                </ul>

                            </div>
                            <div class="view_more">
                                <a class="all-product-link" href="/product-category/اسپری/">
                                    مشاهده همه اسپری های کوبکو
                                </a>
                            </div>

                        </article>


                        <article class="featured-products clearfix" id="bodysplash">
                            <div class="linia_tytul">
                                <div class="tytuly">
                                    بادی اسپلش های جدید
                                </div>
                                <div class="SliderNavigation">
                                    <a class="btn prev slider_new_prev">&nbsp;</a>
                                    <a class="btn next slider_new_next">&nbsp;</a>
                                </div>
                            </div>
                            <div class="products">
                                <!-- Define Number of product for SLIDER -->
                                <ul id="new-carousel-3" class="bestseller_grid product_list grid row gridcount ltr">
                                    <?php
                                    $args = array(
                                        'post_type' => 'product',
                                        'posts_per_page' => 7,
                                        'tax_query'             => array(
                                            array(
                                                'taxonomy'      => 'product_cat',
                                                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                                                'terms'         => 22,
                                            ),
                                        )
                                    );
                                    $productsLoop = new WP_Query($args);
                                    if ($productsLoop->have_posts()) {
                                        $counter = 1;
                                        while ($productsLoop->have_posts()) : $productsLoop->the_post();
                                            echo "
                                    
                                    <li class=\"item\">
                                        <article class=\"product-miniature js-product-miniature\" data-id-product=\"{$productsLoop->ID}\"
                                                 data-id-product-attribute=\"{$productsLoop->ID}\" itemscope itemtype=\"http://schema.org/Product\">
                                            <div class=\"thumbnail-container\">
                                                <div class=\"dd-product-image\">

                                                    <a href=\"" . get_permalink() . "\"
                                                       class=\"thumbnail product-thumbnail\">
                                                        <img
                                                                class=\"ddproduct-img1\"
                                                                src=\"" . get_the_post_thumbnail_url() . "\"
                                                                alt=\"" . get_the_title() . "\"
                                                                data-full-size-image-url=\"" . get_the_post_thumbnail_url() . "\"
                                                        >
                                                        <img class=\"drugi_image img-responsive\" src=\"" . get_the_post_thumbnail_url() . "\"
                                                             data-full-size-image-url=\"" . get_the_post_thumbnail_url() . "\"
                                                             alt=\"" . get_the_title() . "\"/>

                                                    </a>


                                                    <ul class=\"product-flags\">
                                                        <li class=\"new\">جدید</li>
                                                    </ul>

                                                </div>

                                                <div class=\"product-desc\">
                                                    <div class=\"product-description\">

                                                        <h3 class=\"h3 product-title\" itemprop=\"name\"><a
                                                                    href=\"" . get_permalink() . "\">" . get_the_title() . "
                                                                </a></h3>


                                                        <div class=\"product-price-and-shipping\">


                                                            <span class=\"sr-only\">Price</span>
                                                            <span itemprop=\"price\" class=\"price\">" . get_post_meta(get_the_ID(), '_regular_price', true) . "</span>


                                                        </div>

                                                        <div class=\"hook-reviews\">
                                                            <div class=\"comments_note\" itemprop=\"aggregateRating\" itemscope
                                                                 itemtype=\"https://schema.org/AggregateRating\">
                                                                <div class=\"star_content clearfix\">
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <div class=\"star star_on\"></div>
                                                                    <meta itemprop=\"worstRating\" content=\"0\"/>
                                                                    <meta itemprop=\"ratingValue\" content=\"5\"/>
                                                                    <meta itemprop=\"bestRating\" content=\"5\"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=\"highlighted-informations\">
                                                        <div class=\"buttons-actions_align\">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>                        
                                 </li>";
                                        endwhile;
                                    } else {
                                        echo __('محصولی برای نمایش موجود نیست!');
                                    }
                                    wp_reset_postdata();
                                    ?>

                                </ul>

                            </div>
                            <div class="view_more">
                                <a class="all-product-link" href="/product-category/بادی-اسپلش/">
                                    مشاهده همه بادی اسپلش کوبکو
                                </a>
                            </div>

                        </article>
                    <!--مقالات-->
                    <section class="featured-products clearfix">
                        <div id="smartblog_block" class="block products_block  clearfix">
                            <div class="linia_tytul">
                                <div class="tytuly">
                                    <a href="category/blogs/">در باره بادی اسپلش بیشتر بدانید!</a>
                                </div>
                            </div>
                            <div class="SliderNavigation absolute-buttom w-100 d-flex justify-content-between">
                                <a class="btn next smartblog_next"> <i class="material-icons">&nbsp;</i></a>
                                <a class="btn prev smartblog_prev"> <i class="material-icons">&nbsp;</i></a>
                            </div>
                            <div class="sdsblog-box-content block_content row">
                                <div id="smartblog-carousel" class="owl-carousel product_list">
                                    <?php
                                    $args = array(
                                        'cat' => '20',
                                        'post_type' => 'post',
                                        'posts_per_page' => -1
                                    );
                                    $loop = new WP_Query($args);
                                    if ($loop->have_posts()) {
                                        $counter = 1;
                                        while ($loop->have_posts()) : $loop->the_post();
                                            $content = get_post_field('post_content', get_the_ID());

                                            // Get content parts
                                            $content_parts = get_extended($content);
                                            echo "
                                    <div class=\"item sds_blog_post\">
                                        <div class=\"blog_post\">
                                <span class=\"news_module_image_holder\">
                                    <a href=\"" . get_permalink() . "\">
                                        <img alt=\"" . get_the_title() . "\" class=\"feat_img_small\"
                                             src=\"" . get_the_post_thumbnail_url() . "\">
                                        <span class=\"blog-hover\"></span>
                                    </a>
                                    <span class=\"blog_date\">
                                        <span class=\"day_date\"> 5</span>
                                        <span class=\"date_inner\">
                                            <span class=\"day_month\">cze</span>
                                        </span>
                                    </span>
                                    <span class=\"blogicons\">
                                        <a title=\"کلیک کنید\"
                                           href=\"" . get_the_post_thumbnail_url() . "\"
                                           data-lightbox=\"example-set\" class=\"icon zoom\">&nbsp;</a>
                                    </span>
                                </span>
                                            <div class=\"blog_content\">
                                                <div class=\"blog_inner\">
                                                    <h4 class=\"sds_post_title\"><a href=\"" . get_permalink() . "\">" . get_the_title() . "</a></h4><p class=\"desc\">" .
                                                $content_parts['main'] . "</p>
                                                    <div class=\"read_more\">
                                                        <a title=\"ادامه مطلب\"
                                                           href=\"" . get_permalink() . "\"
                                                           class=\"icon readmore\">ادامه ...</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                        endwhile;
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
        <?php get_footer('home');?>
