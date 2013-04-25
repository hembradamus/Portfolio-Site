<?php get_header(); ?>

<div id="content">
	<div class="feedContainer">
		<div class="twoThirds">
			<div class="secTitle">
				<h2>
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily archives: <span>%s</span>', 'notesblog' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly archives: <span>%s</span>', 'notesblog' ), get_the_date('F Y') ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly archives: <span>%s</span>', 'notesblog' ), get_the_date('Y') ); ?>
				<?php elseif ( is_category() ) : ?>
					<?php printf( __( 'Archive for %s', 'notesblog' ), '<br/><h1>' . single_cat_title( '', false ) . '</h1>' ); ?>
				<?php elseif ( is_tag() ) : ?>
					<?php printf( __( 'Tag archives for %s', 'notesblog' ), '<br/><span>' . single_tag_title( '', false ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Archive', 'notesblog' ); ?>
				<?php endif; ?>
				</h2>
			</div>
			<?php
			// Look for loop-index.php, fallback to loop.php
			get_template_part( 'loop', 'archive' );
			?>
		</div>
		<?php get_sidebar('graybox'); ?>
	</div>
</div>

<?php get_footer(); ?>