<?php get_header(); $custom  = nivo_custom();
while( have_posts() ) : the_post();
?>
<div class="container" id="content">

<div class="content_left">   	
    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blog_post' ); ?>>	
        <div class="blog_postcontent">
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="image_frame">
                <?php the_post_thumbnail( 'full', array('class'=>'img-responsive') ); ?>
            </div>
        <?php }  else {
            echo '';
        } ?>                         
            <ul class="post_meta_links ">
                <li class="post_date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></li>
				<li class="post_by"> <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author();?></a></li>
				<li class="post_categoty"> <?php the_category(', ');?></li>
				<li class="post_comments"> <a href="<?php echo get_comments_link( 'ID' ); ?>"><?php comments_number( esc_html__( '0 Comments', 'nivo' ), esc_html__( '1 Comment', 'nivo' ), esc_html__( '% Comments ', 'nivo' ) ); ?></a></li>
			</ul>
            
			<div class="clearfix"></div>
			<div class="margin_t2"></div>
			<div class="clearfix main-post">
			<div id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
				<?php the_content(); ?>
			</div>
				<?php wp_link_pages(); ?>

					<?php if(has_tag()){ ?>
						<?php the_tags('<ul class="single-post-tags"><li><span>Tags: </span> </li><li>',' </li>, <li>','</li></ul>'); ?>
					<?php } ?>	
			</div>
        	
        </div>
    </div><!-- /# end post -->
      
    <div class="clearfix divider_dashed1"></div>
    
    <?php if (shortcode_exists('social-link')) { ?>
        <?php echo do_shortcode(esc_attr("[social-link]")); ?>
    <?php } ?>	

    <div class="clearfix"></div>
    <?php if($custom['show_post_author']==true){ ?>
    <?php global $user_ID;
     if (get_the_author_meta('description',$user_ID) ):   ?>                                        
    <?php if( $custom!=null ): ?>
	    <h5 class="light"><?php esc_html_e('About the Author','nivo');?></h5>
	    <div class="about_author">
	        <?php
	        	$avatar = get_user_meta( get_the_author_meta('ID'), '_nivo_user_avatar', true);
	        	if(!empty($avatar)){

	        		echo '<img src="'. $avatar .'" alt="'.esc_attr__('avatar','nivo').'">';
	        	}else{
	        		echo get_avatar(get_the_author_meta( 'ID' ), 80, array('class'=>'img-responsive'));
	        	}
            ?>
                <a href="<?php the_author_link(); ?> "><?php the_author();?></a><br>
	        <div id="abio"><?php	the_author_meta('description');   ?></div>
	    </div><!-- end about author -->
	<?php endif; ?>
   <?php endif; ?>
	    <?php } ?>
	    <div class="clearfix"></div>
    <div class="clearfix margin_t2"></div> 
    <?php if ( comments_open() || get_comments_number() ) {  ?>
	<?php comments_template(); ?>	
	<?php } ?>
    <div class="clearfix margin_t2"></div> 
</div><!-- end content left side -->



<!-- right sidebar starts -->
<div class="right_sidebar">
	<?php get_sidebar(); ?>
</div><!-- end right sidebar -->


</div>
<!-- end content area -->
<?php endwhile; ?>


<?php get_footer(); ?>