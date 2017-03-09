<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="blog_comments_form">
	<?php
		$comment_args = array(
			'title_reply'=> __('Submit a comment'),
			'logged_in_as' => '',
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '
					<div class="row">
						<div class="col-sm-6">
							<p class="comment-form-author">
								<input class="blog_comments_field" id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .'" size="30" '. ( $req ? ' required' : '' ) . $aria_req .' placeholder="Name*" />
							</p>
						</div>',   
				'email'  => '
						<div class="col-sm-6">
							<p class="comment-form-email">
								<input class="blog_comments_field" id="email" name="email" type="email" value="'. esc_attr(  $commenter['comment_author_email'] ) .'" size="30" '. ( $req ? ' required' : '' ) . $aria_req .' placeholder="Email*" />
							</p>
						</div>
					</div>',
				'url'    => ''
			) ),
			'comment_field' => '
				<p>
					<textarea class="blog_comments_textarea" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Your comment"></textarea>
				</p>',
			'comment_notes_after' => '',
			'label_submit' => __('Submit'),
		);
		//--tracking event submit comment--
		?>
    <script>
    jQuery(document).ready(function($) {
        $('#submit').on("click",function() {
            ga('send', 'event', 'Comment', 'Submit');
            console.log('onClick fired!');
        });
    });
    </script>
<?php
	//--tracking event submit comment ends--
		comment_form($comment_args);
	?>
</div>

<div class="comments-area" id="comments">

	<?php if ( have_comments() ) : ?>
		<ol class="commentlist">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
					'callback'    => 'wtc_comment'
				) );
			?>
		</ol>
		
		<?php if(get_comment_pages_count() != '1') { ?>
			<div class="pagination_wrapper">
				<ul class="pagination">
					<?php $pages = paginate_comments_links( array( 'echo' => false, 'type' => 'array', 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ) ); ?>
					<?php foreach($pages as $page) { ?>
						<?php if (strpos($page,'current') !== false) { ?>
							<li class="active"><?php echo $page; ?></li>
						<?php } else { ?>
							<li><?php echo $page; ?></li>
						<?php } ?>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	<?php endif; // have_comments() ?>

</div><!-- .comments-area -->
