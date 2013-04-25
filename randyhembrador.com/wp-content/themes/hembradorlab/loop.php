<?php
	// When possible, display navigation at the top
	if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'notesblog' ) ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'notesblog' ) ); ?>
		</div>
	</div>
<?php endif; ?>

<?php
	// 404 Page Not Found or empty archives etc.
	if ( !have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title">
			<?php _e( 'Not Found', 'notesblog' ); ?>
		</h1>
		<div class="entry-content">
			<p><?php _e( 'Sorry, there is nothing here. You might want to try and search for whatever it was you were looking for?', 'notesblog' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php endif; ?>

<?php 
	// The basic loop
	while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_format( 'aside' ) ) { ?>
	    <div class="format-aside-permalink">
	    	<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">&para;</a>
	    </div>
	    <?php the_content(); ?>
	<?php } else { ?>
		<?php 
			// Use this hook to do things between above the post title
			notesblog_above_post_title_listing();
		?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php 
			// Use this hook to do things between below the post title
			notesblog_below_post_title_listing();
		?>
		<?php
			// For archives and search results, use the_excerpt()
			if ( is_home() || is_front_page() || is_archive() || is_search() ) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
					<div class="read-more">
					<div class="meta-category"><?php the_category(); ?></div>
						<ul>
	   					<li><?php
	   					   // If the comments are open we'll need the comments template
	   					   if (comments_open()) { ?>
	   					   	<span class="comments-link">
	   					   		<?php comments_popup_link( '','','','tip' ); ?>
	   					   	</span> 
	   					<?php } ?></li>
						<li><a href="<?php the_permalink(); ?>" title="Read more about <?php the_title_attribute(); ?>" rel="bookmark" id="readMore" class="tip"></a></li>
						</ul>
					</div>
				</div>
		<?php 
			// For everything else
			else : ?>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'notesblog' ), 'after' => '</div>' ) ); ?>
				</div>
		<?php endif; 
			// Comments only on single posts
			/*if ( is_singular() ) {
				comments_template( '', true ); 
			}*/
		} ?>
	</div>
<?php 
	// End the loop
	endwhile; ?>

<?php
	// When possible, display navigation at the bottom
	if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-below" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'notesblog' ) ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'notesblog' ) ); ?>
		</div>
	</div>
<?php endif; ?>