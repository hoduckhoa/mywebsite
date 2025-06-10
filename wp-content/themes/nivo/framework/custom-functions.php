<?php


function nivo_filtercontent($variable){
	return wp_kses_post( $variable );
}

/* Page title */
if (!function_exists('nivo_theme_page_title')) {
    function nivo_theme_page_title() { 
            ob_start();
			if( is_home() ){
				esc_html_e('Home', 'nivo');
			}elseif(is_search()){
                esc_html_e('Search Keyword: ', 'nivo');
				echo '<span class="keywork">'. get_search_query(). '</span>';
            }elseif(is_404()){
                esc_html_e('404 ERROR PAGE: ', 'nivo');
            }elseif (!is_archive()) {
                the_title();
            } else { 
                if (is_category()){
                    single_cat_title();
                }elseif(get_post_type() == 'recipe' || get_post_type() == 'portfolio' || get_post_type() == 'produce' || get_post_type() == 'team' || get_post_type() == 'testimonial' || get_post_type() == 'myclients' || get_post_type() == 'product'){
                    single_term_title();
                }elseif (is_tag()){
                    single_tag_title();
                }elseif (is_author()){
                    printf(esc_html__('Author: %s', 'nivo'), '<span class="vcard">' . get_the_author() . '</span>');
                }elseif (is_day()){
                    printf(esc_html__('Day: %s', 'nivo'), '<span>' . get_the_date() . '</span>');
                }elseif (is_month()){
                    printf(esc_html__('Month: %s', 'nivo'), '<span>' . get_the_date('F Y') . '</span>');
                }elseif (is_year()){
                    printf(esc_html__('Year: %s', 'nivo'), '<span>' . get_the_date('Y') . '</span>');
                }elseif (is_tax('post_format', 'post-format-aside')){
                    esc_html_e('Asides', 'nivo');
                }elseif (is_tax('post_format', 'post-format-gallery')){
                    esc_html_e('Galleries', 'nivo');
                }elseif (is_tax('post_format', 'post-format-image')){
                    esc_html_e('Images', 'nivo');
                }elseif (is_tax('post_format', 'post-format-video')){
                    esc_html_e('Videos', 'nivo');
                }elseif (is_tax('post_format', 'post-format-quote')){
                    esc_html_e('Quotes', 'nivo');
                }elseif (is_tax('post_format', 'post-format-link')){
                    esc_html_e('Links', 'nivo');
                }elseif (is_tax('post_format', 'post-format-status')){
                    esc_html_e('Statuses', 'nivo');
                }elseif (is_tax('post_format', 'post-format-audio')){
                    esc_html_e('Audios', 'nivo');
                }elseif (is_tax('post_format', 'post-format-chat')){
                    esc_html_e('Chats', 'nivo');
                }else{
                    esc_html_e('Archives', 'nivo');
                }
            }
                
            return ob_get_clean();
    }
}


