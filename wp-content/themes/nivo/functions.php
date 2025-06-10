<?php
// text domain
if( ! defined('NIVO_URI_PATH') ) define('NIVO_URI_PATH', get_template_directory_uri() );
if( ! defined('NIVO_ABS_PATH') ) define('NIVO_ABS_PATH', get_template_directory() );
if( ! defined('NIVO_ABS_FR') ) define('NIVO_ABS_FR', NIVO_ABS_PATH.'/framework');
if( ! defined('NIVO_URI_ASSETS') ) define('NIVO_URI_ASSETS', NIVO_URI_PATH.'/assets');
if( ! defined('NIVO_URI_UPLOAD') ) define('NIVO_URI_UPLOAD', NIVO_URI_PATH.'/upload');


add_action('init', 'nivo_lib_requirement');
require_once NIVO_ABS_FR .'/custom-functions.php';
require_once NIVO_ABS_FR .'/metabox-functions.php';
require_once NIVO_ABS_FR .'/theme-configs.php';
if( function_exists('vc_set_shortcodes_templates_dir')){
  $dir = NIVO_ABS_PATH . '/vc_templates';
  vc_set_shortcodes_templates_dir( $dir );
}

function nivo_setup()
{
    load_theme_textdomain( 'nivo', get_template_directory() . '/languages' );
     
    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    add_image_size( 'nivo-img_440', 440, 330, true );
    add_image_size( 'nivo-img_257', 257, 318, true );
    add_image_size( 'nivo-img_257', 194, 98, true );
    add_image_size( 'nivo-img_65', 65, 45, true );
    add_image_size( 'nivo-img_285', 285, 127, true );
    add_image_size( 'nivo-img_555', 555, 247, true );
    
    register_nav_menus(array(

        'primary'     => esc_html__('Main Navigation', 'nivo'),
        'one_page'     => esc_html__('Menu One Page', 'nivo'),

    ));

    /*

     * Switch default core markup for search form, comment form, and comments

     * to output valid HTML5.

     */

    add_theme_support('html5', array(

        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',

    ));


    add_theme_support('woocommerce');


    /*

     * Enable support for Post Formats.

     * See http://codex.wordpress.org/Post_Formats

     */


    add_theme_support('custom-header');

    add_theme_support('custom-background');

}

add_action('after_setup_theme', 'nivo_setup');

// set content width

if (!isset($content_width)) {

    $content_width = 875;

}

function nivo_lib_requirement(){
  require_once NIVO_ABS_FR .'/wp_bootstrap_navwalker.php';
  if(function_exists('vc_add_param')){
    require_once NIVO_ABS_PATH . '/vc_functions.php';
  }
}

