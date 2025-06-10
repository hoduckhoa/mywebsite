<?php

	extract(shortcode_atts(array(

		'tpl' =>'tpl1',
		
	    'el_class' => '',

		'show_filter' => 0,
		
		'show_more_info' =>0,
		
		'more_info_text' =>'more info', 
		
		'show_view_larger' =>0,
		
		'view_larger_text' =>'view larger',
        
        'single_port_id' =>'',
		
		'orderby' =>'',
		
		'order' =>'',

		'posts_per_page' => 9,

	), $atts));

// Column 2, 3 Portfolio

if($tpl =='tpl2' || $tpl =='tpl1' || $tpl =='tpl4' || $tpl =='tpl5') {
    
	wp_enqueue_style('cubeportfolio');
	
	if($tpl == 'tpl2') {
        wp_enqueue_script( 'cubeportfolio');
		wp_enqueue_script( 'cubeportfolio-main3' );
	}
	
	if($tpl == 'tpl1') {

		wp_enqueue_script( 'cubeportfolio');		
		wp_enqueue_script( 'cubeportfolio-main3');
	}
	
	if($tpl == 'tpl4') {
        wp_enqueue_script( 'cubeportfolio');
		wp_enqueue_script( 'cubeportfolio-main2' );
	}
	
	if($tpl == 'tpl5') {
		wp_enqueue_script( 'cubeportfolio');
		wp_enqueue_script( 'cubeportfolio-main2' );
        
	}
		
	$class = array();
	
    $class[] =$el_class;
	
	$posts_per_page = $posts_per_page > 0 ? (int)$posts_per_page : -1;

	$paged = (int) is_front_page() ? (get_query_var('page') ? get_query_var('page') : 1 ) : (get_query_var('paged') ? get_query_var('paged') : 1);

	$args = array(
	    'post_type' => 'portfolio',

		'paged' => $paged,

		'posts_per_page' =>$posts_per_page,
        
        'orderby' =>$orderby,
		
		'order' =>$order,

	    'post_status' => 'publish'
	);

    $p = new WP_Query($args);	

?>
<div class="portfolio_sec2">

<div class="container">
<?php if ($show_filter){ ?>
	<div id="filters-container" class="cbp-l-filters-alignCenter">

		 <button data-filter="*" class="cbp-filter-item-active cbp-filter-item"><?php esc_html_e('All', 'nivo');?></button>

		<?php

		

		$terms = get_terms('portfolio_category');

		$cate = array();

		if ( !empty( $terms ) && !is_wp_error( $terms ) ){

			foreach ( $terms as $term ) {

			?>

				<button class="cbp-filter-item" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></button>	

			<?php

			}

		}

	?>

	</div>
<?php }
	
 ?>
	<!-- END PORTFOLIO FILTER-->

	<div id="grid-container" class="cbp-l-grid-projects <?php if($tpl =='tpl2' || $tpl =='tpl5') echo 'two';?>">
<ul>
	<?php while ( $p->have_posts() ) { $p->the_post();

	

			$terms = get_the_terms( get_the_ID(),'portfolio_category');

			$cate = array();

			if ( !empty( $terms ) && !is_wp_error( $terms ) ){

				foreach ( $terms as $term ) {

					$cate[] = $term->slug;

				}

			}

		if ( has_post_thumbnail() ){?>

		<li class="cbp-item <?php echo esc_attr(implode(' ', $cate));?> ">

				<?php 

				$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'nivo-img_440' );

				$img = $image_attributes[0]; ?>
			<div class="cbp-caption <?php if($tpl !='tpl3' and $tpl !='tpl6'){ ?> cbp-lightbox <?php } ?>">
				<div class="cbp-caption-defaultWrap">
					<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
				</div>
				<div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                           <?php if($tpl =='tpl1' || $tpl =='tpl2'){?>
                                <a href="<?php the_permalink();?>" class="cbp-l-caption-buttonLeft" rel="nofollow"><?php echo esc_html($more_info_text)?></a>
								<a href="<?php echo esc_url($img); ?>" class="cbp-lightbox cbp-l-caption-buttonRight"><?php echo esc_html($view_larger_text)?></a>
						   <?php } else if($tpl =='tpl4' || $tpl =='tpl5' ){?>
								<a href="<?php the_permalink();?>" class="cbp-l-caption-buttonLeft" rel="nofollow"><?php echo esc_html($more_info_text)?></a>
								<a href="<?php echo esc_url($img); ?>" class="cbp-lightbox cbp-l-caption-buttonRight"><?php echo esc_html($view_larger_text)?></a>
								
							<?php } ?>
                        </div>
                    </div>
                </div>
			</div>
            
            <div class="threeborder">
              <div class="cbp-l-grid-projects-title"><?php echo the_title();?></div>
              <div class="cbp-l-grid-projects-desc"><?php echo the_excerpt();?></div>
            </div>
            
		</li> <!--work item-->

		<?php }

	} ?>			
