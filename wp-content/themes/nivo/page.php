<?php 
get_header(); $custom  = nivo_custom();?>

<?php while( have_posts() ) : the_post();
?>
<div class="container" id="content">
        	
    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blog_post' ); ?>>	
        <div class="blog_postcontent">
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="image_frame">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full', array('class'=>'img-responsive') ); ?></a>
            </div>
        <?php }  else {
            echo '';
        } ?>        
			<div class="clearfix"></div>
			<div class="margin_top1"></div>
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
        
    <div class="clearfix divider_line1"></div>
	
	    
	    <?php if ( comments_open() || get_comments_number() ) {  ?>
		<?php comments_template(); ?>	
		<div class="clearfix mar_top2"></div>  
		<?php } ?>

</div>
<!-- end content area -->
<?php endwhile; ?>

<?php get_footer(); ?>