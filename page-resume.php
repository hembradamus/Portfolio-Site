<?php
/*
	Template Name: Resume Page
*/
?>
<?php get_header(); query_posts('page_id=125');?>
<div id="content">
	<div>
		<div style="width:1080px; margin:4rem auto;">
	  <?php while (have_posts()) : the_post();
			the_content();
		endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>