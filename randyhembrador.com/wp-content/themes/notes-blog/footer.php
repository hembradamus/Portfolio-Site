		<?php
		    // Use this hook to do things above the footer
		    notesblog_above_footer();

		    // The widgets are in sidebar-footer.php
		    get_sidebar('footer');
		?>
			
		</div><!-- /#blog -->
		
		<div id="copy">
		    <div class="widecolumn left">
		    	<p>Copyright &copy; <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a><br /><em><?php bloginfo('description'); ?></em></p>
		    </div>
		    <div class="column right">
		    	<p class="right"><?php _e('Built on', 'notesblog');?> <a href="http://notesblog.com" title="Notes Blog">Notes Blog</a> <?php _e('by', 'notesblog'); ?> <a href="http://tdh.me" title="TDH">TDH</a><br /><?php _e('Powered by', 'notesblog');?> <a href="http://wordpress.org" title="WordPress">WordPress</a></p>
		    </div>
		</div>
		
	</div></div>
		
	<div id="finalword"><span>&uarr;</span> <a href="#top" title="To page top"><?php _e('That\'s it - back to the top of page!', 'notesblog');?></a> <span>&uarr;</span></div>

</div>

<?php
    // Use this hook to do things below the site
    notesblog_below_site();
    
    // WordPress ends
    wp_footer();
?>
</body>
</html>