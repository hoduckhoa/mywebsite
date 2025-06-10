<?php

$css = '';

extract(shortcode_atts(array(

	'tpl'=> 'tpl1',

	'type_heading' => 'h2',
    
    'h_class' => '',

	'no_title' => '1',

	'title1' => '',

	'font_style1' => '',

	'wrap_class1' => '',

	'title2' => '',

	'font_style2' => '',

	'wrap_class2' => '',

	'title3' => '',

	'font_style3' => '',

	'wrap_class3' => '',

	'title4' => '',

	'font_style4' => '',

	'no_line' => '1',

	'color_line1' => '',

	'color_line2' => '',

	'pos_line' => '',

	'margin_line' => '',

	'font_icon' => '',

    'el_class' => ''

), $atts));

$class[] = $el_class;

$type_heading = empty( $type_heading ) ? 'h2' : esc_attr( $type_heading );

?>

<?php if( $tpl =='tpl2' ):?>

	<div class="<?php echo esc_attr( implode(' ', $class) );?>">

	<<?php echo esc_attr($type_heading);?> class="<?php echo esc_attr($h_class);?>">

		<?php

			if( $no_line == '2' ){

				?>

				<span class="line2" <?php echo ! empty( $color_line2 ) ? 'style="background:'. esc_attr($color_line2) .'"' : '';?>></span>

				<?php

			}



			$show_line = $no_line > 0;



			if( $show_line  && $pos_line == 'before' ){

				?>

				<span class="line" <?php echo ! empty( $color_line1 ) ? 'style="background:'. esc_attr($color_line1) .'"' : '';?> ></span>

				<?php

			}



			for( $i = 1; $i < 5; $i++  ){

				$title = 'title' . $i;

				$font_style = 'font_style' . $i;

				if( ! empty( $$title ) ){

					if( empty( $$font_style ) ){

						echo esc_attr( $$title );

					}else{

						$wrap_class = 'wrap_class' . $i;
						$$font_style = esc_attr( $$font_style );
						if( ! empty( $$wrap_class ) ){
							$$font_style .= ' class="'. $$wrap_class .'"';
						}

						$$title = esc_attr( $$title );

						echo "<{$$font_style}>{$$title}</{$$font_style}>";

					}

				}

			}

		?>

	<?php

		if( $show_line && $pos_line == 'after' ){

			?>

			<span class="line"><?php if( ! empty( $font_icon ) ) echo '<i class="'. esc_attr( $font_icon ) .'"></i>';?></span>

			<?php

		}

	?>



	</<?php echo esc_attr($type_heading);?>>

	<?php echo apply_filters('the_content', $content ); ?>

	</div>

<?php else: ?>

	<div class="<?php echo esc_attr( implode(' ', $class) );?>">

		<<?php echo esc_attr($type_heading);?> class="<?php echo esc_attr($h_class);?>">

			<?php
				for( $i = 1; $i < 5; $i++  ){

					$title = 'title' . $i;

					$font_style = 'font_style' . $i;

					if( ! empty( $$title ) ){

						if( empty( $$font_style ) ){

							echo esc_attr( $$title );

						}else{

							$wrap_class = 'wrap_class' . $i;
							$$font_style = esc_attr( $$font_style );
							if( ! empty( $$wrap_class ) ){
								$$font_style .= ' class="'. $$wrap_class .'"';
							}

							$$title = esc_attr( $$title );

							echo "<{$$font_style}>{$$title}</{$$font_style}>";

						}

					}

				}
			?>

		</<?php echo esc_attr($type_heading);?>>

		<?php

			$style_line='';



			if( ! empty( $margin_line ) ) {

				if( $pos_line == 'before' ){

					$style_line .='margin-bottom:'. (float) $margin_line .'px;';

				}else{

					$style_line .='margin-top:'. (float) $margin_line .'px;';

				}

			}



			if( ! empty( $color_line1 ) ) {

				$style_line .= 'background:'. esc_attr($color_line1);

			}



			if( $pos_line == 'before' ){



				?>

				<div class="linebg_1" <?php echo ! empty( $style_line ) ? 'style="'. $style_line .'"' : '';?> ></div>

				<?php

			}

		;?>

	    <?php echo apply_filters('the_content', $content ); ?>

		<?php

			if( $pos_line == 'after' ){

				?>

				<div class="linebg_5" <?php echo ! empty( $style_line ) ? 'style="'. $style_line .'"' : '';?> ></div>

				<?php

			}

		?>

	</div>

<?php endif; ?>