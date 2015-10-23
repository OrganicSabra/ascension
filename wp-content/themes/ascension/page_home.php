<?php
/**
 Template: Home
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">
		<?php
			while ( have_posts() ) : the_post();

				the_content();
			
			endwhile;
		?>

	</div><!-- #content -->

<?php
get_footer();
