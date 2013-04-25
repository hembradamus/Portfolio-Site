<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" class="fancySearch">
  <div>
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" title="Search" class="fancybox.ajax tip" />
	<!--input type="submit" id="searchsubmit" value="Search" /-->
  </div>
</form>