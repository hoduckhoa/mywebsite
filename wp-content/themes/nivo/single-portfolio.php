<?php get_header();
while(have_posts()) : the_post();
?>
    <!-- START PORTFOLIO SINGLE PROJECT -->

<div class="container" id="content">
<div class="clearfix margin_t6"></div>
    <div class="portfolio_area">
    <div class="container">
    <div class="portfolio_area_left">
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink();?>">
			<?php the_post_thumbnail( '' ); ?>  
		</a>
    <?php }  else {
        echo '';
    } ?>
    </div>
	<div class="portfolio_area_right">
        <?php the_content(); ?>
		<a href="#" class="addto_favorites"><i class="fa fa-heart"></i>&nbsp; <?php esc_html_e('Add to Favorites','nivo');?></a>
		 <?php $metas = array('author','socials','date', 'url');
			$details = array();
			foreach( $metas as $key ){
				$details[$key] = get_post_meta( get_the_ID(), '_nivo_pf_'. $key, true );
			}
		 ?>
        <ul class="small_social_links">
            <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>">&nbsp;<i class="fa fa-facebook"></i>&nbsp;</a></li>
            <li><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?><?php ?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $media = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); if( $media ) echo esc_url( $media[0] );?> "><i class="fa fa-pinterest"></i></a></li>
        </ul>
		<div class="project_details"> 
            <h5><?php esc_html_e('Project Details','nivo');?></h5>
			<?php if( !empty( $details['date']) ): ?>
            <span><strong><?php esc_html_e('Date','nivo'); ?></strong> <em><?php echo date("d M, Y", strtotime($details['date']));?></em></span>
			<?php endif;?>
            <span><strong><?php esc_html_e('Categories','nivo'); ?></strong> <em><?php the_terms(get_the_ID(), 'portfolio_category', '', ' '); ?> </em></span> 
			<?php if( !empty( $details['author']) ): ?>
            <span><strong><?php esc_html_e('Author','nivo'); ?></strong> <em><?php echo esc_attr( $details['author'] );?></em></span>
			<?php endif;?>
            <div class="clearfix margin_t5"></div>
			<?php if( !empty( $details['url']) ): ?>
            <a href="<?php echo esc_url( $details['url']) ?>" class="but_medium1"><i class="fa fa-hand-o-right fa-lg"></i>&nbsp; <?php esc_html_e('Visit Site','nivo');?></a>
			<?php endif;?>
        </div> 
	</div>
        </div>
    </div>
<div class="clearfix margin_t6"></div>    
	</div>
              
    <!-- END CONTACT -->
<?php endwhile; ?>
<?php get_footer(); ?>