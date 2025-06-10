<?php



$css = '';

extract(shortcode_atts(array(

	'tpl' => 'tpl1',

    'order' => '',

    'el_class' => ''

), $atts));



$class[] = $el_class;

$order = $order > 0 ? (int)$order : -1;

$args = array('post_type'=>'testimonial','posts_per_page' => $order);

$q = new WP_Query($args);

?>

<?php if($tpl == 'tpl1'): ?>

<section class="<?php echo esc_attr( implode(' ', $class ) );?>">

  	<div class="flexslider carousel">

	    <ul class="slides">

	    	<?php if( $q->have_posts()): while( $q->have_posts() ) : $q->the_post();?>

			<li>


				<div class="cimag"><?php the_post_thumbnail('full'); ?></div>

				<br />

				<h5 class="white"><?php the_title(); ?> <em><?php echo esc_attr( get_post_meta( get_the_ID(), '_nivo_tm_sub_name', true ) ); ?></em></h5>

				<div class="divider_line_small"></div>

				<?php the_content(); ?>

				<br />


			</li>

			<?php endwhile; endif; wp_reset_postdata(); ?>

		</ul>

  	</div>

</section>


<?php endif;?>