// register sidebar
function nivo_widgets_init() {  
  register_sidebar( array(
    'name'          => esc_html__( 'Main Sidebar', 'nivo' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here to appear on Main Sidebar.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="widget sidebar_widget %2$s">',
    'after_widget'  => '</div><div class="clearfix margin_t4"></div>',
    'before_title'  => '<div class="sidebar_title"><h4>',
    'after_title'   => '</h4></div>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Header top left', 'nivo' ),
    'id'            => 'header-top-left',
    'description'   => esc_html__( 'Add widgets here to appear on Header Top Left.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="left widget wow fadeInRight %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="wg-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Header top right', 'nivo' ),
    'id'            => 'header-top-right',
    'description'   => esc_html__( 'Add widgets here to appear on Header Top Right.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="right widget wow fadeInRight %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="wg-title">',
    'after_title'   => '</h3>',
  ) );


  register_sidebar( array(
    'name'          => esc_html__( 'Footer 1', 'nivo' ),
    'id'            => 'footer-1',
    'description'   => esc_html__( 'Add widgets here to appear on Footer 1.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="single-widget widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="nocaps">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer 2', 'nivo' ),
    'id'            => 'footer-2',
    'description'   => esc_html__( 'Add widgets here to appear on Footer 2.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="single-widget widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="lmb nocaps">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer 3', 'nivo' ),
    'id'            => 'footer-3',
    'description'   => esc_html__( 'Add widgets here to appear on Footer 3.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="single-widget widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="nocaps">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => esc_html__( 'Footer 4', 'nivo' ),
    'id'            => 'footer-4',
    'description'   => esc_html__( 'Add widgets here to appear on Footer 4.', 'nivo' ),
    'before_widget' => '<div id="%1$s" class="single-widget widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="lmb nocaps">',
    'after_title'   => '</h3>',
  ) );


}
add_action( 'widgets_init', 'nivo_widgets_init' );


function nivo_theme_scripts_styles() {
  global $wp_scripts, $aq_theme_options;
  
   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    wp_enqueue_script( 'comment-reply' );
  }
    
  // include style
  
  wp_enqueue_style( "shortcodes", NIVO_URI_ASSETS .'/css/shortcodes.css');
  wp_enqueue_style( "responsive-leyouts", NIVO_URI_ASSETS .'/css/responsive-leyouts.css');
  wp_enqueue_style( "reset", NIVO_URI_ASSETS .'/css/reset.css');
  wp_enqueue_style( "bootstrap", NIVO_URI_ASSETS .'/css/mainmenu/bootstrap.css');
  wp_enqueue_style( "fhmm", NIVO_URI_ASSETS .'/css/mainmenu/fhmm.css');
  wp_enqueue_style( "sticky", NIVO_URI_ASSETS .'/css/mainmenu/sticky.css');
  wp_enqueue_style( "skin", NIVO_URI_ASSETS .'/css/carousel/skin.css');
  wp_enqueue_style( "font-awesome", NIVO_URI_ASSETS ."/css/font-awesome/css/font-awesome.min.css" );
  wp_enqueue_style( "animations", NIVO_URI_ASSETS ."/css/animations/animations.min.css" );
  wp_enqueue_style( "owl-carousel", NIVO_URI_ASSETS .'/css/carouselowl/owl.carousel.css');
  wp_enqueue_style( "owl-transitions", NIVO_URI_ASSETS .'/css/carouselowl/owl.transitions.css');
  wp_enqueue_style( "flexslidermy", NIVO_URI_ASSETS .'/css/carousel/flexslider.css');
    

  //special style

  wp_register_style( "accordion", NIVO_URI_ASSETS .'/css/accordion/accordion.css');
  wp_register_style( "cubeportfolio", NIVO_URI_ASSETS .'/css/cubeportfolio/cubeportfolio.min.css');
  
  
 
  // commont style

  wp_enqueue_style('nivo_style', get_stylesheet_uri() );

  // include js wp_js//wp_js_min
  // ie + common js
 
  wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9');
  wp_script_add_data( 'respond', 'conditional', 'lt IE 9');
  wp_enqueue_script("animations", NIVO_URI_PATH ."/assets/js/animations/animations.min.js",array('jquery'),false,true);
  wp_enqueue_script("totop", NIVO_URI_PATH ."/assets/js/scrolltotop/totop.js",array('jquery'),false,true);

  // special js
   
  wp_enqueue_script( 'bootstrap', NIVO_URI_ASSETS .'/js/mainmenu/bootstrap.min.js', array('jquery'), false, true);
  wp_enqueue_script( 'fhmm', NIVO_URI_ASSETS .'/js/mainmenu/fhmm.js', array('jquery'), false, true);
  wp_enqueue_script( 'flexslider', NIVO_URI_ASSETS .'/js/carousel/jquery.flexslider.js', array('jquery'), false, true);
  wp_enqueue_script( 'carousel-custom', NIVO_URI_ASSETS .'/js/carousel/custom.js', array('flexslider'), false, true);
  wp_enqueue_script( 'modernizr', NIVO_URI_ASSETS .'/js/mainmenu/modernizr.custom.75180.js', array('jquery'), false, true);
  wp_enqueue_script( 'sticky', NIVO_URI_ASSETS .'/js/mainmenu/sticky.js', array('jquery'), false, true);
  wp_enqueue_script( 'accordion-aaaa', NIVO_URI_ASSETS .'/js/accordion/jquery.accordion.js', array('jquery'), false, true);
  wp_enqueue_script( 'owl-carousel', NIVO_URI_ASSETS .'/js/carouselowl/owl.carousel.js', array('jquery'), false, true);
    
  wp_register_script( 'cubeportfolio', NIVO_URI_ASSETS .'/js/cubeportfolio/jquery.cubeportfolio.min.js', array('jquery'), false, true);
  wp_register_script( 'main5', NIVO_URI_ASSETS .'/js/cubeportfolio/main5.js', array('jquery'), false, true);
  wp_register_script( 'cubeportfolio-main', NIVO_URI_ASSETS .'/js/cubeportfolio/main.js', array('cubeportfolio'), false, true);
  wp_register_script( 'cubeportfolio-main2', NIVO_URI_ASSETS .'/js/cubeportfolio/main2.js', array('cubeportfolio'), false, true);
  wp_register_script( 'cubeportfolio-main3', NIVO_URI_ASSETS .'/js/cubeportfolio/main3.js', array('cubeportfolio'), false, true);
  wp_register_script( 'classyloader', NIVO_URI_ASSETS .'/js/classyloader/jquery.classyloader.min.js', array('jquery'), false, true);
  wp_register_script( 'accordion-custom-aaaa', NIVO_URI_ASSETS .'/js/accordion/custom.js', array('accordion'), false, true);   
  
}
add_action( 'wp_enqueue_scripts', 'nivo_theme_scripts_styles' );


// hextorgb

function nivo_hex2rgb($hex)
{

    $hex = str_replace("#", "", $hex);

    if (strlen($hex) == 3) {

        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));

        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));

        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));

    } else {

        $r = hexdec(substr($hex, 0, 2));

        $g = hexdec(substr($hex, 2, 2));

        $b = hexdec(substr($hex, 4, 2));

    }

    $rgb = array($r, $g, $b);

    return $rgb; // returns an array with the rgb values

}

