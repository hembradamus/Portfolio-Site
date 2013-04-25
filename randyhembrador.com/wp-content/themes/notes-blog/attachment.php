<?php get_header(); ?>

	<div id="content" class="fullcolumn">
		<?php
			// Look for loop-attachment.php, fallback to loop.php
			get_template_part( 'loop', 'attachment' );
		?>
	</div>

<?php get_footer(); ?>