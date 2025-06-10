<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<?php
		 $custom  = nivo_custom();
	?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
		
			<?php if($custom['favicon']['url']!=''){ ?>
				<link rel="icon" href="<?php echo esc_url($custom['favicon']['url']); ?>" type="image/x-icon">
			<?php } ?>
			<?php if($custom!= null and $custom['apple_icon']['url']!=''){ ?>
			<link rel="apple-touch-icon" href="<?php echo esc_url($custom['apple_icon']['url']); ?>" />
			<?php } ?>
			<?php if($custom!= null and $custom['apple_icon_57']['url']!=''){ ?>
			<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url($custom['apple_icon_57']['url']); ?>">
			<?php } ?>
			<?php if($custom!= null and $custom['apple_icon_72']['url']!=''){ ?>
			<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($custom['apple_icon_72']['url']); ?>">
			<?php } ?>
			<?php if($custom!= null and $custom['apple_icon_114']['url']!=''){ ?>
			<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($custom['apple_icon_114']['url']); ?>">
			<?php } ?>
	<?php } ?>
		
	
	

    <!-- wp_head() -->
    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>>
<div class="site_wrapper">
		<!-- ================================ -->
		<!-- ========== HEADER ========== -->
		<!-- ================================ -->

<header id="header">
        
    <!-- Top header bar -->
    <?php if($custom['top_nav']==true){ ?>
    <div id="topHeader">
      <div class="wrapper">
        <div class="top_nav1">
          <div class="container">          
              <?php if ( is_active_sidebar( 'header-top-left' ) )
                            dynamic_sidebar( 'header-top-left' ); ?>           
            <!-- end left -->           
              <?php if ( is_active_sidebar( 'header-top-right' ) )
                            dynamic_sidebar( 'header-top-right' ); ?>
            <!-- end right --> 
          </div>
        </div>
      </div>
    </div>
    <!-- end top navigation -->
    <?php } ?>
    <div id="trueHeader">
      <div class="wrapper">  
		<div class="container">
			
			<!-- Logo -->
			<div class="logo">
				<?php
					if($custom!= null and $custom['logo']['url']!=''){
						$aq_logo_menu = $custom['logo']['url'];
					}else{
						$aq_logo_menu = NIVO_URI_PATH.'/images/logo.png';
					}
					
					$home_url = home_url('/');
					echo '<a href="'.esc_url($home_url).'"><img alt="'.esc_attr__('Logo','nivo').'" src="'.esc_url($aq_logo_menu).'"></a>';
				?>
			</div>
			
			<!-- Navigation Menu -->
			<div class="menu_main">
				<nav class="navbar navbar-default fhmm">
					<div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><?php esc_html__('Menu', 'nivo'); ?>
                            <i class="fa fa-bars tbars"></i></button>
					</div>
				
				<div id="defaultmenu" class="navbar-collapse collapse">

						<?php $arr = array(
							'theme_location' => 'primary',
							'menu_id' => 'nav',
							'container_class' => '',
							'menu_class'      => 'nav navbar-nav',
							'echo'            => true,
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker' => new wp_bootstrap_navwalker()
						);
						
						if (has_nav_menu('primary') ) {
							wp_nav_menu( $arr );
					} ?>

			</div>
		</nav>
	</div>
</div>
</div>
    </div>

</header>
    
<div class="clearfix"></div>  
<!-- end header -->

<!-- START NAVBAR -->
<!-- END NAVBAR -->
<!-- ================================ -->
<!-- ========== END OF HEADER  ========== -->
<!-- ================================ -->
<?php
	
	nivo_title_bar_blog();
?>