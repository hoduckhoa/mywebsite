<?php 
/*
*Template Name: Template VC
*/

get_header(); ?>
<?php if(function_exists('vc_add_param')){ ?>
<?php while(have_posts()):the_post(); ?>
<?php the_content(); ?>
   <?php endwhile; ?>
<?php } ?>

<?php get_footer(); ?>