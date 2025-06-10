	    <?php
			$custom  = nivo_custom();
			
			$aq_content = isset($custom['footer-text']) ? $custom['footer-text'] : '';
            $social = isset($custom['social_link']) ? $custom['social_link'] : '';
            $fb = isset($custom['facebook']) ? $custom['facebook'] : '';
            $tw = isset($custom['twitter']) ? $custom['twitter'] : '';
            $g = isset($custom['google']) ? $custom['google'] : '';
            $ln = isset($custom['linkedin']) ? $custom['linkedin'] : '';
            $sk = isset($custom['skype']) ? $custom['skype'] : '';
            $fl = isset($custom['flickr']) ? $custom['flickr'] : '';
            $ht = isset($custom['html5']) ? $custom['html5'] : '';
            $yt = isset($custom['youtube']) ? $custom['youtube'] : '';
            $rs = isset($custom['rss']) ? $custom['rss'] : '';
            $f1Active = is_active_sidebar( 'footer-1' );
            $f2Active = is_active_sidebar( 'footer-2' );
            $f3Active = is_active_sidebar( 'footer-3' );
            $f4Active = is_active_sidebar( 'footer-4' );
			
			if($custom['footer-widgets']=='yes'){
                
		    if ($f1Active || $f2Active || $f3Active || $f4Active ) :
		?>
	    <!-- ================================ -->
	    <!-- ========== START FOOTER  ========== -->
	    <!-- ================================ -->
		
		<div class="footer1">
			<div class="container">
                  <div class="one_fourth">
                      <?php if(is_active_sidebar( 'footer-1' )){ ?>
                        <?php dynamic_sidebar("footer-1") ?>	
                      <?php } ?>
                  </div>
                  <div class="one_fourth">
                      <?php if(is_active_sidebar( 'footer-2' )){ ?>
                        <?php dynamic_sidebar("footer-2") ?>	
                      <?php } ?>
                  </div>
                  <div class="one_fourth">
                      <?php if(is_active_sidebar( 'footer-3' )){ ?>
                        <?php dynamic_sidebar("footer-3") ?>	
                      <?php } ?>
                  </div>
                  <div class="one_fourth last">
                      <?php if(is_active_sidebar( 'footer-4' )){ ?>
                        <?php dynamic_sidebar("footer-4") ?>	
                      <?php } ?>
                  </div>
			</div><!--- END CONTAINER -->
		</div>
        <?php endif; ?>
			<?php } ?>
        <?php if( ($aq_content == True) || ( $social == True) )  { ?>
	    <div class="copyright_info">
			<div class="container">
				<div class="one_half">
				    <?php echo apply_filters('the_content',$aq_content); ?>
				</div>
                <div class="one_half last">
                    <?php if(nivo_get_object_option('social_link','social_link', false)):  ?>
                <ul class="footer_social_links">
                    <?php if ($custom['facebook']) { ?>    
                      <li><a href="<?php echo esc_url($fb); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['twitter']) { ?>
                      <li><a href="<?php echo esc_url($tw); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['google']) { ?>
                      <li><a href="<?php echo esc_url($g); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['linkedin']) { ?>
                      <li><a href="<?php echo esc_url($ln); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['skype']) { ?>
                      <li><a href="<?php echo esc_url($sk); ?>"><i class="fa fa-skype"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['flickr']) { ?>
                      <li><a href="<?php echo esc_url($fl); ?>"><i class="fa fa-flickr"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['html5']) { ?>
                      <li><a href="<?php echo esc_url($ht); ?>"><i class="fa fa-html5"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['youtube']) { ?>
                      <li><a href="<?php echo esc_url($yt); ?>"><i class="fa fa-youtube"></i></a></li>
                    <?php } ?>
                    <?php if ($custom['rss']) { ?>
                      <li><a href="<?php echo esc_url($rs); ?>"><i class="fa fa-rss"></i></a></li>
                    <?php } ?>
                </ul>
                   <?php endif; ?>
              </div>
			</div>
		</div>
        <?php } ?>
<a href="#" class="scrollup"><?php esc_html_e('Scroll','nivo');?></a>
	    <!-- ================================= -->
	    <!-- ========== END FOOTER  ========== -->
	    <!-- ================================ --> 
			
	</div>

<?php  wp_footer(); ?>

</body>
</html>