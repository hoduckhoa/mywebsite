<?php
extract(shortcode_atts(array(
	'order' => '',
    'tpl'      => '',
    'post_type' => 'panel',
    'el_class' => ''
), $atts));

wp_enqueue_style( 'accordion' );
wp_enqueue_script('accordion-custom-aaaa');


$class   = array('');
$class[] = $el_class;
$class[] = $tpl;
$order = $order > 0 ? (int)$order : -1;
$args           = array(
    'post_type'      => $post_type,
    'posts_per_page' => $order,
    'post_status'    => 'publish',
    'order'             => 'ASC'
);
$p = new WP_Query($args);
?>
<div class="<?php echo esc_attr( implode(' ', $class ) );?>">

        <?php while( $p->have_posts() ) : $p->the_post(); ?>
     <span class="acc-trigger">
            <a href="#">
                <?php the_title();?></a></span>
    
            <div class="acc-container">
                <div class="content"> <?php the_content();?></div>
            </div>

        <?php endwhile; wp_reset_postdata(); ?>
        <!-- end section -->

</div><!--st-accordion-four-->