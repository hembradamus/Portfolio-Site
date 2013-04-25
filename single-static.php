<?php get_header(); ?>

	<div id="content" class="widecolumn">
		<?php 
			// The basic loop
			while ( have_posts() ) : the_post();
			$overview = get_post_meta($post->ID, 'hl_overview', $single = true);
			$challenges = get_post_meta($post->ID, 'hl_challenges', $single = true);
			$achievements = get_post_meta($post->ID, 'hl_achievements', $single = true);
			$client = get_post_meta($post->ID, 'hl_client', $single = true);
			$supplement = get_post_meta($post->ID, 'hl_supplement', $single = true);
			$projImg = get_post_meta($post->ID, 'hl_url', $single = true);

			// Use this hook to do things between above the post
			notesblog_above_post();
		?>

		<artcile id="post-<?php the_ID(); ?>" <?php post_class('proj-content'); ?>>
			<section id="staImage" class="left-content">
				<img src="<?php echo $projImg; ?>" class="staImgFile" />
			</section>
			
			<section id="staRight" class="right-content">
				<h1  class="entry-title"><?php the_title_attribute(); ?></h1>
				<?php the_content(); ?>
				<div class="profile-info">
					<span class="disableLinks"><?php the_taxonomies(); ?></span><br/>
					Completed: <?php the_date(); ?><br/>
					Client: <?php echo $client; ?><br/>
				</div>
			</section>
		</article>
			
		<div class="nav-links">
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'notesblog' ), 'after' => '</div>' ) ); ?>
		</div>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>