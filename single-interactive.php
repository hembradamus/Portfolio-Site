<?php get_header(); ?>

	<div id="content" class="widecolumn">
		<?php 
			// The basic loop
			while ( have_posts() ) : the_post();
			$overview = get_post_meta($post->ID, 'hl_overview', $single = true);
			$challenges = get_post_meta($post->ID, 'hl_challenges', $single = true);
			$achievements = get_post_meta($post->ID, 'hl_achievements', $single = true);
			$url = get_post_meta($post->ID, 'hl_url', $single = true);
			$client = get_post_meta($post->ID, 'hl_client', $single = true);
			$supplement = get_post_meta($post->ID, 'hl_supplement', $single = true);

			// Use this hook to do things between above the post
			notesblog_above_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('proj-content'); ?>>
			<section id="intDescription" class="left-content">
				<h1 class="entry-title"><?php the_title_attribute(); ?></h1>
				<nav id="intTabs">
					<a href="" id="intOverview" class="intButton intCurrent">Overview</a>
					<a href="" id="intChallenges" class="intButton">Challenges</a>
					<a href="" id="intAchievements" class="intButton">Achievements</a>
				</nav>
				<div id="descContainter">
					<div id="overview" class="intDescription">
						<?php echo wpautop($overview); ?>
					</div>
					<div id="challenges" class="intDescription">
						<?php echo wpautop($challenges); ?>
					</div>
					<div id="achievements" class="intDescription">
						<?php echo wpautop($achievements); ?>
					</div>
				</div>
			</section>
			
			<section id="intProfile" class="right-content">
				<div id="images">
					<?php the_content(); ?>
				</div>
				<h2>Project Details</h2>
				<div class="profile-info">
					<a href="<?php echo 'http://'.$url; ?>" id="intURL" target="_blank"><?php echo $url; ?></a><br/>
					<span class="disableLinks"><?php the_taxonomies(); ?></span><br/>
					Completion Date: <?php the_date(); ?><br/>
					Client: <?php echo $client; ?><br/>
					Supplements: <?php echo $supplement; ?><br/>
				</div>
				<div id="social-media">
				</div>
			</section>
		</article>
			
		<div class="nav-links">
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'notesblog' ), 'after' => '</div>' ) ); ?>
		</div>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>