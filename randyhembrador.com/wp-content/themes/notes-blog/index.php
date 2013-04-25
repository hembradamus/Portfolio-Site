<?php get_header(); ?>

	<div id="content" class="widecolumn">
		<?php
			// Look for loop-index.php, fallback to loop.php
			get_template_part( 'loop', 'index' );
		?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>