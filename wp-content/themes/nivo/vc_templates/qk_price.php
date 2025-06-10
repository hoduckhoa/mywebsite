<?php

extract(shortcode_atts(array(
    'title' => '',
	'title1' =>'',
	'title2' =>'',
	'tpl'=> 'tpl1',
    'button_name' => '',
    'button_link'=>'',
    'el_class' => ''
), $atts));
ob_start();
$class[] = $el_class;
?>
<?php if($tpl == 'tpl1'):

?>
<div class="one_third <?php echo esc_attr($el_class );?>">
	<div class="fe-sec17_box">
		<ul>
			<li class="title"><i><?php echo esc_attr($title); ?></i></li>
            <li class="arrow"></li>
			<li class="price">$<?php echo esc_attr($title1); ?><i><?php echo esc_html__("/m","nivo");?></i> </li>
			<li class="details"><i><?php echo esc_attr($title2); ?></i></li>
		</ul>
		<?php echo apply_filters('the_content',$content);?>
          <div class="clearfix margin_t6"></div>
          <a href="<?php echo esc_url( $button_link); ?>" class="button_01"><?php echo esc_attr($button_name); ?></a>
          <div class="clearfix margin_t6"></div>
	</div>
</div>
<?php endif;
if($tpl == 'tpl2'):
?>
<div class="one_third <?php echo esc_attr($el_class );?>">
	<div class="fe-sec17_box helight">
		<ul>
			<li class="title"><?php echo esc_attr($title); ?></li>
            <li class="arrow"></li>
			<li class="price">$<?php echo esc_attr($title1); ?><i><?php echo esc_html__("/m","nivo");?></i> </li>
			<li class="details"><i><?php echo esc_attr($title2); ?></i></li>
		</ul>
		<?php echo apply_filters('the_content',$content);?>
          <div class="clearfix margin_t6"></div>
          <a href="<?php echo esc_url($button_link); ?>" class="button_02"><?php echo esc_attr($button_name); ?></a>
          <div class="clearfix margin_t6"></div>
	</div>
</div>
<?php endif;
 echo ob_get_clean(); ?>