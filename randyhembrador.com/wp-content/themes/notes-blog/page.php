<?php get_header(); ?>

	<?php 
		// Check for post thumbnail
		if (has_post_thumbnail( $post->ID ) ) { ?>
		<div id="post-thumbnail">
			<?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' ); ?>
		</div>
	<?php } ?>

	<div class="postSingle">
		<article id="vid-<?php the_ID(); ?>" class="postContent">
			<section id="postProfile">
				<?php comments_popup_link( __( 'No Comments' ), __( '1 comment' ), __( '% comments' ) ); ?>
				<div class="meta-category"><?php the_category(); ?></div>
			</section>
			<section id="postText">
			<?php
				// Look for loop-index.php, fallback to loop.php
				get_template_part( 'loop','single' );
			?>
			</section>
		</article>
		<section class="postComments">
			<?php
			// Use this hook to do things between the post and the comments
			notesblog_below_post();
		
			if (comments_open()) { ?>
			<?php comments_template( '', true ); ?>
		<?php } ?>
		</section>
	</div>
    
<?php get_footer(); ?>