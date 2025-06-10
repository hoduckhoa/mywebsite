<?php
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
$lists_page = array();
foreach($pages as $p){
  $lists_page[$p->post_title] = $p->ID;
}

// qk_blog
if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Blog","nivo"),
   "base" => "qk_blog",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
	   array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'nivo'),
			"param_name" => "tpl",
			"value" => array(
				"Please choose an option ..." =>"",
				"With Large Image" => "tpl1",
				"With Medium Image" => "tpl2",
				"With Small Image" => "tpl3",
                "Recent Blog" => "tpl4"
			),
			"description" => esc_html__('Select template in this elment.', 'nivo')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => esc_html__("Show Pagination", 'nivo'),
			"param_name" => "show_pagination",
			"value" => array (
				esc_html__( "Yes, please", 'nivo' ) => true
			),
			"dependency" => array(
			  "nivo" => "tpl",
			  "value" => array("tpl2","tpl3")
			),
			"group" => esc_html__("Template", 'nivo'),
			"description" => esc_html__("Show or not show pagination in this element.", 'nivo')
		),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Total item","nivo"),
        "param_name" => "order",
        "value" => "",
		"group" => esc_html__("Template", 'nivo'),
        "description" => esc_html__('Set max limit for items in loop or enter -1 to display all (limited to 1000).', 'nivo')
      ),
      array(
        "type" => "checkbox",
        "heading" => esc_html__('Show Readmore', 'nivo'),
        "param_name" => "show_readmore",
        "value" => array(
          esc_html__("Yes, please", 'nivo') => 'true'
        ),
		"dependency" => array(
          "nivo" => "tpl",
          "value" => array("tpl1","tpl2","tpl3")
        ),
		"group" => esc_html__("Template", 'nivo'),
        "description" => esc_html__('Show or hide title of post on your category.', 'nivo')
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__('Read More Text', 'nivo'),
        "param_name" => "readmore",
        "dependency" => array(
          "nivo" => "show_readmore",
          "value" => array('true')
        ),
		"group" => esc_html__("Template", 'nivo'),
        "description" => esc_html__('Enter readmore text.', 'nivo')
      ),
      array(
      "type" => "textfield",
    
      "holder" => "div",
    
      "class" => "",
    
      "heading" => esc_html__("Category Id","nivo"),
    
      "param_name" => "cat_id",
    
      "value" => "",
    
   
    "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__("Enter category id to display posts", "nivo")
    )
    )
) );


}
class WPBakeryShortCode_qk_blog extends WPBakeryShortCode {}

//QK Blog Recent

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Blog Recent","nivo"),
   "base" => "qk_blog_recent",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'nivo'),
			"param_name" => "tpl",
			"value" => array(
				"Recent Blog" => "tpl1"
			),
			"description" => esc_html__('Select style for text in this element.', 'nivo')
		),
	  array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Total item","nivo"),
			"param_name" => "order",
			"value" => "-1",
			"group" => esc_html__("Template", 'nivo'),
			"description" => esc_html__('Set max limit for items in loop or enter -1 to display all (limited to 1000).', 'nivo')
		),

	   array(
		 "type" => "textfield",
		 "holder" => "div",
		 "class" => "",
		 "heading" => esc_html__("Extra class name","nivo"),
		 "param_name" => "el_class",
		 "value" => "",
		 "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')
		)
    )
) );


}
class WPBakeryShortCode_qk_blog_recent extends WPBakeryShortCode {}

// qk_boxesalert

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Box Alert","nivo"),
   "base" => "qk_boxesalert",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
    array(
      "type" => "checkbox",
      "heading" => esc_html__('Show Icon', 'nivo'),
      "param_name" => "show_icon",
      "value" => array(
        esc_html__("Yes, please", 'nivo') => 'true'
      ),
      "description" => esc_html__('Show or hide icon.', 'nivo')
    ),
    array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Font icon","nivo"),
      "param_name" => "icon",
      "value" => "",
      "dependency" => array(
        "nivo" => "show_icon",
        "value" => array("true")
      ),
      "description" => esc_html__('Set font icon', 'nivo')
    ),
    array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => esc_html__("Title","nivo"),
       "param_name" => "title",
       "value" => "",
       "description" => esc_html__('Enter box title','nivo')
    ),
    array(
      "type" => "colorpicker",
      "class" => "",
      "heading" => esc_html__( "Text Color", "nivo" ),
      "param_name" => "color",
      "value" => '', //Default Red color
      "description" => esc_html__( "Choose text color", "nivo" )
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Extra Class", "nivo"),
      "param_name" => "el_class",
      "value" => "",
      "description" => esc_html__("Extra Class.", "nivo")
    ),
    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'Css', 'nivo' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design options', 'nivo' ),
    )
   )
) );

}

