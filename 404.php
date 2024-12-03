<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */
get_header(); ?>
<div class="container">
	<div class="row p-3">
		<div class="col-12">
		<h1 class="text-center"><?php _e( 'Page Not Found' ); ?></h1>
		</div>
		<div class="col-12">
			<div class="o-404bg" style="background-image: url('<?php echo get_theme_file_uri('assets/media/chicago-404.jpeg'); ?>');">&nbsp;</div>
		</div>
		<div class="col-12 d-flex flex-column align-items-center">
		<h2><?php _e("Oops, looks like Chicago doesn't include this place."); ?></h2>
		<p><?php _e("Maybe try search other pages?"); ?></p>
		<?php get_search_form(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>