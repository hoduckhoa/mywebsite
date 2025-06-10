<?php

add_action( 'cmb2_init', 'nivo_header_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function nivo_header_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_nivo_top_nav_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Header Settings', 'nivo' ),
		'object_types'  => array( 'page' ), // Post type
	) );

	$cmb_demo->add_field( array(
	    'name' => esc_html__('Show Page Title Bar','nivo'),
	    'desc' => esc_html__('show Page title bar (optional)','nivo'),
	    'id'   => 'show_title_bar',
	    'type' => 'select',
        'options' => array(
        	'1' => esc_html__('Yes, Please!', 'nivo'),
        	'0' => esc_html__('No, Please!', 'nivo'),
        	'global' => esc_html__('Inherit From Theme Options','nivo'),
        ),
        'default' => ''
	) );

}


// cmb_page cmb_cat, cmb_tag, cmb_sg, cmb_text, cmb_op

add_action( 'cmb2_init', 'nivo_testimonial_metabox' );

function nivo_testimonial_metabox(){
	$prefix = '_nivo_tm_';
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Link Website Or Sub Name', 'nivo' ),
		'object_types'  => array( 'testimonial' ), // Post type
	) );

	$cmb_demo->add_field( array(
        'name' => esc_html__('Enter Link Website', 'nivo'),
        'desc' => esc_html__('Ex: (example.com)', 'nivo'),
        'id'   => $prefix . 'link_web',
        'type' => 'text'
	) );
	$cmb_demo->add_field( array(
        'name' => esc_html__('Sub Name', 'nivo'),
        'desc' => esc_html__('Ex: (ceo)', 'nivo'),
        'id'   => $prefix . 'sub_name',
        'type' => 'text'
	) );

}

add_action( 'cmb2_init', 'nivo_portfolio_metabox' );

function nivo_portfolio_metabox(){
	$prefix = '_nivo_pf_';
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Project Options', 'nivo' ),
		'object_types'  => array( 'portfolio' ), // Post type

	) );

	$cmb_demo->add_field( array(
        'name' => esc_html__('Author', 'nivo'),
        'desc' => esc_html__('Author (optional)', 'nivo'),
        'id'   => $prefix . 'author',
        'type' => 'text'
	) );

	$cmb_demo->add_field( array(
        'name' => esc_html__('Date', 'nivo'),
        'desc' => esc_html__('Date (optional)', 'nivo'),
        'id'   => $prefix . 'date',
        'type' => 'text_date_timestamp',
        'date_format' => 'd M, Y'
	) );

	$cmb_demo->add_field( array(
        'name' => esc_html__('Project Url', 'nivo'),
        'desc' => esc_html__('Project Url (optional)', 'nivo'),
        'id'   => $prefix . 'url',
        'type' => 'text_url'
	) );

}

add_action( 'cmb2_init', 'nivo_user_profile_metabox' );
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function nivo_user_profile_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_nivo_user_';

	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'edit',
		'title'            => esc_html__( 'User Profile Metabox', 'nivo' ),
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'nivo' ),
		'desc'     => esc_html__( 'field description (optional)', 'nivo' ),
		'id'       => $prefix . 'extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name'    => esc_html__( 'Avatar', 'nivo' ),
		'desc'    => esc_html__( 'field description (optional)', 'nivo' ),
		'id'      => $prefix . 'avatar',
		'type'    => 'file',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Facebook URL', 'nivo' ),
		'desc' => esc_html__( 'field description (optional)', 'nivo' ),
		'id'   => $prefix . 'facebookurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Twitter URL', 'nivo' ),
		'desc' => esc_html__( 'field description (optional)', 'nivo' ),
		'id'   => $prefix . 'twitterurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Google+ URL', 'nivo' ),
		'desc' => esc_html__( 'field description (optional)', 'nivo' ),
		'id'   => $prefix . 'googleplusurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Linkedin URL', 'nivo' ),
		'desc' => esc_html__( 'field description (optional)', 'nivo' ),
		'id'   => $prefix . 'linkedinurl',
		'type' => 'text_url',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'User Birthday', 'nivo' ),
		'desc' => esc_html__( 'Birthday (optional)', 'nivo' ),
		'id'   => $prefix . 'birthday',
		'type' => 'text_date',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Gender', 'nivo' ),
		'desc' => esc_html__( 'Gender (optional)', 'nivo' ),
		'id'   => $prefix . 'sex',
		'options'          => array(
	        'male' => esc_html__( 'Male', 'nivo' ),
	        'feemale'   => esc_html__( 'Free Male','nivo'),
	        'none'     => esc_html__( 'Hide', 'nivo' ),
	    ),
		'type' => 'select',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Country', 'nivo' ),
		'desc' => esc_html__( 'User city (optional)', 'nivo' ),
		'id'   => $prefix . 'country',
		'type' => 'text',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'City', 'nivo' ),
		'desc' => esc_html__( 'User city (optional)', 'nivo' ),
		'id'   => $prefix . 'city',
		'type' => 'text',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Address', 'nivo' ),
		'desc' => esc_html__( 'User address (optional)', 'nivo' ),
		'id'   => $prefix . 'address',
		'type' => 'text',
	) );

}
