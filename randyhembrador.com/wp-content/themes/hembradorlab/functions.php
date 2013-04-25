<?php
// Create the 'Interactive Works', 'Static Works', and 'Video Projects' Post Types
add_action( 'init', 'create_post_type' );
function create_post_type() {
  $int_labels = array(
    'name' => _x('Interactive Works', 'post type general name'),
    'singular_name' => _x('Interactive Work', 'post type singular name'),
    'add_new' => _x('Add New', 'interactive'),
    'add_new_item' => __('Add New Interactive Work'),
    'edit_item' => __('Edit Interactive Work'),
    'new_item' => __('New Interactive Work'),
    'all_items' => __('All Interactive Works'),
    'view_item' => __('View Interacive Works'),
    'search_items' => __('Search Interactive Works'),
    'not_found' =>  __('No Interactive Works found'),
    'not_found_in_trash' => __('No Interactive Works found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('Interactive Works')

  );
  $int_args = array(
    'labels' => $int_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true,
	'menu_position' => 2,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'rewrite' => array('slug' => 'interactive'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'show_in_nav_menus' => true
  ); 
  $sta_labels = array(
    'name' => _x('Static Works', 'post type general name'),
    'singular_name' => _x('Static Work', 'post type singular name'),
    'add_new' => _x('Add New', 'static'),
    'add_new_item' => __('Add New Static Work'),
    'edit_item' => __('Edit Static Work'),
    'new_item' => __('New Static Work'),
    'all_items' => __('All Static Works'),
    'view_item' => __('View Static Works'),
    'search_items' => __('Search Static Works'),
    'not_found' =>  __('No Static Works found'),
    'not_found_in_trash' => __('No Static Works found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('Static Works')

  );
  $sta_args = array(
    'labels' => $sta_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true,
	'menu_position' => 3,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'rewrite' => array('slug' => 'static'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'show_in_nav_menus' => true
  );
  $vid_labels = array(
    'name' => _x('Video Projects', 'post type general name'),
    'singular_name' => _x('Video Project', 'post type singular name'),
    'add_new' => _x('Add New', 'video'),
    'add_new_item' => __('Add New Video Project'),
    'edit_item' => __('Edit Video Project'),
    'new_item' => __('New Video Project'),
    'all_items' => __('All Video Projects'),
    'view_item' => __('View Video Projects'),
    'search_items' => __('Search Video Projects'),
    'not_found' =>  __('No Video Projects found'),
    'not_found_in_trash' => __('No Video Projects found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => __('Video Project')

  );
  $vid_args = array(
    'labels' => $vid_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true,
	'menu_position' => 4,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'rewrite' => array('slug' => 'video'),
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'show_in_nav_menus' => true
  );
  register_post_type('interactive',$int_args);
  register_post_type('static',$sta_args);
  register_post_type('video',$vid_args);
}


// Create the 'Format' taxonomy for custom post types
add_action( 'init', 'newtaxonomies', 0);
function newtaxonomies() {
	register_taxonomy(
		'format', 
		array('interactive','static','video' ),
		array(
			'hierarchical' => true,
			'label' => 'Format',
			'query_var' => true,
			'rewrite' => array( 'slug' => 'format' ),
		)
	);
}


// Create the custom data fields and metaboxes for the 'Works' custom post type (developed by rilwis at http://www.deluxeblogtips.com/meta-box/)
	/*
	 * @author: Rilwis
	 * @url: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
	 * @usage: please read document at project homepage and meta-box-usage.php file
	 * @version: 3.0.1
	 */
	 
	 /********************* BEGIN DEFINITION OF META BOXES ***********************/
	
	// prefix of meta keys, optional
	// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
	// you also can make prefix empty to disable it
	$prefix = 'hl_';
	
	$meta_boxes = array();

	// Project details section
	$meta_boxes[] = array(
		'id' => 'hldetails',
		'title' => 'Project Details',
		'pages' => array('interactive','static','video'),
		'context' => 'normal',
		'priority' => 'high',
	
		'fields' => array(
			array(
				'name' => 'URL',
				'id' => $prefix . 'url',
				'type' => 'text',
				'std' => 'Type URL here',
				'validate_func' => 'check_name'
			),
			array(
				'name' => 'Client Name',
				'id' => $prefix . 'client',
				'type' => 'text',
				'std' => 'Name of comissioning client',
				'validate_func' => 'check_name'
			),	
		)
	);
	
	
	// Secondary Descriptions section
	$meta_boxes[] = array(
		'id' => 'extradescriptions',
		'title' => 'Secondary Descriptions',
		'pages' => array('interactive'),
		'context' => 'normal',
		'priority' => 'high',
	
		'fields' => array(
			array(
				'name' => 'Overview',
				'id' => $prefix . 'overview',
				'type' => 'textarea',
				'std' => '',
				'validate_func' => 'check_name'
			),
			array(
				'name' => 'Challenges',
				'id' => $prefix . 'challenges',
				'type' => 'textarea',
				'std' => '',
				'validate_func' => 'check_name'
			),
			array(
				'name' => 'Achievements',
				'id' => $prefix . 'achievements',
				'type' => 'textarea',
				'std' => '',
				'validate_func' => 'check_name'
			),
		)
	);
	
	// Special thumbs section
	$meta_boxes[] = array(
		'id' => 'hlthumbs',
		'title' => 'Special Thumbnails',
		'pages' => array('interactive','static','video'),
		'context' => 'normal',
		'priority' => 'high',
	
		'fields' => array(
			array(
				'name' => 'Latest Item BG',
				'id' => $prefix . 'latestbg',
				'type' => 'text',
				'validate_func' => 'check_name'
			),
			array(
				'name' => 'Homepage Thumbnail',
				'id' => $prefix . 'homethumb',
				'type' => 'text',
				'validate_func' => 'check_name'
			),
		)
	);


	// Supplements Section
	$meta_boxes[] = array(
		'id' => 'details',
		'title' => 'Supplements',
		'pages' => array('interactive'),
		'context' => 'side',
		'priority' => 'low',
	
		'fields' => array(
			array(
				'name' => '',
				'desc' => '',
				'id' => $prefix . 'supplements',
				'type' => 'file'
			),
		)
	);

	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box($meta_box);
		}
		
	/********************* END DEFINITION OF META BOXES ***********************/
	
	/********************* BEGIN VALIDATION ***********************/
	
	/**
	 * Validation class
	 * Define ALL validation methods inside this class
	 * Use the names of these methods in the definition of meta boxes (key 'validate_func' of each field)
	 */
	class RW_Meta_Box_Validate {
		function check_name($text) {
			if ($text == 'Anh Tran') {
				return 'He is Rilwis';
			}
			return $text;
		}
	}
	
	/********************* END VALIDATION ***********************/
	 
	// Ajax delete files on the fly. Modified from a function used by "Verve Meta Boxes" plugin (http://goo.gl/LzYSq)
	add_action('wp_ajax_rw_delete_file', 'rw_delete_file');
	function rw_delete_file() {
		if (!isset($_POST['data'])) return;
		list($post_id, $key, $attach_id, $src, $nonce) = explode('!', $_POST['data']);
		if (!wp_verify_nonce($nonce, 'rw_ajax_delete_file')) {
			_e('You don\'t have permission to delete this file.');
		}
		wp_delete_attachment($attach_id);
		delete_post_meta($post_id, $key, $src);
		_e('File has been successfully deleted.');
		die();
	}
	/**
	 * Meta Box class
	 */
	class RW_Meta_Box {
	
		protected $_meta_box;
		protected $_fields;
	
		// Create meta box based on given data
		function __construct($meta_box) {
			if (!is_admin()) return;
	
			// assign meta box values to local variables and add it's missed values
			$this->_meta_box = $meta_box;
			$this->_fields = & $this->_meta_box['fields'];
			$this->add_missed_values();
	
			add_action('admin_menu', array(&$this, 'add'));	// add meta box
			add_action('save_post', array(&$this, 'save'));	// save meta box's data
	
			/* check for some special fields and add needed actions for them
			REMOED FROM HEMBRADORLAB BECAUSE THESE WERE BREAKING WP3.5 MEDIA UPLOAD AND VIZ EDITOR
			$this->check_field_upload();
			$this->check_field_date();*/
		}
	
		/******************** BEGIN UPLOAD **********************/
/*REMOED BY HEMBRADOR LAB	
		// Check field upload and add needed actions
		function check_field_upload() {
			if ($this->has_field('image') || $this->has_field('file')) {
				add_action('post_edit_form_tag', array(&$this, 'add_enctype'));				// add data encoding type for file uploading
				add_action('admin_head-post.php', array(&$this, 'add_script_upload'));		// add scripts for handling add/delete images
				add_action('admin_head-post-new.php', array(&$this, 'add_script_upload'));
				add_action('delete_post', array(&$this, 'delete_attachments'));				// delete all attachments when delete post
			}
		}
	
		// Add data encoding type for file uploading
		function add_enctype() {
			echo ' enctype="multipart/form-data"';
		}
	
		// Add scripts for handling add/delete images
		function add_script_upload() {
			echo '
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				// add more file
				$(".rw-add-file").click(function(){
					var $first = $(this).parent().find(".file-input:first");
					$first.clone().insertAfter($first).show();
					return false;
				});
	
				// delete file
				$(".rw-delete-file").click(function(){
					var $parent = $(this).parent(),
						data = $(this).attr("rel");
					$.post(ajaxurl, {action: \'rw_delete_file\', data: data}, function(response){
						$parent.fadeOut("slow");
						alert(response);
					});
					return false;
				});
			});
			</script>';
		}
	
		// Delete all attachments when delete post
		function delete_attachments($post_id) {
			$attachments = get_posts(array(
				'numberposts' => -1,
				'post_type' => 'attachment',
				'post_parent' => $post_id
			));
			if (!empty($attachments)) {
				foreach ($attachments as $att) {
					wp_delete_attachment($att->ID);
				}
			}
		}
	
		/******************** END UPLOAD **********************/
	
		/******************** BEGIN DATE PICKER **********************/
/*REMOED BY HEMBRADOR LAB		
		// Check field date
		function check_field_date() {
			if ($this->has_field('date') && $this->is_edit_page()) {
				// add style and script, must use jQuery UI 1.7.3 to get rid of confliction with WP admin scripts
				wp_enqueue_style('rw-jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.3/themes/base/jquery-ui.css');
				wp_enqueue_script('rw-jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.3/jquery-ui.min.js', array('jquery'));
				add_action('admin_head', array(&$this, 'add_script_date'));
			}
		}
	
		// Custom script for date picker
		function add_script_date() {
			$dates = array();
			foreach ($this->_fields as $field) {
				if ('date' == $field['type']) {
					$dates[$field['id']] = $field['format'];
				}
			}
			echo '
			<script type="text/javascript">
			jQuery(document).ready(function($){
			';
			foreach ($dates as $id => $format) {
				echo "$('#$id').datepicker({
					dateFormat: '$format',
					showButtonPanel: true
				});";
			}
			echo '
			});
			</script>
			';
		}
	
		/******************** END DATE PICKER **********************/
	
		/******************** BEGIN META BOX PAGE **********************/
	
		// Add meta box for multiple post types
		function add() {
			foreach ($this->_meta_box['pages'] as $page) {
				add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
			}
		}
	
		// Callback function to show fields in meta box
		function show() {
			global $post;
	
			wp_nonce_field(basename(__FILE__), 'rw_meta_box_nonce');
			echo '<table class="form-table">';
	
			foreach ($this->_fields as $field) {
				$meta = get_post_meta($post->ID, $field['id'], !$field['multiple']);
				$meta = !empty($meta) ? $meta : $field['std'];
	
				echo '<tr>';
				// call separated methods for displaying each type of field
				call_user_func(array(&$this, 'show_field_' . $field['type']), $field, $meta);
				echo '</tr>';
			}
			echo '</table>';
		}
	
		/******************** END META BOX PAGE **********************/
	
		/******************** BEGIN META BOX FIELDS **********************/
	
		function show_field_begin($field, $meta) {
			echo "<th style='width:20%'><label for='{$field['id']}'>{$field['name']}</label></th><td>";
		}
	
		function show_field_end($field, $meta) {
			echo "<br />{$field['desc']}</td>";
		}
	
		function show_field_text($field, $meta) {
			$this->show_field_begin($field, $meta);
			echo "<input type='text' name='{$field['id']}' id='{$field['id']}' value='$meta' size='30' style='width:97%' />";
			$this->show_field_end($field, $meta);
		}
	
		function show_field_textarea($field, $meta) {
			$this->show_field_begin($field, $meta);
			echo "<textarea name='{$field['id']}' cols='60' rows='5' style='width:97%'>$meta</textarea>";
			$this->show_field_end($field, $meta);
		}
	
		function show_field_select($field, $meta) {
			if (!is_array($meta)) $meta = (array) $meta;
			$this->show_field_begin($field, $meta);
			echo "<select name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";
			foreach ($field['options'] as $key => $value) {
				echo "<option value='$key'" . selected(in_array($key, $meta), true, false) . ">$value</option>";
			}
			echo "</select>";
			$this->show_field_end($field, $meta);
		}
	
		function show_field_radio($field, $meta) {
			$this->show_field_begin($field, $meta);
			foreach ($field['options'] as $key => $value) {
				echo "<input type='radio' name='{$field['id']}' value='$key'" . checked($meta, $key, false) . " /> $value ";
			}
			$this->show_field_end($field, $meta);
		}
	
		function show_field_checkbox($field, $meta) {
			$this->show_field_begin($field, $meta);
			echo "<input type='checkbox' name='{$field['id']}'" . checked(!empty($meta), true, false) . " /> {$field['desc']}</td>";
		}
	
		function show_field_wysiwyg($field, $meta) {
			$this->show_field_begin($field, $meta);
			echo "<textarea name='{$field['id']}' class='theEditor' cols='60' rows='15' style='width:97%'>$meta</textarea>";
			$this->show_field_end($field, $meta);
		}
	
		function show_field_file($field, $meta) {
			global $post;
	
			if (!is_array($meta)) $meta = (array) $meta;
			
			$this->show_field_begin($field, $meta);
			echo "{$field['desc']}<br />";
	
			if (!empty($meta)) {
				// show attached files
				$attachs = get_posts(array(
					'numberposts' => -1,
					'post_type' => 'attachment',
					'post_parent' => $post->ID
				));
				
				$nonce = wp_create_nonce('rw_ajax_delete_file');
	
				echo '<div style="margin-bottom: 10px"><strong>' . _('Uploaded files') . '</strong></div>';
				echo '<ol>';
				foreach ($attachs as $att) {
					if (wp_attachment_is_image($att->ID)) continue; // what's image uploader for?
	
					$src = wp_get_attachment_url($att->ID);
					if (in_array($src, $meta)) {
						echo "<li>" . wp_get_attachment_link($att->ID) . " (<a class='rw-delete-file' href='javascript:void(0)' rel='{$post->ID}!{$field['id']}!{$att->ID}!{$src}!{$nonce}'>Delete</a>)</li>";
					}
				}
				echo '</ol>';
			}
	
			// show form upload
			echo "<div style='clear: both'><strong>" . _('Upload new files') . "</strong></div>
				<div class='new-files'>
					<div class='file-input'><input type='file' name='{$field['id']}[]' /></div>
					<a class='rw-add-file' href='javascript:void(0)'>" . _('Add more file') . "</a>
				</div>
			</td>";
		}
	
		function show_field_image($field, $meta) {
			global $post;
	
			if (!is_array($meta)) $meta = (array) $meta;
	
			$this->show_field_begin($field, $meta);
			echo "{$field['desc']}<br />";
	
			if (!empty($meta)) {
				// show attached images
				$attachs = get_posts(array(
					'numberposts' => -1,
					'post_type' => 'attachment',
					'post_parent' => $post->ID,
					'post_mime_type' => 'image', // get attached images only
					'output' => ARRAY_A
				));
	
				$nonce = wp_create_nonce('rw_ajax_delete_file');
	
				echo '<div style="margin-bottom: 10px"><strong>' . _('Uploaded images') . '</strong></div>';
				foreach ($attachs as $att) {
					$src = wp_get_attachment_image_src($att->ID, 'full');
					$src = $src[0];
	
					if (in_array($src, $meta)) {
						echo "<div style='margin: 0 10px 10px 0; float: left'><img width='150' src='$src' /><br />
								<a class='rw-delete-file' href='javascript:void(0)' rel='{$post->ID}!{$field['id']}!{$att->ID}!{$src}!{$nonce}'>Delete</a>
							</div>";
					}
				}
			}
	
			// show form upload
			echo "<div style='clear: both'><strong>" . _('Upload new images') . "</strong></div>
				<div class='new-files'>
					<div class='file-input'><input type='file' name='{$field['id']}[]' /></div>
					<a class='rw-add-file' href='javascript:void(0)'>" . _('Add more image') . "</a>
				</div>
			</td>";
		}
	
		function show_field_color($field, $meta) {
			if (empty($meta)) $meta = '#';
			$this->show_field_begin($field, $meta);
			echo "<input type='text' name='{$field['id']}' id='{$field['id']}' value='$meta' size='8' />
				  <a href='#' id='select-{$field['id']}'>" . _('Select a color') . "</a>
				  <div style='display:none' id='picker-{$field['id']}'></div>";
			$this->show_field_end($field, $meta);
		}
	
		function show_field_checkbox_list($field, $meta) {
			if (!is_array($meta)) $meta = (array) $meta;
			$this->show_field_begin($field, $meta);
			$html = array();
			foreach ($field['options'] as $key => $value) {
				$html[] = "<input type='checkbox' name='{$field['id']}[]' value='$key'" . checked(in_array($key, $meta), true, false) . " /> $value";
			}
			echo implode('<br />', $html);
			$this->show_field_end($field, $meta);
		}
	
		function show_field_date($field, $meta) {
			$this->show_field_text($field, $meta);
		}
	
		function show_field_time($field, $meta) {
			$this->show_field_text($field, $meta);
		}
	
		/******************** END META BOX FIELDS **********************/
	
		/******************** BEGIN META BOX SAVE **********************/
	
		// Save data from meta box
		function save($post_id) {
			$post_type_object = get_post_type_object($_POST['post_type']);
	
			if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)						// check autosave
			|| (!isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])			// check revision
			|| (!in_array($_POST['post_type'], $this->_meta_box['pages']))			// check if current post type is supported
			|| (!check_admin_referer(basename(__FILE__), 'rw_meta_box_nonce'))		// verify nonce
			|| (!current_user_can($post_type_object->cap->edit_post, $post_id))) {	// check permission
				return $post_id;
			}
	
			foreach ($this->_fields as $field) {
				$name = $field['id'];
				$type = $field['type'];
				$old = get_post_meta($post_id, $name, !$field['multiple']);
				$new = isset($_POST[$name]) ? $_POST[$name] : ($field['multiple'] ? array() : '');
	
				// validate meta value
				if (class_exists('RW_Meta_Box_Validate') && method_exists('RW_Meta_Box_Validate', $field['validate_func'])) {
					$new = call_user_func(array('RW_Meta_Box_Validate', $field['validate_func']), $new);
				}
	
				// call defined method to save meta value, if there's no methods, call common one
				$save_func = 'save_field_' . $type;
				if (method_exists($this, $save_func)) {
					call_user_func(array(&$this, 'save_field_' . $type), $post_id, $field, $old, $new);
				} else {
					$this->save_field($post_id, $field, $old, $new);
				}
			}
		}
	
		// Common functions for saving field
		function save_field($post_id, $field, $old, $new) {
			$name = $field['id'];
	
			// single value
			if (!$field['multiple']) {
				if ('' != $new && $new != $old) {
					update_post_meta($post_id, $name, $new);
				} elseif ('' == $new) {
					delete_post_meta($post_id, $name, $old);
				}
				return;
			}
	
			// multiple values
			// get new values that need to add and get old values that need to delete
			$add = array_diff($new, $old);
			$delete = array_diff($old, $new);
			foreach ($add as $add_new) {
				add_post_meta($post_id, $name, $add_new, false);
			}
			foreach ($delete as $delete_old) {
				delete_post_meta($post_id, $name, $delete_old);
			}
		}
	
		function save_field_textarea($post_id, $field, $old, $new) {
			$new = htmlspecialchars($new);
			$this->save_field($post_id, $field, $old, $new);
		}
	
		function save_field_wysiwyg($post_id, $field, $old, $new) {
			$new = wpautop($new);
			$this->save_field($post_id, $field, $old, $new);
		}
	
		function save_field_file($post_id, $field, $old, $new) {
			$name = $field['id'];
			if (empty($_FILES[$name])) return;
	
			$this->fix_file_array($_FILES[$name]);
	
			foreach ($_FILES[$name] as $position => $fileitem) {
				$file = wp_handle_upload($fileitem, array('test_form' => false));
	
				if (empty($file['file'])) continue;
				$filename = $file['file'];
	
				$attachment = array(
					'post_mime_type' => $file['type'],
					'guid' => $file['url'],
					'post_parent' => $post_id,
					'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
					'post_content' => ''
				);
				$id = wp_insert_attachment($attachment, $filename, $post_id);
				if (!is_wp_error($id)) {
					wp_update_attachment_metadata($id, wp_generate_attachment_metadata($id, $filename));
					add_post_meta($post_id, $name, $file['url'], false);	// save file's url in meta fields
				}
			}
		}
	
		// Save images, call save_field_file, cause they use the same mechanism
		function save_field_image($post_id, $field, $old, $new) {
			$this->save_field_file($post_id, $field, $old, $new);
		}
	
		/******************** END META BOX SAVE **********************/
	
		/******************** BEGIN HELPER FUNCTIONS **********************/
	
		// Add missed values for meta box
		function add_missed_values() {
			// default values for meta box
			$this->_meta_box = array_merge(array(
				'context' => 'normal',
				'priority' => 'high',
				'pages' => array('post')
			), $this->_meta_box);
	
			// default values for fields
			foreach ($this->_fields as $key => $field) {
				$multiple = in_array($field['type'], array('checkbox_list', 'file', 'image')) ? true : false;
				$std = $multiple ? array() : '';
				$format = 'date' == $field['type'] ? 'yy-mm-dd' : ('time' == $field['type'] ? 'hh:mm' : '');
				$this->_fields[$key] = array_merge(array(
					'multiple' => $multiple,
					'std' => $std,
					'desc' => '',
					'format' => $format,
					'validate_func' => ''
				), $field);
			}
		}
	
		// Check if field with $type exists
		function has_field($type) {
			foreach ($this->_fields as $field) {
				if ($type == $field['type']) return true;
			}
			return false;
		}
	
		// Check if current page is edit page
		function is_edit_page() {
			global $pagenow;
			if (in_array($pagenow, array('post.php', 'post-new.php'))) return true;
			return false;
		}
	
		/**
		 * Fixes the odd indexing of multiple file uploads from the format:
		 *     $_FILES['field']['key']['index']
		 * To the more standard and appropriate:
		 *     $_FILES['field']['index']['key']
		 */
		function fix_file_array(&$files) {
			$output = array();
			foreach ($files as $key => $list) {
				foreach ($list as $index => $value) {
					$output[$index][$key] = $value;
				}
			}
			$files = $output;
		}
	
		/******************** END HELPER FUNCTIONS **********************/
	}

// Add sorting columns to the 'Works' listing in the admin section. Code used here is by Joost de Valk on http://yoast.com/custom-post-type-snippets/
	// Change the columns for the edit CPT screen
		function change_columns( $cols ) {
		  $cols = array(
			'cb'       => '<input type="checkbox" />',
			'title'      => __( 'Title', 'trans' ),
			'hl_client'     => __( 'Client', 'trans' ),
			'date'     => __( 'Posting Date', 'trans' ),
		  );
		  return $cols;
		}
		add_filter( "manage_interactive_posts_columns", "change_columns" );
		
		function custom_columns( $column, $post_id ) {
		  switch ( $column ) {
			case "title":
			  $title = get_post_meta( $post_id, 'title', true);
			  echo '<a href="' . $title . '">' . $title. '</a>';
			  break;
			case "hl_client":
			  echo get_post_meta( $post_id, 'hl_client', true);
			  break;
			case "date":
			  $date = get_post_meta( $post_id, 'date', true);
			  echo '<a href="' . $date . '">' . $date. '</a>';
			  break;
		  }
		}
		
		add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );
		
	// Make these columns sortable
		function sortable_columns() {
		  return array(
			'title'      => 'title',
			'projecttype' => 'projecttype',
			'hl_client' => 'hl_client',
			'date'     => 'date'
		  );
		}
		
		add_filter( "manage_edit-interactive_sortable_columns", "sortable_columns" );
		
	
	// Add "Project Type" taxonomy drop-down
		function taxonomy_filter_restrict_manage_posts() {
			global $typenow;
		
			// If you only want this to work for your specific post type,
			// check for that $type here and then return.
			// This function, if unmodified, will add the dropdown for each
			// post type / taxonomy combination.
		
			$post_types = get_post_types( array( '_builtin' => false ) );
		
			if ( in_array( $typenow, $post_types ) ) {
				$filters = get_object_taxonomies( $typenow );
		
				foreach ( $filters as $tax_slug ) {
					$tax_obj = get_taxonomy( $tax_slug );
					wp_dropdown_categories( array(
						'show_option_all' => __('Show All '.$tax_obj->label ),
						'taxonomy' 	  => $tax_slug,
						'name' 		  => $tax_obj->name,
						'orderby' 	  => 'name',
						'selected' 	  => $_GET[$tax_slug],
						'hierarchical' 	  => $tax_obj->hierarchical,
						'show_count' 	  => false,
						'hide_empty' 	  => true
					) );
				}
			}
		}
		add_action( 'restrict_manage_posts', 'taxonomy_filter_restrict_manage_posts' );
			
		function taxonomy_filter_post_type_request( $query ) {
		  global $pagenow, $typenow;
		
		  if ( 'edit.php' == $pagenow ) {
			$filters = get_object_taxonomies( $typenow );
			foreach ( $filters as $tax_slug ) {
			  $var = &$query->query_vars[$tax_slug];
			  if ( isset( $var ) ) {
				$term = get_term_by( 'id', $var, $tax_slug );
				$var = $term->slug;
			  }
			}
		  }
		}
		add_filter( 'parse_query', 'taxonomy_filter_post_type_request' );


	//Create custom taxonomy links for custom content
	function custom_taxonomies_terms_links() {
		global $post, $post_id;
		// get post by post id
		$post = &get_post($post->ID);
		// get post type by post
		$post_type = $post->post_type;
		// get post type taxonomies
		$taxonomies = get_object_taxonomies($post_type);
		foreach ($taxonomies as $taxonomy) {
			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term )
					$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
				$return = join( ', ', $out );
			}
		}
		return $return;
	}

