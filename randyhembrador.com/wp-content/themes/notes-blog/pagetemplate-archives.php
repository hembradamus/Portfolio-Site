<?php
/*
Template Name: Archives
*/
?>

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
		// The basic loop
		while ( have_posts() ) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php 
				// Use this hook to do things above below the page title
				notesblog_above_page_title_single();
			?>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
			<?php 
				// Use this hook to do things above below the page title
				notesblog_below_page_title_single();
			?>
			<?php edit_post_link( __( 'Edit', 'notesblog' ), '<div class="entry-meta">', '</div>' ); ?>
			<div class="entry-content">
			    <?php the_content(); ?>
				<h2><?php _e('Browse by Month:', 'notesblog');?></h2>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				<h2><?php _e('Browse by Category:', 'notesblog');?></h2>
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
				<h2><?php _e('Browse by Tag:', 'notesblog');?></h2>
				<?php wp_tag_cloud('smallest=8&largest=28&number=0&orderby=name&order=ASC'); ?>
			</div>
		</div>
	
		<?php if (comments_open()) { ?>
			<?php comments_template( '', true ); ?>
		<?php } ?>
	
	<?php 
		// End the loop
		endwhile; ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>