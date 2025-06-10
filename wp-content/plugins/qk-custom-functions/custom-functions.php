<?php 
/**
 * Plugin Name: QK Custom Functions
 * Description: This plugin register all custom functions come with theme.
 * Version: 1.0
 * Author: Quannt
 * Author URI: http://qkthemes.com
 */
?>
<?php

/* ---------------------------------------------------------------------------
 * Divider Shortcode
 * --------------------------------------------------------------------------- */

add_shortcode('divider-1', 'dotted_divider1');

function dotted_divider1() {
    return '<div class="clearfix divider_dashed1"></div>';
}

add_shortcode('divider-2', 'dotted_divider2');

function dotted_divider2() {
    return '<div class="clearfix divider_dashed2"></div>';
}

add_shortcode('divider-3', 'dotted_divider3');

function dotted_divider3() {
    return '<div class="clearfix divider_dashed3"></div>';
}

add_shortcode('divider-4', 'dotted_divider4');

function dotted_divider4() {
    return '<div class="clearfix divider_dashed4"></div>';
}


/* ---------------------------------------------------------------------------
 * Title
 * --------------------------------------------------------------------------- */

function nivo_title($title, $sep)
{

    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.

    $title .= get_bloginfo('name');
  
 

    // Add the site description for the home/front page.

    $site_description = get_bloginfo('description', 'display');

    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.

    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(esc_html__('Page %s', 'nivo'), max($paged, $page));
    }

    return $title;

}

add_filter('wp_title', 'nivo_title', 10, 2);



/* ---------------------------------------------------------------------------
 * Social Share Links
 * --------------------------------------------------------------------------- */

add_shortcode( 'social-link', 'nivo_social_link' );


function nivo_social_link(){
    
    $html ='<div class="sharepost">';
    $html .='<h5 class="light">Share this Post</h5>';
    $html .='<ul>';
    $html .='<li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>">&nbsp;<i class="fa fa-facebook fa-lg"></i>&nbsp;</a></li>';
    $html .='<li><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?><?php ?>"><i class="fa fa-twitter fa-lg"></i></a></li>';
    $html .='<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus fa-lg"></i></a></li>';
    $html .='<li><a href="http://www.digg.com/submit?phase=2&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fa fa-digg fa-lg"></i></a></li>';
    $html .='<li><a href="http://www.tumblr.com/share?v=3&u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fa fa-tumblr fa-lg"></i></a></li>';	
    $html .='<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin fa-lg"></i></a></li>';
    $html .='</ul>';
    $html .='</div>';

    return $html;    
}

 ?>