class WPBakeryShortCode_qk_boxesalert extends WPBakeryShortCode {
}

// qk_button
if(function_exists('vc_map')){

vc_map( array(
   "name" => esc_html__("QK Button","nivo"),
   "base" => "qk_button",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Template", 'nivo'),
      "param_name" => "tpl",
      "value" => array(
        esc_html__("Please choose an option ...","nivo") =>"",
        "Default" => "tpl1"
      ),
      "description" => esc_html__('Select template in this elment.', 'nivo')
    ),
     array(
       "type" => "textfield",
       "holder" => "div",
       "class" => "",
       "heading" => esc_html__("Title","nivo"),
       "param_name" => "title",
       "value" => "",
       "group" => esc_html__("Template", 'nivo'),
       "description" => ''
    ),
    array(
      "type" => "checkbox",
      "class" => "",
      "heading" => esc_html__("Show icon", 'nivo'),
      "param_name" => "has_icon",
      "value" => array (
        esc_html__( "Yes, please", 'nivo' ) => 'true'
      ),
      "dependency" => array(
        "nivo" => "tpl",
        "value" => array('tpl1')
      ),
      "group" => esc_html__("Template", 'nivo'),
      "description" => esc_html__("Show or not show icon in this element.", 'nivo')
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Icon", 'nivo'),
      "param_name" => "icon",
      "value" => "",
      "std" => "fa fa-",
      "group" => esc_html__("Template", 'nivo'),
      "dependency" => array(
        "nivo" => "has_icon",
        "value" => array('true')
      ),
      "description" => esc_html__("Please, enter class icon in this element.", 'nivo')
    ),
    array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Link Button","nivo"),
      "param_name" => "link",
      "value" => '#',
      "description" => esc_html__('Enter link','nivo')
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Extra Class", 'nivo'),
      "param_name" => "el_class",
      "value" => "",
      "description" => esc_html__("Extra Class.", 'nivo')
    ),
   )
) );

}
class WPBakeryShortCode_qk_button extends WPBakeryShortCode {}

