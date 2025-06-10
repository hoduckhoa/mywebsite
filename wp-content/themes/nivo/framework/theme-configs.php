<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "aq_theme_options";
    
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Nivo Options', 'nivo' ),
        'page_title'           => esc_html__( 'Nivo Options', 'nivo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'nivo' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'nivo' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'nivo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'nivo' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'nivo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'nivo' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'nivo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'nivo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */
    
    
    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
    $args = array(
      'posts_per_page'   => -1,
      'offset'           => 0,
      'category'         => '',
      'category_name'    => '',
      'orderby'          => 'post_title',
      'order'            => 'ASC',
      'include'          => '',
      'exclude'          => '',
      'meta_key'         => '',
      'meta_value'       => '',
      'post_type'        => 'page',
      'post_mime_type'   => '',
      'post_parent'      => '',
      'post_status'      => 'publish',
      'suppress_filters' => true 
    );
    $pages = get_posts( $args );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General Settings', 'nivo' ),
        'id'     => 'general',
        'desc'   => '',
        'icon'   => 'el el-icon-cogs',
        'fields' => array(
             array(
                'id' => 'favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Custom Favicon', 'nivo'),
                'compiler' => 'true',
                'desc' => esc_html__('Upload your Favicon.', 'nivo'),
                'subtitle' => '',
                'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo', 'nivo'),
                'compiler' => 'true',
                'desc' => esc_html__('Upload your logo.', 'nivo'),
                'subtitle' => '',
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),
            array(
                'id' => 'apple_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon', 'nivo'),
                'compiler' => 'true',
                
                'desc' => esc_html__('Upload your Apple touch icon 57x57.', 'nivo'),
                'subtitle' => '',
                'default' => array('url' => ''),
            ),
            array(
                'id' => 'apple_icon_57',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon 57x57', 'nivo'),
                'compiler' => 'true',
                
                'desc' => esc_html__('Upload your Apple touch icon 57x57.', 'nivo'),
                'subtitle' => '',
                'default' => array('url' => ''),
            ),
            array(
                'id' => 'apple_icon_72',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon 72x72', 'nivo'),
                'compiler' => 'true',
                
                'desc' => esc_html__('Upload your Apple touch icon 72x72.', 'nivo'),
                'subtitle' => '',
                'default' => array('url' => ''),
            ),
            array(
                'id' => 'apple_icon_114',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Apple Touch Icon 114x114', 'nivo'),
                'compiler' => 'true',
                
                'desc' => esc_html__('Upload your Apple touch icon 114x114.', 'nivo'),
                'subtitle' => '',
                'default' => array('url' => ''),
            ),    
        )
    ) );

  /* style options */  
    Redux::setSection( $opt_name,array(
        'icon'      => 'el el-magic',
        'title'     => esc_html__('Styling Options', 'nivo'),
        'fields'    => array(
            array(
                'id' => 'body-main-font',
                'type' => 'typography',
                'output' => array('body'),
                'title' => esc_html__('Body Font', 'nivo'),
                'subtitle' => esc_html__('Specify the body font properties.', 'nivo'),
                'google' => true,
                'default' => array(
                    'color' => '#727272',
                    'font-size' => '14px',
                    'line-height' => '23px',
                    'font-family' => "Open Sans",
                    'font-weight' => '400',
                ),
            ),

            array(
                'id' => 'main-color',
                'type' => 'color',
                'title' => esc_html__('Theme main Color', 'nivo'),
                'subtitle' => esc_html__('Pick theme main color (default: #3ab3df).', 'nivo'),
                'default' => '#3ab3df',
                'validate' => 'color',
            ),           
        )
    ));
    
/* top nav setting */
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Top Nav Settings', 'nivo' ),
        'id'     => 'header',
        'desc'   => '',
        'icon'   => 'el el-lines',
        'fields' => array(
            array(
                'id'       => 'top_nav',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show or Hide Top Nav', 'nivo' ),
                'subtitle' => '',
                'desc'     => '',  
                'default'  => true
            ),
            
        )
    ) );

/* 404 page setting */
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Settings', 'nivo' ),
        'id'         => '404_settings',
        'desc'       => '',
        'icon'   => 'el el-warning-sign',
        'fields'     => array(
           
           array(
                'id'       => '404-editor',
                'type'     => 'editor',
                'title'    => esc_html__( '404 Error Content', 'nivo' ),
                'subtitle' => '',
                'default'  => '
      <b>Oops... Page Not Found!</b>
        
        <em>Sorry the Page Could not be Found here.</em>

        <p>Try using the button below to go to main page of the site</p>
        ',
            ),
           
        )
    ) );

/* footer setting */
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer Settings', 'nivo' ),
        'id'     => 'footer',
        'desc'   => '',
        'icon'   => 'el el-th',
        'fields' => array(
             array(
                'id'       => 'footer-widgets',
                'type'     => 'select',
                'title'    => esc_html__( 'Turn ON footer widget area', 'nivo' ),
                'subtitle' => '',
                'desc'     => '',
                //Must provide key => value pairs for select options
                'options'  => array(
                    'no' => 'No',
                    'yes' => 'Yes',
                ),
                'default'  => 'no'
            ),
            array(
                'id' => 'footer-text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'nivo'),
                'subtitle' => esc_html__('Copyright Text', 'nivo'),
                'default' => '&copy; Copyright 2017. gsrthemes9. All rights reserved.',
            ),
        )
    ) );

