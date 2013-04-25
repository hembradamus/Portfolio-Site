<?php get_header(); ?>

<?php 
	// Top home widget area code is in sidebar-home.php
	get_sidebar('home');
?>

	<div id="content" class="widecolumn">
		<?php
			// Look for loop-home.php, fallback to loop.php
			get_template_part( 'loop', 'home' );
		?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>