// qk_icon

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Icons","nivo"),
   "base" => "qk_icons",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Template", 'nivo'),
      "param_name" => "tpl",
      "value" => array(
        "Normal Icon" => "tpl1",
        "Glyph Icon (Link Icon)" => "tpl2"
      ),
      "description" => esc_html__('Select type for icons in this element.', 'nivo')
    ),
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Type Icon", 'nivo'),
      "param_name" => "type_icon",
      "value" => array(
        esc_html__("Font Icon","nivo") => "icon",
        esc_html__("Image","nivo") => "img"
      ),
      "std" => "icon",
      "group" => esc_html__("Icons","nivo"),
      "description" => esc_html__('Select type for icons.', 'nivo')
    ),
    array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Font icon","nivo"),
      "param_name" => "icon",
      "value" => "",
      "group" => esc_html__("Icons","nivo"),
      "dependency" => array(
        "nivo" => "type_icon",
        "value" => array("icon")
      ),
      "description" => esc_html__('Set font icon', 'nivo')
    ),
     array(
      "type" => "attach_image",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Image icon","nivo"),
      "param_name" => "img_icon",
      "value" => "",
      "group" => esc_html__("Icons","nivo"),
      "dependency" => array(
        "nivo" => "type_icon",
        "value" => array("img")
      ),
      "description" => esc_html__('Sellect thumb icon', 'nivo')
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Extra Class For Icons", "nivo"),
      "param_name" => "wrap_icon",
      "value" => "",
      "group" => esc_html__("Icons","nivo"),
      "description" => esc_html__("Extra class for icons.", "nivo")
    ),
    array(
       "type" => "exploded_textarea",
       "holder" => "div",
       "class" => "",
       "heading" => esc_html__("Title","nivo"),
       "param_name" => "title",
       "value" => "",
       "group" => esc_html__("Title and Description","nivo"),
       "description" => ''
    ),
    array(
      "type" => "colorpicker",
      "class" => "",
      "heading" => esc_html__( "Title Color", "nivo" ),
      "param_name" => "color_title",
      "value" => '', //Default Red color
      "group" => esc_html__("Title and Description","nivo"),
      "description" => esc_html__( "Choose text color", "nivo" )
    ),
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Type Heading", 'nivo'),
      "param_name" => "type_heading",
      "value" => array(
        "Heading 3" => "h3",
        "Heading 2" => "h2",
        "Heading 4" => "h4",
        "Heading 5" => "h5",
        "Heading 6" => "h6",
        "Strong" => "strong"
      ),
      "group" => esc_html__("Title and Description","nivo"),
      "description" => esc_html__('Select type heading for title.', 'nivo')
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__('Show Line', 'nivo'),
      "param_name" => "show_line",
      "value" => array(
        esc_html__("Yes, please", 'nivo') => 'true'
      ),
      "group" => esc_html__("Title and Description","nivo"),
      "dependency" => array(
        "nivo" => "tpl",
        "value" => array("tpl1")
      ),
      "description" => esc_html__('Show or hide line under the title.', 'nivo')
    ),
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Type Line", 'nivo'),
      "param_name" => "type_line",
      "value" => array(
        "Line 1" => "linebg_1",
        "Line 2" => "linebg_2",
        "Line 3" => "linebg_3",
        "Line 4" => "linebg_4",
        "Line 5" => "linebg_5",
        "Line 6" => "linebg_6"
      ),
      "group" => esc_html__("Title and Description","nivo"),
      "std" => "linebg_2",
      "dependency" => array(
        "nivo" => "show_line",
        "value" => array("true"),
      ),
      "description" => esc_html__('Select type for line.', 'nivo')
    ),
    array(
      "type" => "colorpicker",
      "class" => "",
      "heading" => esc_html__( "Line Color", "nivo" ),
      "param_name" => "color_line",
      "value" => '', //Default Red color
      "dependency" => array(
        "nivo" => "show_line",
        "value" => array("true"),
      ),
      "group" => esc_html__("Title and Description","nivo"),
      "description" => esc_html__( "Choose text color", "nivo" )
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Height Line", "nivo"),
      "param_name" => "height_line",
      "value" => "",
      "group" => esc_html__("Title and Description","nivo"),
      "dependency" => array(
        "nivo" => "show_line",
        "value" => array("true"),
      ),
      "description" => esc_html__("Height line in px.", "nivo")
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Margin Bottom of Line", "nivo"),
      "param_name" => "line_margin",
      "value" => "",
      "dependency" => array(
        "nivo" => "show_line",
        "value" => array("true"),
      ),
      "group" => esc_html__("Title and Description","nivo"),
      "description" => esc_html__("Margin top of line in px.", "nivo")
    ),
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Description","nivo"),
      "param_name" => "content",
      "value" => '',
      "group" => esc_html__("Title and Description","nivo"),
      "description" => ''
    ),
    array(
      "type" => "checkbox",
      "class" => "",
      "heading" => esc_html__("Show Link", 'nivo'),
      "param_name" => "show_btn",
      "value" => array (
        esc_html__( "Yes, please", 'nivo' ) => "true"
      ),
      "description" => esc_html__("Show or not view more button.", 'nivo')
    ),
    array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Name Button","nivo"),
      "param_name" => "btn_name",
      "value" => '',
      "dependency" => array(
        "nivo" => "show_btn",
        "value" => array("true"),
      ),
     "description" => esc_html__("Enter name of button","nivo")
    ),

    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Type Button", 'nivo'),
      "param_name" => "type_btn",
      "value" => array(
        "Button 1" => "one",
        "Button 2" => "two",
        "Button 3" => "three",
        "Button 4" => "four",
        "Button 5" => "five",
        "Button 6" => "six",
        "Default" => "btn"
      ),
      "dependency" => array(
        "nivo" => "show_btn",
        "value" => array("true"),
      ),
      "description" => esc_html__('Select type for button.', 'nivo')
    ),

    array(
      "type" => "textfield",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Link Button","nivo"),
      "param_name" => "btn_link",
      "value" => '',
      "dependency" => array(
        "nivo" => "show_btn",
        "value" => array("true"),
      ),
     "description" => esc_html__('Enter link button','nivo')
    ),

    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Margin Top of Button", "nivo"),
      "param_name" => "btn_margin",
      "value" => "",
      "dependency" => array(
        "nivo" => "show_btn",
        "value" => array("true"),
      ),
      "description" => esc_html__("Margin top of button in px.", "nivo")
    ),

    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Extra Class For Text", "nivo"),
      "param_name" => "wrap_txt",
      "value" => "",
      "group" => "Title and Description",
      "description" => esc_html__("Extra class for title and description.", "nivo")
    ),
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Wrap Type", 'nivo'),
      "param_name" => "wrap_type",
      "value" => array(
        "DIV" => "div",
        "LIST UL" => "ul"
      ),
      "description" => esc_html__('Select type of wrap element.', 'nivo')
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__('Active icon', 'nivo'),
      "param_name" => "active_icon",
      "value" => array(
        esc_html__("Yes, please", 'nivo') => 'active'
      ),
      "description" => esc_html__('Add status active to this icon', 'nivo')
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__('Insert Clearfix', 'nivo'),
      "param_name" => "insert_clearfix",
      "value" => array(
        esc_html__("Yes, please", 'nivo') => 'true'
      ),
      "description" => esc_html__('Insert clearfix to clear float element.', 'nivo')
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Extra Class", "nivo"),
      "param_name" => "el_class",
      "value" => "",
      "description" => esc_html__("Extra Class.", "nivo")
    ),
    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'Css', 'nivo' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design options', 'nivo' ),
    )
   )
) );

}