/* social setting */
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Settings', 'nivo' ),
        'id'     => 'social',
        'desc'   => '',
        'icon'   => 'el el-link',
        'fields' => array(
            array(
                'id'       => 'social_link',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show or Hide Social Link', 'nivo' ),
                'subtitle' => '',
                'desc'     => '',  
                'default'  => true
            ),
            array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => esc_html__('Facebook Link', 'nivo'),
                'default'  => '#'
            ),
                        array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => esc_html__('Twitter Link', 'nivo'),
                'default'  => '#'
            ),
                        array(
                'id'       => 'google',
                'type'     => 'text',
                'title'    => esc_html__('Google+ Link', 'nivo'),
                'default'  => '#'
            ),
                        array(
                'id'       => 'linkedin',
                'type'     => 'text',
                'title'    => esc_html__('Linkedin Link', 'nivo'),
                'default'  => '#'
            ),
                        array(
                'id'       => 'skype',
                'type'     => 'text',
                'title'    => esc_html__('Skype Link', 'nivo'),
                'default'  => '#'
            ),
                        array(
                'id'       => 'flickr',
                'type'     => 'text',
                'title'    => esc_html__('Flickr Link', 'nivo'),
                'default'  => '#'
            ),
                        array(
                'id'       => 'html5',
                'type'     => 'text',
                'title'    => esc_html__('Html5 Link', 'nivo'),
                'default'  => '#'
            ),
                                    array(
                'id'       => 'youtube',
                'type'     => 'text',
                'title'    => esc_html__('YouTube Link', 'nivo'),
                'default'  => '#'
            ),
                                    array(
                'id'       => 'rss',
                'type'     => 'text',
                'title'    => esc_html__('Rss Link', 'nivo'),
                'default'  => '#'
            ),
        )
    ) );


	/*Title Bar Setting*/
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Page Title Bar', 'nivo' ),
        'desc'   => esc_html__( '', 'nivo' ),
        'icon'   => 'el-icon-livejournal',
        'fields' => array(
            array(
                'id'       => 'show_title_bar',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Title Bar', 'nivo' ),
                'subtitle' => esc_html__( 'Show title bar in page.', 'nivo' ),
                'default'  => true
            ),
            array(
                'id'       => 'title_bar_bg2',
                'type'     => 'background',
                'title'    => esc_html__('Background', 'nivo'),
                'subtitle' => esc_html__('background with image, color, etc.', 'nivo'),
                'default'  => array(
                    'background-color' => '#000',
                    'background-image'  => get_template_directory_uri().'/images/header-bg-image.jpg',
                    'background-repeat' => 'no-repeat',
                    'background-size'  => 'cover',
                    'background-position'  => 'center center',
                ),
                'output' => array('.page_title2'),
                
            ),
            array(
                'id' => 'title_bar_margin2',
                'title' => 'Margin',
                'subtitle' => esc_html__('Please, Enter margin of title bar.', 'nivo'),
                'type' => 'spacing',
                'mode' => 'margin',
                'units' => array('px'),
                'output' => array('.page_title2'),
                'default' => array(
                    'margin-top'     => '0', 
                    'margin-right'   => '0', 
                    'margin-bottom'  => '0', 
                    'margin-left'    => '0',
                    'units'          => 'px', 
                ),
                
            ),
            array(
                'id' => 'title_bar_padding2',
                'title' => 'Padding',
                'subtitle' => esc_html__('Please, Enter padding of title bar.', 'nivo'),
                'type' => 'spacing',
                'units' => array('px'),
                'output' => array('.page_title2'),
                'default' => array(
                    'padding-top'     => '200', 
                    'padding-right'   => '0', 
                    'padding-bottom'  => '80', 
                    'padding-left'    => '0',
                    'units'          => 'px', 
                ),
                
            ),
            array(
                'id'       => 'page_breadcrumb_delimiter',
                'type'     => 'text',
                'title'    => esc_html__('Delimiter', 'nivo'),
                'subtitle' => esc_html__('Please, Enter Delimiter of page breadcrumb in title bar.', 'nivo'),
                'default'  => '/'
            )
        )
    ));
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Title Bar', 'nivo' ),
        'desc'   => esc_html__( '', 'nivo' ),
        'icon'   => 'el-icon-livejournal',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'show_page_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Page Title', 'nivo' ),
                'subtitle' => esc_html__( 'Show page title in page title bar.', 'nivo' ),
                'default'  => true,
            ),
            array(
                'id'       => 'show_page_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Page Breadcrumb', 'nivo' ),
                'subtitle' => esc_html__( 'Show page breadcrumb in page title bar.', 'nivo' ),
                'default'  => true,
            )
        )
    ));

/* Single Post Setting*/
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Single Post', 'nivo' ),
        'desc'   => esc_html__( '', 'nivo' ),
        'icon'   => 'el el-file',
        'fields' => array(
            array(
                'id'       => 'show_post_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Post Author', 'nivo' ),
                'subtitle' => esc_html__( 'Show or not post author on your single blog.', 'nivo' ),
                'default'  => true,
            ),
            array(
                'id'       => 'show_post_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Post Comment', 'nivo' ),
                'subtitle' => esc_html__( 'Show or not post comment on your single blog.', 'nivo' ),
                'default'  => true,
            )
        )
        )
    );

    
    /*
     * <--- END SECTIONS
     */
    

    ?>