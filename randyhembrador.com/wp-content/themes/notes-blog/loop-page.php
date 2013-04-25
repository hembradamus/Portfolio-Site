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
		    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'notesblog' ), 'after' => '</div>' ) ); ?>
		</div>
	</div>

	<?php if (comments_open()) { ?>
		<?php comments_template( '', true ); ?>
	<?php } ?>

<?php 
	// End the loop
	endwhile; ?>