class WPBakeryShortCode_qk_icons extends WPBakeryShortCode {
}

// qk_panel

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK panel","nivo"),
   "base" => "qk_panel",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
    array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Template", 'nivo'),
        "param_name" => "tpl",
        "value" => array(
            "Choose type panel" => '',
            "Panel with hover" => "accrodation",
            "faq" => ""
        ),
        "description" => esc_html__('Select style for text in this element.', 'nivo')
    ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Total item","nivo"),
         "param_name" => "order",
         "value" => "-1",
         "description" => esc_html__('Set max limit for items in loop or enter -1 to display all (limited to 1000).', 'nivo')
    ),
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Post Type", 'nivo'),
      "param_name" => "post_type",
      "value" => array(
        "Panel" => "panel",
        "FAQs" => "faqs"
      ),
      "description" => esc_html__('Choose post type.', 'nivo')
    ),
    array(
     "type" => "textfield",
     "holder" => "div",
     "class" => "",
     "heading" => esc_html__("Extra class name","nivo"),
     "param_name" => "el_class",
     "value" => "",
     "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')
    )
   )
) );


}
class WPBakeryShortCode_qk_panel extends WPBakeryShortCode {
}


// qk_portfolio

if(function_exists('vc_map')){

vc_map( array(

   "name" => esc_html__("QK Portfolio","nivo"),

   "base" => "qk_portfolio",

   "class" => "",

   "category" => esc_html__("QK", "nivo"),

   "icon" => "icon-qk",

   "params" => array(
  array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Template", 'nivo'),
    "param_name" => "tpl",
    "value" => array(
      esc_html__("Template 1 - 3 columns full hover",'nivo') => "tpl1",
      esc_html__("Template 2 - 2 columns full hover",'nivo') => "tpl2",
      esc_html__("Template 3 - 1 columns left",'nivo') => "tpl3",
      esc_html__("Template 4 - 3 columns bottom hover",'nivo') => "tpl4",
      esc_html__("Template 5 - 2 columns bottom hover",'nivo') => "tpl5",
      esc_html__("Template 6 - 1 columns right",'nivo') => "tpl6"
    ),
    "description" => esc_html__('Select template in this element.', 'nivo')
  ),
  array(

      "type" => "checkbox",

      "heading" => esc_html__('Show filter', 'nivo'),

      "param_name" => "show_filter",

      "value" => array(

        esc_html__("Yes, please", 'nivo') => 1

      ),
    "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__('Show or not show filter of post on your category.', 'nivo')

    ),
       
     array(

      "type" => "checkbox",

      "heading" => esc_html__('Show Button More Info', 'nivo'),

      "param_name" => "show_more_info",

      "value" => array(

        esc_html__("Yes, please", 'nivo') => 1

      ),
    
  "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__('Show or hide button more info of post on your category.', 'nivo')

    ),
   array(
      "type" => "textfield",
    
      "holder" => "div",
    
      "class" => "",
    
      "heading" => esc_html__("Button More Info text","nivo"),
    
      "param_name" => "more_info_text",
    
      "value" => "",
    
          
    "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__("Enter view more text, ex: More Info", "nivo")
    ),
     
     array(

      "type" => "checkbox",

      "heading" => esc_html__('Show Button View Larger', 'nivo'),

      "param_name" => "show_view_larger",

      "value" => array(

        esc_html__("Yes, please", 'nivo') => 1

      ),
    
  "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__('Show or hide button view larger of post on your category.', 'nivo')

    ),
  array(
      "type" => "textfield",
    
      "holder" => "div",
    
      "class" => "",
    
      "heading" => esc_html__("Button View Larger text","nivo"),
    
      "param_name" => "view_larger_text",
    
      "value" => "",
    
   
    "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__("Enter view more text, ex: More Info", "nivo")
    ),
       
      array(
      "type" => "textfield",
    
      "holder" => "div",
    
      "class" => "",
    
      "heading" => esc_html__("Single Portfolio Id","nivo"),
    
      "param_name" => "single_port_id",
    
      "value" => "",
    
   
    "group" => esc_html__("Template", 'nivo'),

      "description" => esc_html__("Enter value in only Single Column Portfolio", "nivo")
    ),   
    
    array(

      "type" => "textfield",

      "class" => "",

      "heading" => esc_html__("Posts per page", 'nivo'),

      "param_name" => "posts_per_page",

      "value" => "",

      "description" => __ ( "Posts per page", 'nivo' ),

    "group" => esc_html__("Build Query", 'nivo'),

    ),
  
  array (
      "type" => "dropdown",
      
      "heading" => esc_html__( 'Order by', 'nivo' ),
      
      "param_name" => "orderby",
      
      "value" => array (
          esc_html__( "None",'nivo') => "none",
          
          esc_html__("Title",'nivo') => "title",
          
          esc_html__("Date",'nivo') => "date",
          
          esc_html__("ID" ,'nivo')=> "ID"
      ),
      "group" => esc_html__("Build Query", 'nivo'),
      
      "description" => esc_html__( 'Order by ("none", "title", "date", "ID").', 'nivo' )
  ),
  array (
      "type" => "dropdown",
      
      "heading" => esc_html__( 'Order', 'nivo' ),
      
      "param_name" => "order",
      
      "value" => Array (
          esc_html__("None",'nivo') => "none",
          
          esc_html__("ASC" ,'nivo')=> "ASC",
          
          esc_html__("DESC",'nivo') => "DESC"
      ),
      "group" => esc_html__("Build Query", 'nivo'),
      
      "description" => esc_html__( 'Order ("None", "Asc", "Desc").', 'nivo' )
  ),
    array(

      "type" => "textfield",

      "class" => "",

      "heading" => esc_html__("Extra Class", 'nivo'),

      "param_name" => "el_class",

      "value" => "",

      "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'nivo' )

    )

  )

) );

}
class WPBakeryShortCode_qk_portfolio extends WPBakeryShortCode {
}

