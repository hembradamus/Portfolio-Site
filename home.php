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
	  <div class="top-content">
	  	<h1>Commissioned Works</h1>
	  	Works produced as commissions and/or within the course employment. 
	  </div>
	  <div class="bottom-content">
		<ul id="proj-icons">
		<?php
			$comission_args = array(
				'post_type' => array ('interactive', 'static', 'video'),
				'meta_query' => array(
					array(
						'key' => 'hl_client',
						'value' => 'personal',
						'compare' => 'NOT LIKE'
					),
					array(
						'key' => 'hl_client',
						'value' => 'student',
						'compare' => 'NOT LIKE'
					),
					array(
						'key' => 'hl_client',
						'value' => 'Me',
						'compare' => 'NOT LIKE'
					)
				)
			);
			
			rewind_posts();
			query_posts( $comission_args );
			while (have_posts()) : the_post();
			
			$project_url = get_post_meta($post->ID, 'hl_url', $single = true);
			$thumbail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
		?>
		<li id="project-<?php the_ID(); ?>" class="proj-icon <?php echo get_post_type() ?>" style="background-image:url('<?php echo $thumbail; ?>');">
			<div class="reveal">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" rel="commissioned-works" >
					<div><span><?php the_title_attribute();?></span></div>
				</a>
				<ul class="iconIcons">
					<li>  
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" id="iconInfo" rel="commissionedWorks" >
							MORE INFO
						</a>
					</li>
					<li style="float:right;">
						<a href="<?php echo 'http://'.$project_url; ?>" title="<?php the_title_attribute(); ?>" class="port-link url" id="iconURL" target="_blank">
							VISIT SITE
						</a>
					</li>
					<li> 
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" id="iconView" rel="commissioned_works" >
							VIEW WORK
						</a>
					</li>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" id="iconPlay" rel="commissioned_Wrks" >
							PLAY VIDEO
						</a>
					</li>
				</ul>
			</div>
			<div class="proj-info">
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
	  <div class="top-content">
	  	<h1>Personal Projects</h1>
	  	Works made for fun, as homework for classes, or as personal favors for friends.
	  </div>
	  <div class="bottom-content">
		<ul id="proj-icons">
		<?php
			$personal_args = array(
				'post_type' => array ('interactive', 'static', 'video'),
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'hl_client',
						'value' => 'personal',
						'compare' => 'LIKE'
					),
					array(
						'key' => 'hl_client',
						'value' => 'student',
						'compare' => 'LIKE'
					),
					array(
						'key' => 'hl_client',
						'value' => 'Me',
						'compare' => 'LIKE'
					)
				)
			);
			
			rewind_posts();
			query_posts( $personal_args );
			while (have_posts()) : the_post();

			$project_url = get_post_meta($post->ID, 'hl_url', $single = true);
			$thumbail = get_post_meta($post->ID, 'hl_homethumb', $single = true);
			$format = custom_taxonomies_terms_links();
			
		?>
		<li id="project-<?php the_ID(); ?>" class="proj-icon <?php echo get_post_type() ?>" style="background-image:url('<?php echo $thumbail; ?>');">
			<div class="reveal">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" rel="personal-works" >
					<div><span><?php the_title_attribute();?></span></div>
				</a>
				<ul>
					<li>  
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" id="iconInfo" rel="personalWorks" >
							MORE INFO
						</a>
					</li>
					<li style="float:right;">
						<a href="<?php echo 'http://'.$project_url; ?>" title="<?php the_title_attribute(); ?>" class="port-link url" id="iconURL" target="_blank">
							VISIT SITE
						</a>
					</li>
					<li> 
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" id="iconView" rel="personal_works" >
							VIEW WORK
						</a>
					</li>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="proj-link fancybox.ajax" id="iconPlay" rel="personal_Wrks" >
							PLAY VIDEO
						</a>
					</li>
				</ul>
			</div>
			<div class="proj-info">
			  <h3><?php the_title_attribute();?></h3>
			  <?php the_content();?><br/>
			  Completed on <?php the_date();?><br/>
			  Format: <?php the_terms( $post->ID,'format',' ' ); ?>
			</div>
		</li>
		<?php endwhile;?>
		</ul>
	  </div>
	  </div><!--end section-content-->
	</div>
<!-----------end port-static----------->
	
</div>
<?php get_footer(); ?>