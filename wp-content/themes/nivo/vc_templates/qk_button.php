<?php
$css = '';
extract(shortcode_atts(array(
    'title' => '',
	'tpl'=>'tpl1',
	'has_icon'=> '',
	'icon' => '',
	'link'=>'#',
	'el_class' =>''
), $atts));
	if($tpl == 'tpl1'):
?>
<a href="<?php echo esc_url( $link );?>" class="<?php echo esc_attr($el_class);?>">
	<?php
	if( ! empty( $icon ) ):
		     echo '<span>';?>
			<i class="<?php echo esc_attr( $icon );?>"></i>
		<?php echo '</span>';
	endif;
	echo esc_attr( $title );
	?>
</a>

<?php  endif; ?>