// qk_price

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Price","nivo"),
   "base" => "qk_price",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
    array(
      "type" => "dropdown",
      "class" => "",
      "heading" => esc_html__("Template", 'nivo'),
      "param_name" => "tpl",
      "value" => array(
        "Please choose an option ..." =>"",
        "Template 1" => "tpl1",
        "Template 2" => "tpl2",
      ),
      "description" => esc_html__('Select template in this elment.', 'nivo')
    ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title","nivo"),
         "param_name" => "title",
         "value" => "",
      "group" => esc_html__("Template", 'nivo'),
         "description" => ''
      ) ,
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Price","nivo"),
         "param_name" => "title1",
         "value" => "",
      "group" => esc_html__("Template", 'nivo'),
         "description" => ''
      ) ,
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title2","nivo"),
         "param_name" => "title2",
         "value" => "",
         "group" => esc_html__("Template", 'nivo'),
         "description" => ''
      ) ,
     array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description","nivo"),
         "param_name" => "content",
         "value" => '',
      "group" => esc_html__("Template", 'nivo'),
         "description" => ''
      ),
     array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Button name","nivo"),
           "param_name" => "button_name",
           "value" => "",
			"group" => esc_html__("Template", 'nivo'),
           "description" =>''
    ),
	
     array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Button link","nivo"),
           "param_name" => "button_link",
           "value" => "#",
        "group" => esc_html__("Template", 'nivo'),
           "description" =>''
    ),
     array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Extra class name","nivo"),
           "param_name" => "el_class",
           "value" => "",
           "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')
    )
   )
) );

}
class WPBakeryShortCode_qk_price extends WPBakeryShortCode {
}

