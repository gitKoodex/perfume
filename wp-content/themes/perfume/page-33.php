<?php
/*
Template Name: shopPage
Template Post Type: post, page, event
*/
// Page code here...
get_header('page');
?>
    <div class="space-top"></div>

    <main id="primary" class="site-main">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

//            the_post_navigation(
//                array(
//                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'underscores' ) . '</span> <span class="nav-title">%title</span>',
//                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'underscores' ) . '</span> <span class="nav-title">%title</span>',
//                )
//            );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>
    </main><!-- #main -->
    <div class="space-top"></div>
<?php
//get_sidebar();
get_footer('page');