<?php
	// Only show widget areas if there's anything in them
	// Thanks Twenty Ten
	if (   ! is_active_sidebar('home-column-a')
		&& ! is_active_sidebar('home-column-b')
		&& ! is_active_sidebar('home-column-c')
	)
		return;
	// If we get this far, we have widgets. Then we move on!
?>

	<div id="home-header">
	    <ul class="header-column header-column-left widgets">
	        <?php if (is_active_sidebar('home-column-a')) :
	        	dynamic_sidebar('home-column-a'); 
	        endif; ?>
	    </ul>
	    <ul class="header-column header-column-middle widgets">
	        <?php if (is_active_sidebar('home-column-b')) : 
	        	dynamic_sidebar('home-column-b'); 
	        endif; ?>
	    </ul>
	    <ul class="header-column header-column-right widgets">
	        <?php if (is_active_sidebar('home-column-c')) : 
	        	dynamic_sidebar('home-column-c'); 
	        endif; ?>
	    </ul>
	</div>