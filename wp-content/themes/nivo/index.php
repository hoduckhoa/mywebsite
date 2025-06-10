<?php get_header();?>

<div class="container" id="content">
    <div class="content_left">
        <?php   	
            $i = 0; if(have_posts()) :
            while(have_posts()) : the_post();
            if( $i > 0 ):
        ?>
        <?php endif;?>
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'blog_post' ); ?>>	
            <div class="blog_postcontent">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="image_frame">
                        <a href="<?php the_permalink();?>"><?php echo the_post_thumbnail();?></a>
                    </div>
                <?php }  
                else {
                    echo '';
                } ?>
                <h3 class="blog_post_f"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="post_meta_links">
                    <li class="post_date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></li>
                    <li class="post_by"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author();?></a></li>
                    <li class="post_categoty"><?php the_category(', ');?></li>
                    <li class="post_comments"> <a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a></li>
                </ul>
                <div class="post_info_content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>

        <div class="clearfix margin_t4"></div>
        <?php $i++;endwhile; ?>
        <?php else: ?>
        <div class="not-found">
        <h1><?php esc_html_e('Nothing Found Here!','nivo'); ?></h1>
        <h3><?php esc_html_e('Search with other string:', 'nivo') ?></h3>
        <div class="search-form">
        <?php get_search_form(); ?>
        </div>
        </div>
        <?php endif; ?>
        <div class="clearfix margin_t4"></div>
        <div><?php if($wp_query->max_num_pages>1){ ?>
        <div class="pagination">
        <?php $paged = get_query_var('page') > 1 ? (int) get_query_var('page') : 1;
        if(is_front_page() and !is_home()) {
        $curent = (get_query_var('page')) ? get_query_var('page') : 1;
        } else {
        $curent = (get_query_var('paged')) ? get_query_var('paged') : 1;
        }
        ?>
        <b><?php esc_html_e(' Page ','nivo'); echo (int) max( 1, $paged ); esc_html_e(' of ','nivo');?><?php echo (int) $wp_query->max_num_pages;;?></b>
        <?php $big = 999999999; // need an unlikely integer;
        echo str_replace('page-numbers', 'navlinks', paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $curent ),
        'total' =>$wp_query->max_num_pages,
        'prev_text' =>  '&lt; Previous',
        'next_text' => 'Next &gt;',
        ) ) );
        ?>
        </div><!-- /# end pagination -->
        <?php } ?>
        </div>
    </div>
<!-- end content left side -->
<!-- right sidebar starts -->
    <div class="right_sidebar">
        <?php get_sidebar(); ?>
    </div><!-- end right sidebar -->
</div>
<!-- end content area -->
<?php get_footer(); ?>