// qk_searchform

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Search Form","nivo"),
   "base" => "qk_searchform",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Font icon","nivo"),
        "param_name" => "icon",
        "value" => "",
        "description" => esc_html__('Set font icon', 'nivo')
      ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Label Submit","nivo"),
           "param_name" => "label",
           "value" => "",
           "description" => esc_html__('Enter label for submmit','nivo')
      ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Place Holder","nivo"),
           "param_name" => "placeholder",
           "value" => "",
           "description" => esc_html__('Enter placeholder for search form','nivo')
      ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Extra class name","nivo"),
           "param_name" => "el_class",
           "value" => "",
           "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')
      )
   )
) );

}

class WPBakeryShortCode_qk_searchform extends WPBakeryShortCode {
}

// qk_service

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Service","nivo"),
   "base" => "qk_service",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'nivo'),
			"param_name" => "tpl",
			"value" => array(
				"Icon on left" => "tpl1",
				"Icon, Text and box" => "tpl2",
				"Text, Icon and button" => "tpl3",
				"Icon on top" => "tpl4"
			),
			"description" => esc_html__('Select style for text in this element.', 'nivo')
		),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__("Font icon","nivo"),
        "param_name" => "icon",
        "value" => "fa fa-globe",
        "dependency" => array(
          "nivo" => "tpl",
          "value" => array("tpl1","tpl3","tpl2","tpl4"),
        ),
        "description" => esc_html__('Set font icon', 'nivo')
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Title","nivo"),
         "param_name" => "title",
         "value" => "",
         "description" => ''
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Description","nivo"),
         "param_name" => "content",
         "value" => '',
         "description" => ''
      ),
     array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button","nivo"),
         "param_name" => "ex_link",
         "value" => '',
		  "dependency" => array(
                    "nivo" => "tpl",
                    "value" => array("tpl1","tpl3"),
                ),
         "description" => ''
      ),
     
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Extra Class", "nivo"),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("Extra Class.", "nivo")
		),
	
   )
) );

}

class WPBakeryShortCode_qk_service extends WPBakeryShortCode {
}

//qk_team

if(function_exists('vc_map')){
vc_map( array(
   "name" => esc_html__("QK Team","nivo"),
   "base" => "qk_team",
   "class" => "",
   "category" => esc_html__("QK", "nivo"),
   "icon" => "icon-qk",
   "params" => array(
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__("Template", 'nivo'),
            "param_name" => "tpl",
            "value" => array(
                "Team with icon 1" => "tpl1",                
                "Team with button" => "tpl2",
                "Team and hover" => "tpl3",
                "Team with icon 2" => "tpl4"
            ),
            "description" => esc_html__('Select style for text in this element.', 'nivo')
        ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Name","nivo"),
           "param_name" => "title",
           "value" => "",
           "description" => ""
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Job","nivo"),
           "param_name" => "sub_title",
           "value" => "",
          "dependency" =>array(
                "nivo" => "tpl",
                "value" =>array("tpl1","tpl3"),
            ),
           "description" => ""
        ),
        array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Images file","nivo"),
           "param_name" => "img_url",
           "value" => "",
           "description" => esc_html__('Set source images', 'nivo')
        ),
        array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Content","nivo"),
         "param_name" => "content",
         "value" => '',
         "description" => ''
      ),
          array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Facebook","nivo"),
         "param_name" => "fb_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl2","tpl3"),
          ),
         "description" => ''
      ),
             array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Twiiter","nivo"),
         "param_name" => "tw_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl1","tpl3"),
          ),
         "description" => ''
      ),
             array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link G+","nivo"),
         "param_name" => "g_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl1","tpl3"),
          ),
         "description" => ''
      ),
             array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Youtube","nivo"),
         "param_name" => "yt_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl1","tpl3"),
          ),
         "description" => ''
      ),
             array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Rss","nivo"),
         "param_name" => "rss_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl1","tpl3"),
          ),
         "description" => ''
      ),
        array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link LinkedIn","nivo"),
         "param_name" => "rss_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl4"),
          ),
         "description" => ''
      ),
        array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Hospital","nivo"),
         "param_name" => "rss_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl4"),
          ),
         "description" => ''
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Link Button","nivo"),
         "param_name" => "ex_link",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl2"),
          ),
         "description" => ''
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__("Name Button","nivo"),
         "param_name" => "ex_name",
         "value" => '',
          "dependency" => array(
              "nivo" => "tpl",
              "value" => array("tpl2"),
          ),
         "description" => ''
      ),
      array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__("Extra class name","nivo"),
           "param_name" => "el_class",
           "value" => "",
           "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')
      )
    
   )
) );

}
class WPBakeryShortCode_qk_team extends WPBakeryShortCode {
}

