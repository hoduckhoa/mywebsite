<?php
$output = $title = $el_class = $taxonomy = '';
extract( shortcode_atts( array(
	'title' => esc_html__( 'Tags','nivo'),
	'taxonomy' => 'post_tag',
	'el_class' => ''
), $atts ) );

$el_class = $this->getExtraClass( $el_class );

$output = '<div class="vc_wp_tagcloud wpb_content_element' . $el_class . '">';
$type = 'WP_Widget_Tag_Cloud';
$args = array(
		'before_widget' => '<div class="ftags">',
	    'after_widget'  => '</div>',
	    'before_title'  => '<h3 class="nocaps">',
	    'after_title'   => '</h3>',
	);

ob_start();
the_widget( $type, $atts, $args );
$output .= ob_get_clean();

$output .= '</div>' . $this->endBlockComment( 'vc_wp_tagcloud' ) . "\n";

echo $output;