//Custom Excerpt Function

function nivo_excerpt($limit = 30, $more = '...')
{

    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {

        array_pop($excerpt);

        $excerpt = implode(" ", $excerpt) . $more;

    } else {

        $excerpt = implode(" ", $excerpt);

    }

    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);

    return $excerpt;

}

// custom excpert length

function nivo_excerpt_length($length)
{

    return 250;

}

add_filter('excerpt_length', 'nivo_excerpt_length', 999);

//pagination

function nivo_pagination($prev = 'Prev', $next = 'Next', $pages = '')
{

    global $wp_query, $wp_rewrite, $textdomain;

    $current = $wp_query->query_vars['paged'] > 1 ? $wp_query->query_vars['paged'] : 1;

    if ($pages == '') {

        global $wp_query;

        $pages = $wp_query->max_num_pages;

        if (!$pages) {

            $pages = 1;

        }

    }

    $pagination = array(

        'base'      => str_replace(999999999, '%#%', get_pagenum_link(999999999)),

        'format'    => '',

        'current'   => $current,

        'total'     => $pages,

        'prev_text' => $prev,

        'next_text' => $next,

        'type'      => 'list',

    );

    if ($wp_rewrite->using_permalinks()) {

        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

    }

    if (!empty($wp_query->query_vars['s'])) {
        $pagination['add_args'] = array('s' => get_query_var('s'));
    }

    $return = paginate_links($pagination);

    echo esc_html($return);

}

//Custom comment List:

function nivo_theme_comment($comment, $args, $depth){
  global $comment;
  $class ='comment_wrap';
  if( $depth > 1){
    $class .=' chaild';
  }
  ?>
  <div <?php comment_class( $class );?> id="comment-<?php comment_ID()?>">
    <div class="gravatar">
      <?php

          $avatar = get_user_meta( $comment->user_id, '_nivo_user_avatar', true);
        if( $comment->user_id!='0' and ! empty( $avatar ) ){

          echo '<img src="'. esc_url($avatar) .'" alt="'.esc_attr__('avatar','nivo').'">';
        }else{
          echo get_avatar($comment);
        }
      ?>
    </div>
    <div class="comment_content">
      <div class="comment_meta">

        <div class="comment_author"><?php printf('%s - <i>%s</i>', get_comment_author_link(),  get_comment_date()) ?></div>                   
      </div>
      <div class="comment_text">
        <?php
          comment_text();
          echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth']));
        ?>
      </div>
    </div>

<?php

}

