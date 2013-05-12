<?php
/*
	Template Name: News Home
*/
?>
<?php get_header(); query_posts('posts_per_page=15');?>
<div id="content">
	<div class="feedContainer">
		<div class="twoThirds">
			<div class="secTitle">
				<h1>Randy's Blog</h1>
				<h2>Thoughts so deep, they're abysmal</h2>
			</div>
			<?php
			// Look for loop-index.php, fallback to loop.php
			get_template_part( 'loop', 'archive' );
			?>
		</div>
		<?php get_sidebar('graybox'); ?>
	</div>
</div>

<?php get_footer(); ?>