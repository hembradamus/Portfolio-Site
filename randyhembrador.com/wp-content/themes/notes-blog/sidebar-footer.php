<?php
	// Only show widget areas if there's anything in them
	// Thanks Twenty Ten
	if (   ! is_active_sidebar('footer-column-a')
		&& ! is_active_sidebar('footer-column-b')
		&& ! is_active_sidebar('footer-column-c')
		&& ! is_active_sidebar('footer-column-d')
	)
		return;
	// If we get this far, we have widgets. Then we move on!
?>

<div id="footer">
    <div class="footer-column-container">
    	<ul class="footer-column widgets">
    		<?php dynamic_sidebar('footer-column-a'); ?>
    	</ul>
    	<ul class="footer-column widgets">
    		<?php dynamic_sidebar('footer-column-b'); ?>
    	</ul>
    	<ul class="footer-column widgets">
    		<?php dynamic_sidebar('footer-column-c'); ?>
    	</ul>
    	<ul class="footer-column widgets">
    		<?php dynamic_sidebar('footer-column-d'); ?>
    	</ul>
    </div>
</div>