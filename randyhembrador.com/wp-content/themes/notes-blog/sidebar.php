<div id="sidebar-container" class="column">
	<ul id="sidebar">
		<?php 
			// Global right sidebar (always on)
			dynamic_sidebar('global-right-column');

			// Front page
			if ( is_home() || is_front_page() ) {
				dynamic_sidebar('front-page-right-column');
			} 
			// Single post
			elseif ( is_single() ) {
				dynamic_sidebar('posts-right-column');
			} 
			// Page
			elseif ( is_page() ) {
				dynamic_sidebar('pages-right-column');
			} 
			// Archive listings
			elseif ( is_archive() ) {
				dynamic_sidebar('archives-right-column');
			} 
			// Fallback widget area
			else {
				dynamic_sidebar('fallback-right-column');
			}
		?>
	</ul>
</div>