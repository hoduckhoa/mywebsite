<?php
extract(shortcode_atts(array(
    'icon' => '',
	'tpl' =>'tpl1',
    'title' => '',
	'ex_link'=>'',
	'el_class' =>'',
	
), $atts));
$icon = esc_attr($icon);
$class = array();               
$class[] = $el_class;

?>
<?php if($tpl == 'tpl1') {?>
    <ul class="section <?php echo esc_attr( $el_class );?>">
        <li class="left"><i class="<?php echo esc_attr($icon);?>"></i></li>
        <li><strong><?php echo esc_attr($title); ?></strong> <?php echo apply_filters( 'the_content', $content ); ?> 
            <a href="<?php echo esc_url($ex_link); ?>"><?php echo esc_html__('Read more','nivo'); ?> <i class="fa fa-caret-right"></i></a></li>
    </ul>
<?php } if($tpl == 'tpl3') {?>
      <div class="one_fourth animate <?php echo esc_attr( $el_class );?>">
        <div class="clearfix"></div>
        <h3 class="nocaps"><?php echo esc_attr($title); ?></h3>
        <i class="<?php echo esc_attr($icon);?>"></i>
        <?php echo apply_filters( 'the_content', $content ); ?>
        <br />
        <a href="<?php echo esc_url($ex_link); ?>" class="readmore_but1"><?php echo esc_html__('Read more +', 'nivo' ); ?></a> </div>
<?php } if($tpl == 'tpl2') {?>
    <div class="box <?php echo esc_attr( $el_class );?> animate" data-anim-type="fadeInUp" data-anim-delay="100"> <i class="<?php echo esc_attr($icon);?>"></i>
          <h4 class="roboto"><strong><?php echo esc_attr($title); ?></strong></h4>
          <?php echo apply_filters( 'the_content', $content ); ?>
    </div>
<?php } if($tpl == 'tpl4') {?>

    <div class="one_third <?php echo esc_attr( $el_class );?> animate" data-anim-type="fadeIn" data-anim-delay="300"> <i class="<?php echo esc_attr($icon);?>"></i>
          <h4><?php echo esc_attr($title); ?></h4>
          <?php echo apply_filters( 'the_content', $content ); ?>
    </div>
<?php } ?>