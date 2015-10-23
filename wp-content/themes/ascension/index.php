<?php
/**
 * The main template file
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">

	<?php
		if ( have_posts() ) :
			
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;

		else :
			
		endif;
	?>

	</div><!-- #content -->

<?php
get_footer();