/* Page breadcrumb */
if (!function_exists('nivo_page_breadcrumb')) {
    function nivo_page_breadcrumb($delimiter) {
        ob_start();
        $delimiter = esc_attr('&raquo;');
        $home = esc_html__('Home', 'nivo');
        $before = '<a class="current">'; // tag before the current crumb
        $after = '</a>'; // tag after the current crumb

        global $post;
        $homeLink = esc_url( home_url('/') );
        if( is_home() ) {
            esc_html_e('Home', 'nivo');
        }
        else {
            echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        }

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo nivo_filtercontent($before . esc_html__('Archive by category: ', 'nivo') . single_cat_title('', false) . $after);

        } elseif ( is_search() ) {
            echo nivo_filtercontent($before . esc_html__('Search results for: ', 'nivo') . get_search_query() . $after);

        } elseif ( is_day() ) {
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo nivo_filtercontent($before . get_the_time('d') . $after);

        } elseif ( is_month() ) {
            echo nivo_filtercontent($before . get_the_time('F'). ' '. get_the_time('Y') . $after);

        } elseif ( is_single() and !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                if(get_post_type() == 'portfolio'){
                    $terms = get_the_terms(get_the_ID(), 'portfolio_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'portfolio_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' ;
                    } else{
            
                    }
                }elseif(get_post_type() == 'recipe'){
                    $terms = get_the_terms(get_the_ID(), 'recipe_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'recipe_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo nivo_filtercontent($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'produce'){
                    $terms = get_the_terms(get_the_ID(), 'produce_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'produce_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo nivo_filtercontent($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'team'){
                    $terms = get_the_terms(get_the_ID(), 'team_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'team_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                    echo nivo_filtercontent($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'testimonial'){
                    $terms = get_the_terms(get_the_ID(), 'testimonial_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'testimonial_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo nivo_filtercontent($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'myclients'){
                    $terms = get_the_terms(get_the_ID(), 'clientscategory', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'clientscategory', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo nivo_filtercontent($before . get_the_title() . $after);
                    }
                }elseif(get_post_type() == 'product'){
                    $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'product_cat', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo nivo_filtercontent($before . get_the_title() . $after);
                    }
                } else {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';

                }

            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo nivo_filtercontent($cats);
                
            }

        } elseif ( !is_single() and !is_page() and get_post_type() != 'post' and !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if($post_type) echo nivo_filtercontent($before . $post_type->labels->singular_name . $after);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
        } elseif ( is_page() and !$post->post_parent ) {
            echo nivo_filtercontent($before . get_the_title() . $after);

        } elseif ( is_page() and $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo nivo_filtercontent($breadcrumbs[$i]);
                if ($i != count($breadcrumbs) - 1)
                echo ' ' . $delimiter . ' ';
            }
            echo ' ' . $delimiter . ' ' ;

        } elseif ( is_tag() ) {
            echo nivo_filtercontent($before . esc_html__('Posts tagged: ', 'nivo') . single_tag_title('', false) . $after);
        } elseif ( is_author() ) {
        global $author;
            $userdata = get_userdata($author);
            echo nivo_filtercontent($before . esc_html__('Articles posted by ', 'nivo') . $userdata->display_name . $after);
        } elseif ( is_404() ) {
            echo nivo_filtercontent($before . esc_html__('Error 404', 'nivo') . $after);
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo ' '.$delimiter.' '.__('Page', 'nivo') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        return ob_get_clean();
    }
}

/* Title Blog Bar */
if ( ! function_exists( 'nivo_title_bar_blog' ) ) {
	function nivo_title_bar_blog() {
		$custom  = nivo_custom();
        
        if( nivo_get_object_option('show_title_bar') ){
    		$delimiter = isset($custom['page_breadcrumb_delimiter']) ? $custom['page_breadcrumb_delimiter'] : '&raquo;';
            $show_page_title = isset($custom['show_page_title']) ? $custom['show_page_title'] : 1;
            $show_page_breadcrumb = isset($custom['show_page_breadcrumb']) ? $custom['show_page_breadcrumb'] : 1;
    		$class = array();

    		if(is_404()){
                $class[] = 'page_title1';
            }else{
                $class[] = nivo_get_object_option('page_title_style', false, 'page_title1' );
            }
    		?>
    		
    			<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
    				<div class="container">
    					<?php if($show_page_title){ ?>
    						<div class="pagenation1"><?php echo nivo_theme_page_title(); ?></div>		
    					<?php } ?>
    					<?php if($show_page_breadcrumb){ ?>
    						<div class="pagenation2">
    							<?php echo nivo_page_breadcrumb($delimiter); ?>
    						</div>
    					<?php } ?>
    				</div>
    			</div>
    			<div class="clearfix"></div>
    		<?php
        }
	}
}



function nivo_get_object_option( $mtb_id, $tmp_id=false, $default=true ){
    global $post, $aq_theme_options;
    if( ! $tmp_id  )
        $tmp_id = $mtb_id;
    $option = false;


    if( is_page() ){
        $option = get_post_meta( $post->ID, $mtb_id, true );
    }

    if( $option === false || $option === "" || $option==='global' ){
        if( isset( $aq_theme_options[ $tmp_id ] ) ){
            return $aq_theme_options[ $tmp_id ];
        }
        return $default;
    }


    return $option;
}




 ?>