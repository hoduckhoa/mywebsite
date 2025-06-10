<?php
extract(shortcode_atts(array(
  'title' => '',
  'sub_title' => '',
  'tpl' =>'tpl1',
  'fb_link'=>'',
  'tw_link'=>'',
  'g_link'=>'',
  'yt_link'=>'',
  'rss_link'=>'',
  'ln_link'=>'',
  'h_link'=>'',
  'ex_link'=>'',
  'ex_name' => 'Read More',
  'img_url'=>'',
  'el_class' => ''
), $atts));

$class = array();
$class[] = $el_class;
$img_url = esc_url(wp_get_attachment_url(intval($img_url)));
?>
<?php if($tpl == 'tpl1') {?>
  <div class="one_fourth <?php echo esc_attr( implode(' ',$class ) );?>">
  	<img src="<?php echo esc_url($img_url); ?>" class="rimg" alt="<?php echo esc_attr($title);?>" />
    <h4><?php echo esc_attr($title);?> <em>- <?php echo esc_attr($sub_title);?></em></h4>
        <div class="clearfix mar_top2"></div>        
            <?php echo apply_filters( 'the_content', $content );?>
      <div class="clearfix margin_t2"></div>
        <ul class="people_soci">
          <li><a href="<?php echo esc_url($fb_link); ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo esc_url($tw_link); ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo esc_url($g_link); ?>"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="<?php echo esc_url($yt_link); ?>"><i class="fa fa-youtube"></i></a></li>
          <li><a href="<?php echo esc_url($rss_link); ?>"><i class="fa fa-rss"></i></a></li>
        </ul>
  </div>
<?php } if($tpl == 'tpl2') {?>
  <div class="one_half animate <?php echo esc_attr( implode(' ',$class ) );?>"  data-anim-delay="300" >
    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title);?>" class="limage" /><br><br>
    <h3 class="white"><?php echo esc_attr( $title );?></h3>
    <p class="white"><?php echo apply_filters( 'the_content', $content );?></p><br/>
    <br />
    <a href="<?php echo esc_url($ex_link); ?>" class="button seven"><?php echo esc_attr( $ex_name );?></a>
  </div>
<?php } if($tpl == 'tpl3') {
  ?>
<div class="one_fourth <?php echo esc_attr( implode(' ',$class ) );?>">
  <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr( $title );?>"/>
  
    <h4><?php echo esc_attr( $title );?><em> - <?php echo esc_attr( $sub_title );?></em></h4>
       <ul class="people_soci">
          <li><a href="<?php echo esc_url($fb_link); ?>"><i class="fa fa-facebook"></i></a></li>
          <li><a href="<?php echo esc_url($tw_link); ?>"><i class="fa fa-twitter"></i></a></li>
          <li><a href="<?php echo esc_url($g_link); ?>"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="<?php echo esc_url($yt_link); ?>"><i class="fa fa-youtube"></i></a></li>
          <li><a href="<?php echo esc_url($rss_link); ?>"><i class="fa fa-rss"></i></a></li>
        </ul>
    <div class="clearfix mar_top2"></div>
     <?php echo apply_filters( 'the_content', $content );?>
  
</div>
<?php }  if($tpl == 'tpl4') {
  ?>
      <div class="one_fourth  animate <?php echo esc_attr( implode(' ',$class ) );?>" data-anim-delay="500"> 
          <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr( $title );?>" class="rimg" /> 
          <span><strong><?php echo esc_attr( $title );?></strong> <?php echo esc_attr( $sub_title );?></span>
        <div class="persoci"> 
            <a href="<?php echo esc_url($h_link); ?>"><i class="fa fa-plus"></i></a> 
            <a href="<?php echo esc_url($ln_link); ?>"><i class="fa fa-linkedin two"></i></a> 
            <a href="<?php echo esc_url($tw_link); ?>"><i class="fa fa-twitter two"></i></a> 
            <a href="<?php echo esc_url($fb_link); ?>"><i class="fa fa-facebook two"></i></a> 
          </div>
      </div>
<?php } ?>