//HTML5 Modernizer
function html5_scripts()  
{
    wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr-latest.js' );  
    wp_enqueue_script( 'modernizr' );  
}  
add_action( 'wp_enqueue_scripts', 'html5_scripts', 1 );  

//Add javascript and css
function add_scripts() {
	wp_enqueue_script( 'modernizr', get_bloginfo('stylesheet_directory') . "/js/modernizr.custom.59539.js" );
	wp_enqueue_script( 'waypoints', get_bloginfo('stylesheet_directory') . "/js/waypoints-ck.js", array( 'jquery' ) );
	wp_enqueue_script( 'sticky', get_bloginfo('stylesheet_directory') . "/js/waypoints-sticky.min.js", array( 'waypoints' ) );
	wp_enqueue_script( 'color', get_bloginfo('stylesheet_directory') . "/js/jquery.color-2.1.0.min.js", array( 'sticky' ) );
	wp_enqueue_style( 'jScrollPane-style', get_bloginfo('stylesheet_directory').'/inc/jquery.jscrollpane.css' );
	wp_enqueue_script( 'jScrollPane-wheel', get_bloginfo('stylesheet_directory') . '/js/jquery.mousewheel.js', array( 'jquery' ) );
	wp_enqueue_script( 'jScrollPane', get_bloginfo('stylesheet_directory') . '/js/jquery.jscrollpane.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'slides', get_bloginfo('stylesheet_directory') . '/js/jquery.slides.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'scriptsCK', get_bloginfo('stylesheet_directory') . "/js/scripts-ck.js", array( 'color' ) );
	wp_enqueue_script( 'fancybox', get_bloginfo('stylesheet_directory') . '/js/jquery.fancybox-ck.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lightbox', get_bloginfo('stylesheet_directory') . '/js/lightbox-ck.js', array( 'fancybox' ), false, true );
	wp_enqueue_style( 'lightbox-style', get_bloginfo('stylesheet_directory').'/inc/jquery.fancybox.css' );
}
add_action( 'init', 'add_scripts' );

