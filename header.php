<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
	<?php // Print the right title
		if (is_home () ) { 
			bloginfo('name'); 
		} elseif (is_category() || is_tag()) { 
			single_cat_title(); echo ' &bull; ' ; bloginfo('name'); 
		} elseif (is_single() || is_page()) { 
			single_post_title(); } else { wp_title('',true); 
		}
	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	notesblog_inside_head();
	wp_head();
?>
<!--
/* @license
 * MyFonts Webfont Build ID 2498552, 2013-03-07T15:12:01-0500
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Geometra Rounded Bold by Wiescher Design
 * URL: http://www.myfonts.com/fonts/wiescherdesign/geometra-rounded/bold/
 * Copyright: Copyright (c) 2011 by Gert Wiescher, Wiescher-Design, Munich, Germany,
 * www.wiescher-design.de,. All rights reserved.
 * 
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2498552
 * 
 * © 2013 MyFonts Inc
*/

-->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/inc/fonts/MyFontsWebfontsKit/MyFontsWebfontsKit.css">
<script type="text/javascript" src="//use.typekit.net/iqu0sqv.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body <?php body_class(); ?>>
	<?php if (is_home() || is_front_page()) {?>
	<header id="homeHeader" class="homeHeader">
		<div id="waypointTrigger" style="height:10px;position:absolute;top:80%;width:100%;"></div>
		<div id="topIconTrigger" style="background:transparent;height:10px;position:fixed;top:90%;width:100%;"></div>
		<nav id="secondary_menu">
			<ul>
				<li id="about">
					<a href="index.php?page_id=128" title="About Randy" id="aboutIcon" class="tip"></a>
				</li>
				<li id="resume">
					<a href="index.php?page_id=125" title="Resume" id="resumeIcon" class="tip"></a>
				</li>
				<li id="contact">
					<a href="index.php?page_id=126" title="Contact Randy" id="contactIcon" class="tip"></a>
				</li>
				<li id="searchField">
					<?php get_search_form( $echo ); ?>
				</li>
			</ul>
		</nav>
		<div id="title">
			<h1><?php bloginfo('name'); ?></h1>
			<h2>Interaction Designer</h2>
		</div>
		<nav id="top-navigation" class="port-nav">
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<div id="smallTitle">
					<h1>H!</h1>				
				</div>
			</a>
			<?php wp_nav_menu('container=false'); ?>
		</nav>
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
		<div id="homeFooter">
			<img src="<?php bloginfo('url'); ?>/wp-content/themes/hembradorlab/inc/graphics/logo.png"/><br/>
			Copyright MMXIII Randy S. Hembrador.
		</div>
	</header>

	<?php } else {?>
	<header id="blogHeader" class="blogSite">
		<nav id="secondary_menu">
			<ul>
				<li id="about">
					<a href="index.php?page_id=128" title="About Randy" id="aboutIcon" class="tip"></a>
				</li>
				<li id="resume">
					<a href="index.php?page_id=125" title="Resume" id="resumeIcon" class="tip"></a>
				</li>
				<li id="contact">
					<a href="index.php?page_id=126" title="Contact Randy" id="contactIcon" class="tip"></a>
				</li>
				<li id="searchField">
					<?php get_search_form( $echo ); ?>
				</li>
			</ul>
		</nav>
		<div id="title">
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<div id="smallTitle">
					<h1>H!</h1>				
				</div>
			</a>
		</div>
		<nav id="top-navigation" class="port-nav">
			<?php wp_nav_menu('container=false'); ?>
		</nav>
		<a href="#" title="Scroll to Top" id="scrollTop"></a>
	</header>
	<div id="blog">
	<?php
		notesblog_below_menu(); ?>
	<?php } ?>