// qk_testimonial

if(function_exists('vc_map')){

vc_map( array(

   "name" => esc_html__("QK Testimonial","nivo"),

   "base" => "qk_testimonial",

   "class" => "",

   "category" => esc_html__("QK", "nivo"),

   "icon" => "icon-qk",

   "params" => array(

    array(

      "type" => "dropdown",

      "class" => "",

      "heading" => esc_html__("Template", 'nivo'),

      "param_name" => "tpl",

      "value" => array(

        "Please choose an option ..." =>"",

        "Template Testimonial flex slider" => "tpl1",

      ),

      "description" => esc_html__('Select template in this elment.', 'nivo')

    ),

    array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => esc_html__("Total item","nivo"),

         "param_name" => "order",

         "value" => "-1",

         "group" => esc_html__("Template", 'nivo'),

         "description" => esc_html__('Set max limit for items in loop or enter -1 to display all (limited to 1000).', 'nivo')

    ),

    array(

     "type" => "textfield",

     "holder" => "div",

     "class" => "",

     "heading" => esc_html__("Extra class name","nivo"),

     "param_name" => "el_class",

     "value" => "",

     "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')

    )

   )

) );

}

class WPBakeryShortCode_qk_testimonial extends WPBakeryShortCode {

}


// Title shortcode