function nivo_theme_pings($comment, $args, $depth){
  global $comment;
  $class ='comment_wrap';
  if( $depth > 1){
    $class .=' chaild';
  }
  ?>
  <div <?php comment_class( $class );?> id="comment-<?php comment_ID()?>">
    <div class="gravatar">
      <?php

          $avatar = get_user_meta( $comment->user_id, '_nivo_user_avatar', true);
        if( $comment->user_id!='0' and ! empty( $avatar ) ){

          echo '<img src="'. esc_url($avatar) .'" alt="'.esc_attr__('avatar','nivo').'">';
        }else{
          echo get_avatar($comment);
        }
      ?>
    </div>
    <div class="comment_content">
      <div class="comment_meta">

        <div class="comment_author"><?php printf('%s - <i>%s</i>', get_comment_author_link(),  get_comment_date()) ?></div>                   
      </div>
      <div class="comment_text">
        <?php
          comment_text();
          echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth']));
        ?>
      </div>
    </div>

<?php

}

if (function_exists('vc_add_param')) {

    $lists_animate = array(__('choose type animate', 'nivo') => '', esc_html__('bounceIn', 'nivo') => 'bounceIn', esc_html__('flipOutX', 'nivo') => 'flipOutX', esc_html__('flipInY', 'nivo') => 'flipInY', esc_html__('fadeIn', 'nivo') => 'fadeIn', esc_html__('fadeInUp', 'nivo') => 'fadeInUp', esc_html__('fadeInDown', 'nivo') => 'fadeInDown', esc_html__('fadeInLeft', 'nivo') => 'fadeInLeft', esc_html__('fadeInRight', 'nivo') => 'fadeInRight', esc_html__('pulse', 'nivo') => 'pulse', esc_html__('rollIn', 'nivo') => 'rollIn', esc_html__('rotateIn', 'nivo') => 'rotateIn');

    vc_add_param('vc_row', array(

        "type"        => "textfield",

        "heading"     => esc_html__('Section ID', 'nivo'),

        "param_name"  => "el_id",

        "value"       => "",

        "description" => esc_html__("Set ID section", "nivo"),

    ));

    vc_add_param('vc_row', array(

        "type"        => "dropdown",

        "heading"     => "",

        "param_name"  => "animate",

        "value"       => $lists_animate,

        "std"         => '',

        "description" => esc_html__("Choose type animate", 'nivo'),

    ));

}




/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme nivo for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nivo_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function nivo_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
             // This is an example of how to include a plugin from a private repo in your theme.

        array(            
            'name'               => esc_html__('WPBakery Visual Composer','nivo'), // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => esc_html__('Revolution Slider','nivo'), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(            
            'name'               => esc_html__('QK Register Post Type','nivo'), // The plugin name.
            'slug'               => 'qk-post_type', // The plugin slug (typically the folder name).
            'source'             => esc_url('http://nivowp.joomlastars.co.in/plugins/qk-post_type.zip'), // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ), array(            
            'name'               => esc_html__('QK Import','nivo'), // The plugin name.
            'slug'               => 'qk-import', // The plugin slug (typically the folder name).
            'source'             => esc_url('http://nivowp.joomlastars.co.in/plugins/qk-import.zip'), // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),array(            
            'name'               => esc_html__('QK Custom Functions','nivo'), // The plugin name.
            'slug'               => 'qk-custom-functions', // The plugin slug (typically the folder name).
            'source'             => esc_url('http://nivowp.joomlastars.co.in/plugins/qk-custom-functions.zip'), // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_html__('Redux Framework','nivo'),
            'slug'      => 'redux-framework',
            'required'  => true,
        ),array(
            'name'      => esc_html__('CMB2','nivo'),
            'slug'      => 'cmb2',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__('Contact Form 7','nivo'),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
        
        array(
            'name'      => esc_html__('MailChimp for WordPress','nivo'),
            'slug'      => 'mailchimp-for-wp',
            'required'  => true,
        ),
        
        
    );

  

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'nivo-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'nivo' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'nivo' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'nivo' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'nivo' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'nivo' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'nivo' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'nivo' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'nivo' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'nivo' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'nivo' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'nivo' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'nivo' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'nivo' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'nivo' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'nivo' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'nivo' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'nivo' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}



