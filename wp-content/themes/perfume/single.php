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
<div class="container">
    <div class="row">
	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) :
			the_post();
            $prev_post = get_adjacent_post(false, '', true);
            $next_post =get_adjacent_post(false, '', false);
		echo "
            <div class=\"blog-banner\">
                 <img src=\"" . get_the_post_thumbnail_url(null,'product-larg') . "\" alt=\"".get_the_title()."\">
            </div>
            <div class=\"blog-padding\">
            <h1>".
            get_the_title()."
            </h1>".
            get_the_content()."
          
            <p>
            مقاله های زیر ممکن است برای شما جذاب باشد.
</p>
<div class=\"d-flex justify-content-around\">
<div><a href=\"". get_permalink($prev_post->ID) ."\">".
get_the_post_thumbnail($prev_post->ID, 'medium')."  
<p class=\"text-center\">".$prev_post->post_title."</p></a>
</div>
<div>
<a href=\"". get_permalink($next_post->ID) ."\">".get_the_post_thumbnail($next_post->ID, 'medium')."  
            <p class=\"text-center\">".$next_post->post_title."</p></a>
</div>
</div>";
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
    </div>
</div>
    <div class="space-top"></div>
<?php
//get_sidebar();
get_footer('page');