if(function_exists('vc_map')){

vc_map( array(

   "name" => esc_html__("QK Title","nivo"),

   "base" => "qk_title",

   "class" => "",

   "category" => esc_html__("QK", "nivo"),

   "icon" => "icon-qk",

   "params" => array(

    array(

      "type" => "dropdown",

      "class" => "",

      "heading" => esc_html__("Template", 'nivo'),

      "param_name" => "tpl",

      "value" => array(

        esc_html__("Please choose an option ...","nivo") =>"",

        esc_html__("Template main title","nivo") => "tpl1",

        esc_html__("Template other title","nivo") => "tpl2"

      ),

      "description" => esc_html__('Select template in this elment.', 'nivo')

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Type Heading","nivo"),

       "param_name" => "type_heading",

       "value" => array(

            esc_html__("Please choose an option ...","nivo") =>"",

            esc_html__("Heading 1","nivo") => "h1",

            esc_html__("Heading 2","nivo") => "h2",

            esc_html__("Heading 3","nivo") => "h3",

            esc_html__("Heading 4","nivo") => "h4",

            esc_html__("Heading 5","nivo") => "h5"

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),
    
        array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => esc_html__("Heading class name","nivo"),

         "param_name" => "h_class",

         "value" => "",
            
        "group" => esc_html__("Template", 'nivo'),

         "description" => esc_html__('add perticular style to heading.', 'nivo')

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Number field of title","nivo"),

       "param_name" => "no_title",

       "value" => array(

            esc_html__("Please choose an option ...","nivo") =>"",

            esc_html__("1 field title","nivo") => "1",

            esc_html__("2 fields title","nivo") => "2",

            esc_html__("3 fields title","nivo") => "3",

            esc_html__("4 fields title","nivo") => "4"

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "textfield",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Title","nivo"),

       "param_name" => "title1",

       "value" => "",

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Font style","nivo"),

       "param_name" => "font_style1",

        "value" => array(

            esc_html__("Please choose an option ...","nivo") =>"",

            esc_html__("Font Bold","nivo") => "strong",

            esc_html__("Font Italic","nivo") => "em",

            esc_html__("Normal span tag","nivo") => "span"

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => esc_html__("Wrap class name","nivo"),

         "param_name" => "wrap_class1",

         "value" => "",

         "dependency" => array(

              "nivo" => "font_style1",

              "value"    => array("strong","em","span")

          ),
         "group" => esc_html__("Template", 'nivo'),

         "description" => esc_html__('Enter wrap class for title style', 'nivo')

    ),

    array(

       "type" => "textfield",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Title 2","nivo"),

       "param_name" => "title2",

       "value" => "",

       "dependency" => array(

            "nivo" => "no_title",

            "value"    => array("2","3","4")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Font style","nivo"),

       "param_name" => "font_style2",

        "value" => array(

             esc_html__("Please choose an option ...","nivo") =>"",

            esc_html__("Font Bold","nivo") => "strong",

            esc_html__("Font Italic","nivo") => "em",

            esc_html__("Normal span tag","nivo") => "span"

        ),

        "dependency" => array(

            "nivo" => "no_title",

            "value"    => array("2","3","4")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

     array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => esc_html__("Wrap class name","nivo"),

         "param_name" => "wrap_class2",

         "value" => "",

         "dependency" => array(

              "nivo" => "font_style2",

              "value"    => array("strong","em","span")

          ),
          "group" => esc_html__("Template", 'nivo'),

         "description" => esc_html__('Enter wrap class for title style', 'nivo')

    ),

    array(

       "type" => "textfield",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Title 3","nivo"),

       "param_name" => "title3",

       "value" => "",

       "dependency" => array(

            "nivo" => "no_title",

            "value"    => array("3","4")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Font style","nivo"),

       "param_name" => "font_style3",

        "value" => array(

             esc_html__("Please choose an option ...","nivo") =>"",

            esc_html__("Font Bold","nivo") => "strong",

            esc_html__("Font Italic","nivo") => "em",

            esc_html__("Normal span tag","nivo") => "span"

        ),

        "dependency" => array(

            "nivo" => "no_title",

            "value"    => array("3","4")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),
    array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => esc_html__("Wrap class name","nivo"),

         "param_name" => "wrap_class3",

         "value" => "",

         "dependency" => array(

              "nivo" => "font_style3",

              "value"    => array("strong","em","span")

          ),
          "group" => esc_html__("Template", 'nivo'),
         "description" => esc_html__('Enter wrap class for title style', 'nivo')

    ),

    array(

       "type" => "textfield",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Title 4","nivo"),

       "param_name" => "title4",

       "value" => "",

       "dependency" => array(

            "nivo" => "no_title",

            "value"    => array("4")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

     array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Font style","nivo"),

       "param_name" => "font_style4",

        "value" => array(

            "Please choose an option ..." =>"",

            "Font Bold" => "strong",

            "Font Italic" => "em"

        ),

        "dependency" => array(

            "nivo" => "no_title",

            "value"    => array("4")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Number Line","nivo"),

       "param_name" => "no_line",

       "value" => array(

            "Please choose an option ..." =>"",

            "1 line" => "1",

            "2 line" => "2"

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "colorpicker",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Color line 1","nivo"),

       "param_name" => "color_line1",

       "value" => "#272727",

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "colorpicker",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Color line 2","nivo"),

       "param_name" => "color_line2",

       "value" => "#272727",

        "dependency" => array(

            "nivo" => "no_line",

            "value"    => array("2")

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "dropdown",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Position Line","nivo"),

       "param_name" => "pos_line",

       "value" => array(

            "Please choose an option ..." =>"",

            "Before description" => "before",

            "After description" => "after"

        ),

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "textfield",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Margin bottom Line","nivo"),

       "param_name" => "margin_line",

       "value" => "",

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

       "type" => "textfield",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Font Icon For line","nivo"),

       "param_name" => "font_icon",

       "value" => "",

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),



    array(

       "type" => "textarea_html",

       "holder" => "div",

       "class" => "",

       "heading" => esc_html__("Description","nivo"),

       "param_name" => "content",

       "value" => '',

       "group" => esc_html__("Template", 'nivo'),

       "description" => ''

    ),

    array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => esc_html__("Extra class name","nivo"),

         "param_name" => "el_class",

         "value" => "",

         "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nivo')

    ),

   )

) );



}

class WPBakeryShortCode_qk_title extends WPBakeryShortCode {}

