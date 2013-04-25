<?php

// Localization support, fetches languages files from /lang/
load_theme_textdomain( 'notesblog', TEMPLATEPATH . '/lang' );

// The default content width
if ( ! isset( $content_width ) ) $content_width = 640;

// The visual editor will use editor-style.css
add_editor_style();

// Add default posts and comments RSS feed links
add_theme_support( 'automatic-feed-links' );

// Add custom background support
add_custom_background();

// Add post thumbnails support (920x250px)
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 920, 250, true );

// Add some post formats
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video,', 'quote' ) );

// Add the Top Navigation menu
register_nav_menus( array(
	'top-navigation' => __( 'Top Navigation', 'notesblog' ),
) );

// WIDGET AREAS ->
// Beside the logo
register_sidebar( array(
    'name' => __( 'Beside the logo', 'notesblog' ),
    'id' => 'beside-the-logo',
    'description' => __( 'Widget area in the header, right of the logo.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Global right column
register_sidebar( array(
    'name' => __( 'Global right column', 'notesblog' ),
    'id' => 'global-right-column',
    'description' => __( 'The global right column sits on top of every right column, leave empty if unwanted.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Front page right column
register_sidebar( array(
    'name' => __( 'Front page right column', 'notesblog' ),
    'id' => 'front-page-right-column',
    'description' => __( 'Right column widget area used on the front page.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Posts right column
register_sidebar( array(
    'name' => __( 'Posts right column', 'notesblog' ),
    'id' => 'posts-right-column',
    'description' => __( 'Right column widget area for single posts.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Pages right column
register_sidebar( array(
    'name' => __( 'Pages right column', 'notesblog' ),
    'id' => 'pages-right-column',
    'description' => __( 'Right column widget area for Pages.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Archives right column
register_sidebar( array(
    'name' => __( 'Archives right column', 'notesblog' ),
    'id' => 'archives-right-column',
    'description' => __( 'Right column widget area for archive listings.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Right column fallback
register_sidebar( array(
    'name' => __( 'Right column fallback', 'notesblog' ),
    'id' => 'fallback-right-column',
    'description' => __( 'Right column fallback widget area for the rest.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Home column A
register_sidebar( array(
    'name' => __( 'Home column A', 'notesblog' ),
    'id' => 'home-column-a',
    'description' => __( 'The left column just below the menu on the front page.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="home-widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Home column B
register_sidebar( array(
    'name' => __( 'Home column B', 'notesblog' ),
    'id' => 'home-column-b',
    'description' => __( 'The middle column just below the menu on the front page.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="home-widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Home column C
register_sidebar( array(
    'name' => __( 'Home column C', 'notesblog' ),
    'id' => 'home-column-c',
    'description' => __( 'The right column just below the menu on the front page.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="home-widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Footer column A
register_sidebar( array(
    'name' => __( 'Footer column A', 'notesblog' ),
    'id' => 'footer-column-a',
    'description' => __( 'The far left column in the footer.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Footer column B
register_sidebar( array(
    'name' => __( 'Footer column B', 'notesblog' ),
    'id' => 'footer-column-b',
    'description' => __( 'The left middle column in the footer.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Footer column C
register_sidebar( array(
    'name' => __( 'Footer column C', 'notesblog' ),
    'id' => 'footer-column-c',
    'description' => __( 'The right middle column in the footer.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );
// Footer column D
register_sidebar( array(
    'name' => __( 'Footer column D', 'notesblog' ),
    'id' => 'footer-column-d',
    'description' => __( 'The far right column in the footer.', 'notesblog' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
) );

// pullquote shortcode (legacy support)
function pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'float' => '$align',
	), $atts));
   return '<blockquote class="pullquote ' . $float . '">' . $content . '</blockquote>';
}
add_shortcode('pull', 'pullquote');
// ends ---

// NOTES BLOG HOOKS
// Create the inside head wrap hook
function notesblog_inside_head() {
    do_action('notesblog_inside_head');
}
// Create the above wrap hook
function notesblog_above_site() {
    do_action('notesblog_above_site');
}
// Create the below menu hook
function notesblog_below_menu() {
    do_action('notesblog_below_menu');
}
// Create above single post hook
function notesblog_above_post() {
    do_action('notesblog_above_post');
}
// Create above post title in listings hook
function notesblog_above_post_title_listing() {
    do_action('notesblog_above_post_title_listing');
}
// Create below post title in listings hook
function notesblog_below_post_title_listing() {
    do_action('notesblog_below_post_title_listing');
}
// Create above post title in single post view
function notesblog_above_post_title_single() {
    do_action('notesblog_above_post_title_single');
}
// Create below post title in single post view
function notesblog_below_post_title_single() {
    do_action('notesblog_below_post_title_single');
}
// Create above page title in single page view
function notesblog_above_page_title_single() {
    do_action('notesblog_above_page_title_single');
}
// Create below page title in single page view
function notesblog_below_page_title_single() {
    do_action('notesblog_below_page_title_single');
}
// Create the between post and comments hook
function notesblog_below_post() {
    do_action('notesblog_below_post');
}
// Create the above footer hook
function notesblog_above_footer() {
    do_action('notesblog_above_footer');
}
// Create the below site hook
function notesblog_below_site() {
    do_action('notesblog_below_site');
}
// <- ENDS

// POSTMETA BELOW POST TITLE
function notesblog_add_postmeta_below_title() { ?>
	<div class="entry-meta">
	    <?php the_time( __( 'F j, Y', 'notesblog' ) ); ?>
	    <?php /*_e( 'Filed under', 'notesblog' ); ?> <span class="meta-category"><?php the_category(', '); ?></span>
	    <?php 
	    	// Check for tags, output if there are any
	     	if ( has_tag() ) {
	    		_e('and tagged ', 'notesblog');
	    		the_tags('<span class="meta-tags">', ', ', '</span>');
	    	} ?>
	    <?php
	    	// If the comments are open we'll need the comments template
	    	if (comments_open()) { ?>
	    		<span class="comments-link">
	    			<br /><?php comments_popup_link( __( 'Leave a comment', 'notesblog' ), __( '1 comment', 'notesblog' ), __( '% comments', 'notesblog' ) ); ?>
	    		</span>
	    <?php } */?>
	    <?php edit_post_link( __( 'Edit', 'notesblog' ), '<span class="meta-sep">&bull;</span> <span class="edit-link">', '</span>' ); ?>
	</div>
<?php }
// Add to listings and single post view
add_action('notesblog_below_post_title_listing', 'notesblog_add_postmeta_below_title');
add_action('notesblog_below_post_title_single', 'notesblog_add_postmeta_below_title');

// COMMENTS
function notesblog_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
         <?php printf(__('<h2 class="fn">%s</h2>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php }
?>