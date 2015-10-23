<?php
/**
Template Name: Home
 */

get_header(); ?>

		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					echo get_the_content(); 
				
				endwhile;
			?>

		</div><!-- #content -->
<?php

get_footer();
