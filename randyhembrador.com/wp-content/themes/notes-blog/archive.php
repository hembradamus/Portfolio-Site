<?php get_header(); ?>

	<div id="content" class="widecolumn">
	
			<h1 class="page-title">
			<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily archives: <span>%s</span>', 'notesblog' ), get_the_date() ); ?>
			<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly archives: <span>%s</span>', 'notesblog' ), get_the_date('F Y') ); ?>
			<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly archives: <span>%s</span>', 'notesblog' ), get_the_date('Y') ); ?>
			<?php elseif ( is_category() ) : ?>
				<?php printf( __( 'Archive for %s', 'notesblog' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			<?php elseif ( is_tag() ) : ?>
				<?php printf( __( 'Tag archives for %s', 'notesblog' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
			<?php else : ?>
				<?php _e( 'Archive', 'notesblog' ); ?>
			<?php endif; ?>
			</h1>
	
		<?php
			// Look for loop-index.php, fallback to loop.php
			get_template_part( 'loop', 'archive' );
		?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>