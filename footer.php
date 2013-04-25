		<?php
		    // Use this hook to do things above the footer
		    notesblog_above_footer();

		    // The widgets are in sidebar-footer.php
		    get_sidebar('footer');
		?>
			
		<div id="copy">
			<div id="innerFooter">
				<h5>That's all, folks!</h5>
			    <h2><?php bloginfo('name'); ?> &copy;2013 Randy Hembrador</h2>
				<p><?php _e('Powered by', 'notesblog');?> <a href="http://wordpress.org" title="WordPress">WordPress</a>. <?php _e('Built on', 'notesblog');?> <a href="http://notesblog.com" title="Notes Blog">Notes Blog </a><?php _e('by', 'notesblog'); ?> <a href="http://tdh.me" title="TDH">TDH</a>. About, Resume, Contact, and Search icons from <a href="http://thenounproject.com/">The Noun Project</a>. All other code and art assets &copy; Randy Hembrador. All other trademarks are the copyright of their respective owners.</p>
			</div>
		</div>

	<div id="backstage" style="display:none;">
	  <div id="aboutPage" style="display:block">
	  <?php
	  		rewind_posts();
			query_posts('page_id=128');
			while (have_posts()) : the_post();
			the_title('<h1>', '</h1>');
			the_content();
		endwhile; ?>
	  </div>
	  <div id="resumePage" style="display:block">
	  <?php
	  		rewind_posts();
			query_posts('page_id=125');
			while (have_posts()) : the_post();
			the_content();
		endwhile; ?>
	  </div>
	  <div id="contactForm" style="display:block">
	  <?php
	  		rewind_posts();
			query_posts('page_id=126');
			while (have_posts()) : the_post();
			the_title('<h1>', '</h1>');
			the_content();
		endwhile; ?>
	  </div>
	  <div id="homeSearch" style="display:block;width:100%;height:100%;">
		<div id="loading">
			<img src="http://localhost:8888/hembradorlab/wp-content/themes/hembradorlab/inc/lightbox/fancybox_loading.gif"/>
		</div>
		<div id="success">
			<h1>You Win!</h1>
			There's so much <span class="searchTerm">this</span> on this site!!!
			<div id="searchResults">
				<div class="template result">
					<h2><a href="url"></a></h2>
					<span id="date"></span><br/>
					<span id="excerpt"></span><br/>
				</div>
				<div id="resultContainer">
				</div>
			</div>
		</div>
		<div id="fail">
			<h1>Nope!</h1>
			There no search for <span class="searchTerm">this</span>!!!! You look for something else!!!!
		</div>
	  </div>
	</div>
<?php
    // Use this hook to do things below the site
    notesblog_below_site();
    
    // WordPress ends
    wp_footer();
?>
</body>
</html>