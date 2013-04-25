<?php get_header();?>
        
<div id="home-content">

	<div id="home-frontpage" class="port-section">
	  <div class="section-content">
		<div id="latestLinks">
			<!--begin loop / latest works-->
			<?php
				$latest_args = array (
					'post_type' => array( 'interactive','static','video' ),
					'showposts' => '1'
				);
				
				$home_query = new WP_Query( $latest_args );
				while ($home_query->have_posts()) : $home_query ->the_post();
				$homebg = get_post_meta($post->ID, 'hl_latestbg', $single = true);
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="latest">
				<div id="home-latest-work" class="home-featured-item" style="background-image:url('<?php echo $homebg; ?>');">
				  <h2>LATEST WORK</h2>
					<?php the_title_attribute(); ?>
				</div>
			</a>
			<?php endwhile;?>            
			<!-- begin latest news-->
			<?php
				rewind_posts();
				query_posts('showposts=1');
				while (have_posts()) : the_post();
				$homebg = get_post_meta($post->ID, 'hl_latestbg', $single = true);
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="">
				<div id="home-latest-news" class="home-featured-item" style="background-image:url('<?php echo $homebg; ?>');">
					<h2>LATEST NEWS</h2>
					<?php the_title_attribute(); ?>
				</div>
			</a>
			<?php endwhile;?>
		</div>          
	  </div>
	</div>
      
	<div id="port-interactive" class="port-section">
	  <div class="section-content">
	  <div class="left-content">
	  	<h1>Interaction Design</h1>
	  	Websites, mobile apps and other work that changes when clicked or swiped, and possibly in the future, given a sideways glance and/or thought really hard about.
	  </div>
	  <div class="right-content">
		<ul id="int-icons">
		<?php
			$interactive_args = array (
				'post_type' => 'interactive',
				'showposts' => '16'
			);
			
			rewind_posts();
			query_posts( $interactive_args );
			while (have_posts()) : the_post();

			$project_url = get_post_meta($post->ID, 'hl_url', $single = true);
			$thumbail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
		?>
		<li id="int-project-<?php the_ID(); ?>" class="proj-icon" style="background-image:url('<?php echo $thumbail; ?>');">
			<div class="reveal">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link int-proj fancybox.ajax" id="intIconInfo" rel="interactive-works" >
					<div><?php the_title_attribute();?></div>
				</a>
				<ul>
					<li style="border-right:1px solid #ffffff;">  
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link int-proj fancybox.ajax" id="intIconInfo" rel="interactiveWorks" >
							MORE INFO
						</a>
					</li>
					<li>
						<a href="<?php echo 'http://'.$project_url; ?>" title="<?php the_title_attribute(); ?>" class="port-link url" id="intIconURL" 		target="_blank" >
							VISIT SITE
						</a>
					</li>
				</ul>
			</div>
			<div class="int-proj-info">
			  <h3><?php the_title_attribute();?></h3>
			  <?php the_content();?><br/>
			  Completed on <?php the_date();?><br/>
			  Format: <?php the_terms( $post->ID,'format',' ' ); ?>
			</div>
		</li>
		<?php endwhile;?>
		</ul>
	  </div>
	  </div>
	</div><!--end int-project-->
        
	<div id="port-static" class="port-section">
	  <div class="section-content">
	  <div class="left-content">
	  	<h1>Static Works</h1>
	  	Work that does not change no matter how many times it is clicked. Despite the inherent laziness on behalf of the piece itself, its production generally involved some degree of effort. These works tend to be more personal in nature.
	  </div>
	  <div class="right-content">
		<ul id="sta-icons">
		<?php
			$static_args = array (
				'post_type' => 'static',
				'showposts' => '20'
			);
			
			rewind_posts();
			query_posts( $static_args );
			while (have_posts()) : the_post();

			$project_url = get_post_meta($post->ID, 'hl_url', $single = true);
			$thumbail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
			$format = custom_taxonomies_terms_links();
			
		?>
			<li id="sta-<?php the_ID(); ?>" class="proj-icon" style="background-image:url('<?php echo $thumbail; ?>');">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link sta-proj fancybox.ajax" rel="static-works" >
					<div class="reveal">
						<span><?php the_title_attribute(); ?></span>
						<!--<hr>
						<?php  echo $format; ?>-->
					</div>
			   </a>
			</li>
		<?php endwhile;?>
		</ul>
	  </div>
	  </div><!--end section-content-->
	</div>
<!-----------end port-static----------->

	<div id="port-video" class="port-section">
	  <div class="section-content">
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
						<iframe src="<?php echo $vidURL; ?>" width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" wmode="opaque"></iframe>
					</div>
					<div id="vid-description">
						<h1><span class="title"><?php the_title(); ?></span></h1>
						<div class="profile-info">
							Completed on: <span class="date"><?php the_date(); ?></span><br/>
							Client: <span class="client"><?php echo $client; ?></span><br/>
						</div>
						<span class="description"><?php the_excerpt(); ?></span><br/>
					</div>
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
				</div><!--end video-content-->
				
				<?php endwhile;?>
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
								<h2>Now Playing</h2>
								(Click to scroll back to video)
							</div>
						</li>
					<?php endwhile;?>
				</ul>
			</div>
          </div><!--end section-content-->
        </div>
<!-----------end port-video----------->
<!--
	<div id="port-blog" class="port-section">
	  <div class="section-content">
	  <h1>Hemblogdortfoliblog</h1>
	  <h2>Latest Entries Show Below. To visit the full blog page, <a href="http://localhost:8888/hembradorlab/?page_id=172" target="_blank">click here</a>.</h2>
		<div id="blog-icons">
			<ul id="blog-icons">
			<?php
				rewind_posts();
				query_posts('showposts=3');
				while (have_posts()) : the_post();
				$thumbail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
			?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="news-article" id="news-<?php the_ID(); ?>" class="proj-link fancybox.ajax">
					<li class="proj-icon">
						<div>
							<h2><?php the_title_attribute(); ?></h2>
							<?php get_the_excerpt(); ?>
							<?php get_the_date();  ?>
						</div>
					</li>
				</a>
			<?php endwhile; ?>
			</ul>
		</div>
	  </div>
-->

<!-----------end port-news----------->
	
</div>
<?php get_footer(); ?>