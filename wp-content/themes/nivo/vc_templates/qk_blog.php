<?php
$css = '';
extract(shortcode_atts(array(
    'order' => '',
    'show_readmore' => 1,
	'show_pagination' => 0,
	'tpl'=> 'tpl2',
    'readmore' => '',
    'cat_id' => ''
), $atts));

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$order = $order > 0 ? (int)$order  : -1;
$args = array('posts_per_page' => $order,'paged'=>$paged, 'cat' => $cat_id );
$blog = new WP_Query($args);
if( $blog->have_posts() ):
ob_start();
?>
<?php if($tpl == 'tpl1'):
wp_enqueue_style('cubeportfolio');
$i = 0;
?>
<?php while($blog->have_posts()) : $blog->the_post();
	if( $i > 0 ):

?>
	<div class="clearfix divider_dashed1"></div>
<?php endif;?>
	<div class="blog_post">	
		<div class="blog_postcontent">
        <?php if ( has_post_thumbnail() ) { ?>
			<div class="image_frame">
                <a href="<?php the_permalink();?>"><?php echo the_post_thumbnail();?></a>
			</div>
        <?php }  else {
            echo '';
        } ?>
				<h3 class="blog_post_f"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<ul class="post_meta_links">
                    <li class="post_date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></li>
                    <li class="post_by"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author();?></a></li>
					<li class="post_categoty"><?php the_category(', ');?></li>
					<li class="post_comments"><a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a></li>
				</ul>
				<div class="clearfix"></div>
				<div class="margin_t1"></div>
			<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>"><?php echo esc_attr($readmore);?></a>
		</div>
	</div>
<?php $i++;endwhile; wp_reset_postdata(); ?>
<div class="clearfix divider_line13 margin_top4 lessm"></div>
<div>
	<div class="pagination center">
	 <?php if( $show_pagination && $blog->max_num_pages > 1 ){
		 ?>
	<b><?php esc_html_e(' Page ','nivo'); echo (int) max( 1, $paged ); esc_html_e(' of ','nivo');?><?php echo (int) $blog->max_num_pages;?></b>
	<?php $big = 999999999; // need an unlikely integer;
		echo str_replace('page-numbers', 'navlinks', paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' =>$blog->max_num_pages,
				'prev_text' =>  '&lt; Previous',
				'next_text' => 'Next &gt;',
			) ) );
	?>
		<?php } ?>
	</div><!-- /# end pagination -->
</div>
<?php endif;
if($tpl == 'tpl2'):
wp_enqueue_style('cubeportfolio');
$i=0;
?>
<?php while($blog->have_posts()) : $blog->the_post();
	if( $i > 0 ):
?>
	
<?php endif;?>
	<div class="blog_post">	
		<div class="blog_postcontent">
            <?php if ( has_post_thumbnail() ) { ?>
			<div class="image_frame">
				<a href="<?php   the_permalink();?>"><?php  echo the_post_thumbnail();?>
				</a>
			</div>
            <?php }  else {
            echo '';
        } ?>
			<h3 class="blog_post_f"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<ul class="post_meta_links">
                            <li class="post_date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></li>
                            <li class="post_by"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author();?></a></li>
							<li class="post_categoty"> <?php the_category(', ');?></li>
							<li class="post_comments"> <a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a></li>
						</ul>
			 <div class="clearfix"></div>
			 <div class="margin_top1"></div>
            <div class="post_info_content"><?php the_excerpt(); ?></div><a href="<?php the_permalink(); ?>"><?php echo esc_attr( $readmore );?></a>
		</div>
	</div>
<div class="clearfix margin_t4"></div>
	<?php $i++; endwhile; wp_reset_postdata(); ?>
	
	<div>
	<div class="pagination center">
	 <?php if( $show_pagination && $blog->max_num_pages > 1 ){
		 ?>
	<b><?php esc_html_e(' Page ','nivo'); echo (int) max( 1, $paged ); esc_html_e(' of ','nivo');?><?php echo (int) $blog->max_num_pages;?></b>
	<?php $big = 999999999; // need an unlikely integer;
		echo str_replace('page-numbers', 'navlinks', paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' =>$blog->max_num_pages,
				'prev_text' =>  '&lt; Previous',
				'next_text' => 'Next &gt;',
			) ) );
	?>
	<?php } ?>
	</div><!-- /# end pagination -->
</div>
<?php endif;
if($tpl == 'tpl3'):
	wp_enqueue_style('cubeportfolio');
$i=0;
?>
<?php while($blog->have_posts()) : $blog->the_post(); 
if( $i > 0):
?>
<?php endif;?>
		<div class="blog_post">	
			<div class="blog_postcontent">
            <?php if ( has_post_thumbnail() ) { ?>
				<div class="image_frame small">
                    <a href="<?php the_permalink();?>"><?php  echo the_post_thumbnail( 'nivo-img_555', array('class'=>'blog-photo') );?></a>
				</div>
            <?php }  else {
                echo '';
            } ?>
                <div class="post_info_content_small">
				<h3 class="blog_post_f"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<ul class="post_meta_links_small">
                        <li class="post_date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></li>
                        <li class="post_by"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author();?></a></li>
				        <li class="post_categoty"> <?php the_category(', ');?></li>
				        <li class="post_comments"> <a href="<?php echo get_comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a></li>
					</ul>
				<div class="clearfix"></div>
				<div class="margin_top1"></div>
				<?php the_excerpt(); ?><a href="<?php the_permalink(); ?>"><?php echo esc_attr( $readmore );?></a>
                </div>
			</div>
		</div>
<div class="clearfix divider_dashed1"></div>
	<?php $i++; endwhile; wp_reset_postdata(); ?>

<div>
	<div class="pagination center">
	 <?php if( $show_pagination && $blog->max_num_pages > 1 ){
		 ?>
	<b><?php esc_html_e(' Page ','nivo'); echo (int) max( 1, $paged ); esc_html_e(' of ','nivo');?><?php echo (int) $blog->max_num_pages;?></b>
	<?php $big = 999999999; // need an unlikely integer;
		echo str_replace('page-numbers', 'navlinks', paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' =>$blog->max_num_pages,
                'prev_text' =>  '&lt; Previous',
				'next_text' => 'Next &gt;',
			) ) );
	?>
		<?php } ?>
	</div><!-- /# end pagination -->
</div>

<?php endif;
if($tpl == 'tpl4'):
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

<div>
	<div class="pagination center">
	 <?php if( $show_pagination && $blog->max_num_pages > 1 ){
		 ?>
	<b><?php esc_html_e(' Page ','nivo'); echo (int) max( 1, $paged ); esc_html_e(' of ','nivo');?><?php echo (int) $blog->max_num_pages;?></b>
	<?php $big = 999999999; // need an unlikely integer;
		echo str_replace('page-numbers', 'navlinks', paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'total' =>$blog->max_num_pages,
				'prev_text' =>  '&lt; Previous',
				'next_text' => 'Next &gt;',
			) ) );
	?>
		<?php } ?>
	</div><!-- /# end pagination -->
</div>

<?php endif;
endif;
echo ob_get_clean(); 