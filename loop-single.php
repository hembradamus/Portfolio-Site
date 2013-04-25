<?php 
	// The basic loop
	while ( have_posts() ) : the_post();

	// Use this hook to do things between above the post
	notesblog_above_post();
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
			// Use this hook to do things above below the post title
			notesblog_above_post_title_single();
		?>
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
		<?php 
			// Use this hook to do things above below the post title
			notesblog_below_post_title_single();
		?>
		<div class="entry-content">
		    <?php the_content(); ?>
		    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'notesblog' ), 'after' => '</div>' ) ); ?>
		</div>
	</div>
	
	<?php
	    // Use this hook to do things between the post and the comments
	    /*notesblog_below_post();
	
		if (comments_open()) { ?>
		<?php comments_template( '', true ); ?>
	<?php } */?>

<?php 
	// End the loop
	endwhile; ?>