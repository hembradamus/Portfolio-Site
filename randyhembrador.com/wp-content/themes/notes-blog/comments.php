<div id="comments">
<?php 
	// Password protected?
	if ( post_password_required() ) : ?>
		<p class="nopassword">
			<?php _e( 'This post is password protected. Enter the password to view any comments.', 'notesblog' ); ?>
		</p>
</div>
<?php
		// Stop comments.php from being processed
		return;
	endif;
?>

<?php 
	// There are comments
	if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php printf( _n( 'One response to %2$s', '%1$s responses to %2$s', get_comments_number(), 'notesblog' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?>
		</h3>

<?php 
	// Do we need pagination?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation">
		    <div class="nav-previous">
		    	<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older comments', 'notesblog' ) ); ?>
		    </div>
		    <div class="nav-next">
		    	<?php next_comments_link( __( 'Newer comments <span class="meta-nav">&rarr;</span>', 'notesblog' ) ); ?>
		    </div>
		</div>
<?php endif; ?>

		<ol class="commentlist">
		    <?php
		    	// Loop comments, dictaded by notesblog_comment() from functions.php
		    	wp_list_comments('callback=notesblog_comment');
		    ?>
		</ol>

<?php 
	// Do we need pagination?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation">
		    <div class="nav-previous">
		    	<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'notesblog' ) ); ?>
		    </div>
		    <div class="nav-next">
		    	<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'notesblog' ) ); ?>
		    </div>
		</div>
<?php endif; ?>

<?php 
	// There were no comments
	else :

		// Comments were closed
		if ( ! comments_open() ) : ?>
			<p class="nocomments">
				<?php _e( 'Sorry, comments are closed.', 'notesblog' ); ?>
			</p>
		<?php endif;
	
	// Wrap up have_comments()
	endif;
?>

<?php 
	// The comment form
	comment_form( array(
		'comment_field' => '<p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'comment_notes_after' => '',
	) ); 
?>

</div>