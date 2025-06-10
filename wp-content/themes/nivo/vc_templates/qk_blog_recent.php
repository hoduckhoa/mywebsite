<?php
$css = '';
extract(shortcode_atts(array(
	'tpl' => 'tpl1',
	'order' => '',
	'el_class' => ''
), $atts));
$order = $order > 0 ? (int) $order : -1;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'post_type'=>'post',
     'category_name' =>'recent-blog',
	'posts_per_page' => $order,
	'paged'=>$paged
);
$blog = new WP_Query($args);
if( $blog->have_posts() ):
ob_start();
?>
<?php if($tpl == 'tpl1'):
	wp_enqueue_style('cubeportfolio');
?>
<?php $i = 1; ?>
<?php while($blog->have_posts()) : $blog->the_post(); ?>

<?php
//Show the left hand side column
if($i == 1) :
?>
		<div class="one_third">	
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php  echo the_post_thumbnail( 'nivo-img_555', array('class'=>'rimg') );?> 
                <?php }  else {
                    echo '';
                } ?>          
                <div class="cont">
                <h4><?php the_title(); ?></h4>                    
                <a href="<?php the_permalink();?>" class="date"> <?php the_date() ?> </a>&nbsp;
				<a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a>
                <div class="clearfix margin_t2"></div>
				<?php the_excerpt(); ?>
                </div>	
		</div>
<?php
//Show the middle column
elseif($i == 2) :
?>
		<div class="one_third">	
                <div class="cont">
                <h4><?php the_title(); ?></h4>                    
                <a href="<?php the_permalink();?>" class="date"><?php the_date() ?> </a>&nbsp;
				<a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a>
                <div class="clearfix margin_t2"></div>
				<?php the_excerpt(); ?>
                </div>	
                <?php if ( has_post_thumbnail() ) { ?>
                <?php  echo the_post_thumbnail( 'nivo-img_555', array('class'=>'rimg') );?>
                <?php }  else {
                    echo '';
                 } ?>
		</div>
<?php
//Show the right hand side column
elseif($i == 3) :
?>
		<div class="one_third last">
                <?php if ( has_post_thumbnail() ) { ?>
                <?php  echo the_post_thumbnail( 'nivo-img_555', array('class'=>'rimg') );?>
                <?php }  else {
                    echo '';
                } ?>            
                <div class="cont">
                <h4><?php the_title(); ?></h4>                    
                <a href="<?php the_permalink();?>" class="date"><?php the_date() ?> </a>&nbsp;
				<a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a>
                <div class="clearfix margin_t2"></div>
				<?php the_excerpt(); ?>
                </div>	
		</div>
   <div class="clearfix margin_t2"></div>
<?php endif; ?>

<?php $i = ($i == 3) ? 1 : ($i + 1);?>

<?php endwhile; wp_reset_postdata();
        ?>
<?php endif;
endif;
echo ob_get_clean();