add_action('wp_ajax_render_portfolio_grid', 'nivo_render_portfolio_grid');
add_action('wp_ajax_nopriv_render_portfolio_grid', 'nivo_render_portfolio_grid');
function nivo_render_portfolio_grid()
{
    extract($_POST['params']);
    $category = $portfolio_category;
    $paged = ($_POST['paged']) > 0 ? (int) $_POST['paged'] : 1;
    $args = array(
        'post_type'      => 'portfolio',
        'paged'          => $paged,
        'posts_per_page' => $posts_per_page,
        'post_status'    => 'publish',
    );
    foreach ($args as $k => $v) {

        if (isset($atts[$k])) {
            unset($atts[$k]);
        }
    }
    $p = new WP_Query($args);
    ob_start();
    while ($p->have_posts()) {
        $p->the_post();
        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
        $cate = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $cate[] = $term->name;
            }
        }
        if (has_post_thumbnail()) {
            ?>
    <div class="col-md-4 col-sm-6 mix no-padding <?php echo esc_attr(implode(' ', $cate)); ?> ">
      <div class="image-wrapper">
      <?php
            $image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            $img = $image_attributes[0];?>
        <img src="<?php echo esc_attr($img); ?>" class="img-responsive" alt="<?php esc_attr_e('work','nivo'); ?>">
        <div class="image-overlay">
          <span>
            <?php if ($show_image_popup) {?> <a href="<?php echo esc_url($img); ?>" class="image-popup">
             <i class="fa fa-camera-retro"></i>
             </a>
            <?php }if ($show_viewmore) {?><a href="<?php the_permalink();?>" target="_blank"><i class="fa fa-chain"></i></a>
            <?php }?>
          </span>
        </div>
      </div>
    </div> <!--work item-->
    <?php }
    }
    wp_send_json(ob_get_clean());
}
function nivo_custom(){
  global $aq_theme_options;

  $theme_options = $aq_theme_options;

  return $theme_options;
}


function nivo_color() {
  wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/assets/css/custom_script.css'
    );
  global $aq_theme_options, $wp_query;
  $main_color = $aq_theme_options['main-color']; 
  $custom_css = '';
  if($main_color!=''){
    $custom_css = "
      .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .navbar-nav > li.current-menu-ancestor > a, .navbar-nav li.drop ul.dropdown li.active > a, .navbar-nav > li > a:hover, .navbar-nav > li > a.active,.navbar-default.menu-shrink li a:hover{
          color: $main_color !important;
      }
      .pricing-content:hover .pricing-price h1,.single_about_feature i, .single_about_feature:hover h4, .section-title  h2 span, .image-overlay span i:hover,.footer_copyright span,.blog_sidebar_title{
        color: $main_color;
      }
      .newsletter .newsletter-submit,.pricing-order a,.btn-portfolio-bg, .single_about_feature:hover i, .btn-light-bg:hover, .btn-light-bg:focus, .portfolio-filters li:hover, .portfolio-filters li.active{
        background: $main_color;
        border-color: $main_color;
      }
      .blog-post .post-info li .comment,.btn-contact-bg,.buy_now,.topcontrol, .single_about_one:hover, .counter span, .single_service, .progress-bar > span,.blog-post .post-info li .date{
        background: $main_color;
      }
      .line{
        background-color: $main_color;
      }
      .single_service_color {
        background: #58BFE8 none repeat scroll 0 0;
    }
    .company_logo img:hover, .newsletter .newsletter-email, .btn-promotion-bg,.form-control:hover, .form-control:focus{
      border-color: $main_color;
    }
    div[data-vc-full-width='true']  .vc_column_container > .vc_column-inner{
      padding: 0px !important;
    }
    ";
    $rgba = nivo_hex2rgb($aq_theme_options['main-color']);
    $custom_css .= "
      .image-overlay{
        background: rgba($rgba[0], $rgba[1], $rgba[2], 0.8);
      }

      .team_over, .testimonial_overlay,.overlay{
        background: rgba($rgba[0], $rgba[1], $rgba[2], 0.4);
      }
    ";
    
    
  }

  wp_add_inline_style( 'custom-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'nivo_color' );

// add span to categories post count
add_filter('wp_list_categories', 'nivo_cat_count_span');
function nivo_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}

function nivo_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span>(', $links );
	$links = str_replace( ')', ')</span>', $links );
	return $links;
}
add_filter( 'get_archives_link', 'nivo_archive_count_span' );



add_action( 'init', 'nivo_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function nivo_add_editor_styles() {
 add_editor_style( get_stylesheet_uri() );
}

?>