<?php get_header(); ?>

	<?php 
		// Check for post thumbnail
		if (has_post_thumbnail( $post->ID ) ) { ?>
		<div id="post-thumbnail">
			<?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' ); ?>
		</div>
	<?php } ?>

	<div id="content" class="widecolumn">
		<?php
			// Look for loop-index.php, fallback to loop.php
			get_template_part( 'loop', 'single' );
		?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>