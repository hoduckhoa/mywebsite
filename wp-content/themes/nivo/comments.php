<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php  global $textdomain; ?>
<!-- COMMENTS -->
<div class="comment-container" id="comments">
	<div class="row">
		<div class="col-sm-12">
	<?php if ( have_comments() ) { ?> 
		<h5><?php esc_html_e('Comments','nivo');?></h5>
		<div class="mar_top_bottom_lines_small3"></div>  
		<div class="comments list-unstyled b-bottom clearfix">
            <?php wp_list_comments('type=comment&style=div&callback=nivo_theme_comment'); ?>
           <?php wp_list_comments('type=pings&style=div&callback=nivo_theme_pings'); ?>
		</div>
	<?php
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<footer class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'nivo' ); ?></h1>
				<div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'nivo' ) ); ?></div>
				<div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'nivo' ) ); ?></div>
			</footer><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'nivo' ); ?></p>
		<?php endif; ?>
	<?php } ?>
		</div>
	</div>
</div><!-- //COMMENTS -->

<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$comment_args = array(
	'id_form'           => 'send-form',
  	'id_submit'         => 'submit',
  	'class_submit' => 'comment_submit',
	'title_reply'=> '<h5>'.esc_html__('Leave a Comment','nivo').'</h5>',
	'comment_field' => '<textarea name="comment" class="comment_textarea_bg" id="comment" rows="20" cols="7" placeholder="'.esc_html__('Your comment here','nivo').'..."></textarea>',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input type="text" class="comment_input_bg" name="author" id="author" placeholder="'.esc_html__('Name*', 'nivo').'"  value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '>',
		'email' => '<input type="text" class="comment_input_bg" name="email" id="email" placeholder="'.esc_html__('Email*', 'nivo').'" value="'. esc_attr($commenter['comment_author_email']) .'" '. $aria_req .'>',
		'url' => '<input id="url" class="comment_input_bg" name="url" type="text" placeholder="'.esc_html__('website', 'nivo').'"  value="' . esc_attr( $commenter['comment_author_url'] ) .
		    '" />',
	) ),
	'label_submit' => esc_html__('Submit Comment','nivo'),
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	);

?>
<?php global $post; ?>
<?php if('open' == $post->comment_status){ ?>
<!-- LEAVE A COMMENT -->
	<div class="comment_form">		
		<?php comment_form( $comment_args ); ?>	
	</div><!-- end comment form -->
      
<div class="clearfix margin_t2"></div>
<?php } ?>