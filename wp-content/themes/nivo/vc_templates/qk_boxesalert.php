<?php
extract(shortcode_atts(array(
  'icon' => '',
  'title' => '',
  'color'=>'',
  'css' => '',
  'el_class' => ''
), $atts) );

$class = array( 'boxes-alert' );
$class[] = $el_class;
$class[] = vc_shortcode_custom_css_class( $css );
?>
<div class="<?php echo esc_attr( implode(' ', $class) );?>" <?php if( ! empty( $color ) ) echo 'style="color:'. esc_attr( $color ) .'"'; ?>>
	<?php if( ! empty( $icon ) ): ?>
		<i class="<?php echo esc_attr( $icon );?>"></i>
	<?php endif; ?>
	<?php if( ! empty( $title ) ) echo do_shortcode( $title );?>
</div><!-- end section -->