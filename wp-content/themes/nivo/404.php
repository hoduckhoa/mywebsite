<?php

get_header('404');

?>
<?php 
    $custom  = nivo_custom(); 
    $aq_content = isset($custom['404-editor']) ? $custom['404-editor'] : '';
?>


<div class="container">
    <div class="content_fullwidth">
        <div class="error-page">
            <h1 class="error_no text-center"><strong><?php esc_html_e('404!','nivo');?></strong></h1>
                <br>
            <?php echo apply_filters('the_content',$aq_content); ?>
            <div class="clearfix margin_t3"></div>
                <br>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-danger button_blue"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; <?php esc_html_e('Back to home', 'nivo'); ?></a>
        </div>
    </div>
</div>
<div class="clearfix"></div>
   
<?php get_footer(); ?>
