<?php get_header(); ?>

	<div id="content" class="widecolumn">
		<div id="video-container">
			<?php
				$video_args = array (
					'post_type' => 'video',
					'showposts' => '1'
				);
				
				rewind_posts();
				query_posts( $video_args );
				while (have_posts()) : the_post();
				
				$vidRawURL = get_the_content();
					if (strpos($vidRawURL, "vimeo")!==false){
						$rawPrefix = 'http://vimeo.com';
						$newPrefix = 'http://player.vimeo.com/video';
						$vidURL = substr_replace($vidRawURL, $newPrefix, $rawPrefix, 16);
					}else if (strpos($vidRawURL, "youtube")!==false){
						$ytURL_array = parse_url($vidRawURL);
						$ytURL = "http://www.youtube.com/embed/".$ytURL_array['query']."?feature=oembed";
						$vidURL = substr_replace($ytURL, "http://www.youtube.com/embed/", "http://www.youtube.com/embed/v=", 31);
					}else{
						$vidURL = 'POOOOOOP';
					}
				$title = get_the_title($post->ID);
				$date = get_the_date();
				$description = get_the_excerpt();
				$project_url = get_post_meta($post->ID, 'hl_url', $single = true);
				$thumbnail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
				$client = get_post_meta($post->ID, 'hl_client', $single = true);
				$format = custom_taxonomies_terms_links();
				?>					
				<div id="vid-<?php the_ID(); ?>" class="video-content">
					<div id="video-player">
						<iframe src="<?php echo $vidURL; ?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
					</div>
					<div id="vid-description">
					
						<section class="left-content">
							<h1><span class="title"><?php the_title(); ?></span></h1>
							<span class="description"><?php the_excerpt(); ?></span><br/>
						</section>
						
						<section class="right-content">
							<h2>Project Details</h2>
							<div class="profile-info">
								Completed on: <span class="date"><?php the_date(); ?></span><br/>
								Client: <span class="client"><?php echo $client; ?></span><br/>
							</div>
						</section>
					</div>
					<div id="currentVidTitle">
						<h2>NOW PLAYING:</h2>
						<h1><span class="vid-title"><?php the_title(); ?></span></h1>
						<nav>
							<ul>
								<li><a href="#" title="More Info" id="vidInfo" class="tip"></a></li>
								<li><a href="#" title="More Videos" id="vidMore" class="tip"></a></li>
							</ul>
						</nav>
					</div>
				<?php endwhile;?>
				</div><!--end video-content-->
			</div>
			<div id="iconContainer">
				<ul id="vid-icons" class="grayBox">
				<h2>More Videos</h2>
					<?php
						$video_args = array (
							'post_type' => 'video',
							'showposts' => '20'
						);
						
						rewind_posts();
						query_posts( $video_args );
						while (have_posts()) : the_post();
		
						$project_url = get_post_meta($post->ID, 'hl_url', $single = true);
						$thumbail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
					?>
						<li class="proj-icon" style="background-image:url('<?php echo $thumbail; ?>');">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="reveal" rel="video-projects" id="vid-<?php the_ID(); ?>" >
								<div>
								   <?php the_title_attribute(); ?>
								</div>
							</a>
							<div class="now-playing">
								Now Playing
							</div>
						</li>
					<?php endwhile;?>
				</ul>
			</div>
	</div>

<?php get_footer(); ?>