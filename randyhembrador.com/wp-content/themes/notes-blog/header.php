<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
	<?php 
		// Print the right title
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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	// Comment JavaScript
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	//  Use this hook to insert things into HEAD
	notesblog_inside_head();
	
	// Kick off WordPress
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="site">

	<?php
	    // Use this hook to insert things before the wrap
	    notesblog_above_site();
	?>

	<div id="outer-wrap"><div id="inner-wrap">
		<div id="header">
			<div class="header-widgetarea">
				<ul id="header-widgets">
	    		<?php 
	    		    // Adding the Beside the logo widget area, empty by default
	    		    dynamic_sidebar('beside-the-logo');
	    		?>
	    		</ul>
			</div>
			<?php if (is_home() || is_front_page()) { ?>
				<h1 id="site-header">
				    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				    	<?php bloginfo('name'); ?>
				    </a>
				</h1>
			<?php } else { ?>
				<div id="site-header">
				    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				    	<?php bloginfo('name'); ?>
				    </a>
				</div>
			<?php } ?>
		</div>
		<div id="blog">
			<div id="top-navigation"><?php wp_nav_menu('top-navigation'); ?></div>
			<?php
				// Use this hook to do things between the menu and the main content
				notesblog_below_menu();
			?>