<?php
extract(shortcode_atts(array(
	'type_icon' => 'icon',
    'icon' => '',
    'img_icon' => '',
    'wrap_icon' => '',
    'title' => '',
    'color_title' => '',
	'type_heading' => 'h3',
    'show_line' => '',
    'type_line' => 'linebg_2',
    'color_line' => '',
    'height_line' => '',
    'line_margin' => '',
	'tpl' =>'tpl1',
	'show_btn' => '',
    'btn_name' => '',
	'btn_link'=>'#',
	'btn_margin' => '',
	'type_btn' => 'one',
	'insert_clearfix' => '',
	'active_icon' => '',
	'wrap_txt' => '',
	'wrap_type' => 'div',
	'css' => '',
	'el_class' =>'',
	
), $atts));
$class = array();
$class[] = $active_icon;
$class[] = $el_class;
$class[] = vc_shortcode_custom_css_class( $css );
if( $type_list = $wrap_type == 'ul' ){
	$wrap_child = 'li';
}else{
	$wrap_type = $wrap_child = 'div';
}


$style_title='';
if( ! empty( $title ) ){
	$title =  $title ;
	$title_mf = explode( ',', $title );
	if( count( $title_mf ) > 1 ){
		$title = '<span>'. implode( '</span><span>', $title_mf ) .'</span>';
	}

	if( ! empty( $color_title ) ){
		$style_title = ' style=color:'. $color_title .';';
	}
}
 

if( $tpl == 'tpl1' ):
?>
<<?php echo esc_attr($wrap_type);?> class="<?php echo esc_attr( implode(' ', $class ) );?>">
	<?php
	// start wrap icon
	if( $type_list || ! empty( $wrap_icon ) ) echo '<'. $wrap_child .' class="'. esc_attr( $wrap_icon ) .' '. esc_attr( $active_icon ) .'">';
		if( $type_icon == 'img' && ! empty($img_icon) ):
			$img_icon = wp_get_attachment_url(intval($img_icon));
			?>
			<i class="<?php echo esc_attr( $active_icon );?>">
				<img src="<?php echo esc_url( $img_icon );?>" class="img-responsive" alt="icon thumb">
			</i>
			<?php
		elseif( ! empty( $icon ) ):
			$icon_class = array( $icon, $active_icon );
			if( strpos( $icon, 'fa' ) !== false ):
		 ?>
	    		<i class="<?php echo esc_attr( implode( ' ', $icon_class ) );?>"></i>
		<?php
				else:
		?>
				<!-- show simple icon -->
				<span aria-hidden="true" class="<?php echo esc_attr( implode( ' ', $icon_class ) );?>"></span>		
		<?php
			endif;
		endif;
	// end wrap icon
	if( $type_list || ! empty( $wrap_icon ) ) echo "</{$wrap_child}>";

	// open wrap text
	if( $type_list || ! empty( $wrap_txt ) ) echo '<'. $wrap_child .' class="'. esc_attr( $wrap_txt ) .'">';
	?>
	<!-- title -->
	<?php if( ! empty( $title ) ):
	?>
    <<?php echo esc_attr( $type_heading ); echo esc_attr($style_title); ?> class="nocaps">
    	<?php echo do_shortcode($title); ?>
    </<?php echo esc_attr( $type_heading );?>>
	<?php endif; ?>
	<!-- showline -->
	<?php if( $show_line ):
		$style_line = array();
		if( ! empty( $color_line) || ! empty( $height_line ) || ! empty( $line_margin) ){
			$style_line[] = 'style=';
			if( ! empty( $color_line ) ){
				$style_line[] = 'background-color:'. $color_line .';';
			}

			if( ! empty( $height_line ) ){
				$style_line[] = 'height:'. $height_line .';';
			}

			if( ! empty( $line_margin ) ){
				$style_line[] = 'margin-bottom:'. $line_margin .'px;';
			}
		}
	 ?>
		<div class="<?php echo esc_attr( $type_line );?>" <?php echo esc_attr( join( $style_line ) );?>></div>
	<?php endif; ?>
	<!-- description -->
    <?php if( ! empty( $content ) ) echo apply_filters('the_content', $content ); ?>
    <?php if( $insert_clearfix ) echo '<div class="clearfix"></div>';?>
    <?php if( $show_btn ):
     ?>
    	<a <?php if( ! empty( $btn_margin ) ) echo 'style="display:inline-block;margin-top:'. (int)$btn_margin .'px;"'; ?> href="<?php echo esc_url( $btn_link );?>" class="button <?php echo esc_attr( $type_btn );?>"><?php echo esc_attr( $btn_name );?></a>
    <?php endif;

    // close wrap text
    if( $type_list || ! empty( $wrap_txt ) ) echo "</{$wrap_child}>";
    ?>

</<?php echo esc_attr($wrap_type);?>>
<?php else:
$class[] = 'glyph-icon';
 ?>
	<div class="<?php echo esc_attr( implode( ' ', $class ) );?>">
		<?php if( $show_btn ): ?>
		<a href="<?php echo esc_url( $btn_link );?>">
			<span class="glyph-item mega" aria-hidden="true" data-icon="<?php echo esc_attr( $icon );?>"></span>
		</a> <br/>
		<?php endif; ?>
    	<h6 class="white" <?php echo esc_attr($style_title); ?>><?php echo esc_attr($title);?></h6>
    	<?php if( !empty( $content ) ) echo apply_filters('the_content', $content ); ?>
   	</div>
<?php endif; ?>