</ul>
	</div> <!--/.grid-->

 </div><!-- END ROW-->
</div>

<?php } ?>

<!-- Column 1 left and right Portfolio -->

<?php if($tpl == 'tpl3') { 
     
     	$args = array(
	    'post_type' => 'portfolio',

		'p' => $single_port_id,

		'posts_per_page' =>'1',

	    'post_status' => 'publish'
	);

    $p = new WP_Query($args);
     
     while( $p->have_posts()) : $p->the_post();
?>
    <!-- START PORTFOLIO SINGLE PROJECT -->

<div class="container">
<div class="clearfix margin_t6"></div>
    <div class="portfolio_area">
    <div class="container">

	<div class="portfolio_area_right2">
		<h4><?php the_title();?></h4>
        <?php the_content(); ?>
		<a href="#" class="addto_favorites"><i class="fa fa-heart"></i>&nbsp; <?php esc_html_e('Add to Favorites','nivo');?></a>
		 <?php $metas = array('author','socials','date', 'url');
			$details = array();
			foreach( $metas as $key ){
				$details[$key] = get_post_meta( get_the_ID(), '_nivo_pf_'. $key, true );
			}
		 ?>
        <ul class="small_social_links">
            <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
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
        
        <div class="portfolio_area_left2">
        <?php if ( has_post_thumbnail() ) { ?>
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail( '' ); ?>  
            </a>
        <?php }  else {
            echo '';
        } ?>
    </div>
        
        </div>
    </div>
<div class="clearfix margin_t6"></div>
	</div>
              
    <!-- END CONTACT -->
<?php endwhile; ?>

<?php } ?>

<?php if($tpl == 'tpl6') { 
     
     	$args = array(
	    'post_type' => 'portfolio',

		'p' => $single_port_id,

		'posts_per_page' =>'1',

	    'post_status' => 'publish'
	);

    $p = new WP_Query($args);
     
     while( $p->have_posts()) : $p->the_post();
?>
    <!-- START PORTFOLIO SINGLE PROJECT -->

<div class="container">
<div class="clearfix margin_t6"></div>
    <div class="portfolio_area">
    <div class="container">
    <div class="portfolio_area_left1">
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink();?>">
			<?php the_post_thumbnail( '' ); ?>  
		</a>
    <?php }  else {
        echo '';
    } ?>
    </div>
	<div class="portfolio_area_right1">
		<h4><?php the_title();?></h4>
        <?php the_content(); ?>
		<a href="#" class="addto_favorites"><i class="fa fa-heart"></i>&nbsp; <?php esc_html_e('Add to Favorites','nivo');?></a>
		 <?php $metas = array('author','socials','date', 'url');
			$details = array();
			foreach( $metas as $key ){
				$details[$key] = get_post_meta( get_the_ID(), '_nivo_pf_'. $key, true );
			}
		 ?>
        <ul class="small_social_links">
            <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a></li>
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

<?php } ?>
     
     
     
     