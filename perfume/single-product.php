<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package underscores
 */
get_header('page');
?>

   <main id="primary" class="site-main">
        <?php

        while (have_posts()) :
            the_post();

            $product =wc_get_product();
            $meta = get_post_meta(get_the_ID());
            $attributes =$product->get_attribute( 'barcode' );
            $prev_post = get_adjacent_post(false, '', true);
            $next_post =get_adjacent_post(false, '', false);
      
        echo "
            <article id='post-".get_the_ID()."' class='".implode(" ",wc_get_product_class(get_the_ID()))."'>
            <header class='entry-header'>
                <h1 class='entry-title'>".get_the_title()."</h1>	</header><!-- .entry-header -->
                   <div id='article'>
                        <div class='post-thumbnail'>
                            <figure>
                                <img src='".get_the_post_thumbnail_url()."' alt='".get_the_title()."'>
                            </figure>
                        </div><!-- .post-thumbnail -->
                    </div>
                
            <div class='entry-content'>
                ".get_the_content()."";
        echo "<br/>";
        if (count($product->get_attributes())>0) {
        echo "<h2>مشخصات</h2><ul>";
                foreach($product->get_attributes() as $values ) {
                    echo "<li>" . $values["name"] . "<span class='number'>: " . implode(', ', $values["options"])."</li>";
                }
                echo "</ul>
            </div><!-- .entry-content -->";
        }
        echo "
            <footer class='entry-footer'>";
         if( current_user_can('administrator') ):
             echo "
                            <span class='edit-link'><a class='post-edit-link' href='".esc_url( home_url( '/' ))."&amp;action=edit wp-admin/post.php?post=".get_the_ID()."'>ویرایش <span class='screen-reader-text'>ویرایش</span></a></span>	</footer>";
         endif;
         echo"
                    </article>";

         echo "
                        <p>
                        محصولات زیر ممکن است برای شما جذاب باشد.
            </p>
            <div class=\"d-flex justify-content-around\">";
             if ($prev_post != '') :
            echo "
            <div>
            <a href=\"". get_permalink($prev_post->ID) ."\">".
             wp_get_attachment_image(get_post_thumbnail_id($prev_post->ID))."  
            <p class=\"text-center\">".$prev_post->post_title."</p></a>
            </p>
           
            </div>";
             endif;
            if ($next_post != '') :
                echo"
            <div>
            <a href=\"". get_permalink($next_post->ID) ."\">"
             .wp_get_attachment_image(get_post_thumbnail_id($next_post->ID))."  
             <p class=\"text-center\">".$next_post->post_title."</p></a>
            </div>";
             endif;
             echo "
            </div>";

//            get_template_part('template-parts/content', get_post_type());
//            echo "<strong class='barcode'>بارکد: <span class='number'> $attributes</span></strong>";
//
//            the_post_navigation(
//                array(
//                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('', 'underscores') . '</span> <span class="nav-title">%title</span>',
//                    'next_text' => '<span class="nav-subtitle">' . esc_html__('', 'underscores') . '</span> <span class="nav-title">%title</span>',
//                )
//            );

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
<div class="zoomContainer"></div>
<?php
//get_sidebar();
get_footer('page');

?>
<script>
    var imagesContainer = document.createElement('div');
    imagesContainer.setAttribute("class", "images-container");
    var productCover = document.createElement('div');
    productCover.setAttribute("class", "product-cover");
    imagesContainer.appendChild(productCover);
    $("#article figure img").addClass('js-qv-product-cover');
    $("#article figure img").attr('itemprop','image');
    var img =  $("#article figure img");
    $(".wp-post-image").wrap(imagesContainer);
    var src =  $(".wp-post-image").attr('src');
    $(".wp-post-image").addClass('js-qv-product-cover');
    $(".wp-post-image").attr('itemprop','image');
    var layer = document.createElement('div');
    layer.setAttribute("class", "layer hidden-sm-down");
    layer.setAttribute("data-toggle", "modal");
    layer.setAttribute("data-target", "#product-modal");
    var zoomIcon = document.createElement('i');
    zoomIcon.setAttribute("class", "fas fa-search");
    layer.appendChild(zoomIcon);
    productCover.appendChild(layer);
</script>