//AJAX functions

//Video functions
function vidRefresh(){
	$video_args = array (
			'post_type' => 'video',
			'p' => $_REQUEST['vidID']
		);	
	rewind_posts();
	query_posts( $video_args );
	while (have_posts()) : the_post();
		global $post;
		
		$vidRawURL = get_the_content();
			if (strpos($vidRawURL, "vimeo")!==false){
				$rawPrefix = 'http://vimeo.com';
				$newPrefix = 'http://player.vimeo.com/video';
				$vidURL = substr_replace($vidRawURL, $newPrefix, $rawPrefix, 16);
			}else if (strpos($vidRawURL, "youtube")!==false){
				$ytURL_array = parse_url($vidRawURL);
				$ytURL = "http://www.youtube.com/embed/".$ytURL_array['query']."?feature=oembed";
				$vidURL = substr_replace($ytURL, "http://www.youtube.com/embed/", "http://www.youtube.com/embed/v=", 31);
			}else{
				$vidURL = 'POOOOOOP';
			}
		$info = array(
				"vidID" => 'vid-'.get_the_ID(),
				"vidURL" => $vidURL,
				"title" => get_the_title($post->ID),
				"date" => get_the_date(),
				"description" => get_the_excerpt(),
				"client" => get_post_meta($post->ID, 'hl_client', $single = true),
				"thumbnail" => get_post_meta($post->ID, 'hl_homethumb', $single = true),
				"format" => custom_taxonomies_terms_links()
		);
	echo json_encode($info);
	endwhile; 
	die;
}
      

//Fancybox search results
function ajaxSearch(){
	global $query_string;
	$sexyQuery = $_REQUEST['sexyQuery'];
	$searchQuery = array(
					"s" => $sexyQuery
					);
	$results = array();
	
	rewind_posts();
	query_posts( $searchQuery );
	while (have_posts()) : the_post();
		global $post;
		
		$result = array(
				"title" => get_the_title(),
				"date" => get_the_date(),
				"url" => get_permalink(),
				"excerpt" => get_the_excerpt()
		);
	$results[] = $result;
	endwhile; 
	
	echo json_encode($results);
	die;
}

// creating Ajax call for WordPress
	add_action( 'wp_ajax_nopriv_vidRefresh', 'vidRefresh' );  
	add_action( 'wp_ajax_vidRefresh', 'vidRefresh' );

	add_action( 'wp_ajax_nopriv_ajaxSearch', 'ajaxSearch' );  
	add_action( 'wp_ajax_ajaxSearch', 'ajaxSearch' );

?>