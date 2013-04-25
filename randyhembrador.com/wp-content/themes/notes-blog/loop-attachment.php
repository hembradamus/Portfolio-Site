<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
			<div class="entry-content">
    			<?php the_content(); ?>
    			<p class="attachmentnav">&larr; <?php _e('Back to', 'notesblog');?> <a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php echo get_the_title($post->post_parent) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></p>
    			<div class="large-image aligncenter">
    				<?php echo wp_get_attachment_image( $post->ID, $size='large', false); ?>
    			</div>
    			<?php edit_post_link(__('Edit', 'notesblog'), '<p class="admin">Admin: ', '</p>'); ?>
    		</div>
    	</div>
    	
    	<?php if (comments_open()) : ?>
    		<div class="attachment-comments"><?php comments_template('', true); ?></div>
    	<?php endif; ?> 

    <?php endwhile; ?>

<?php else : ?>
<?php endif; ?>