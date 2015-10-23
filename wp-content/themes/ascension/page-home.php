<?php
/**
Template Name: Home
 */
 
include 'sections/shortcode.php';
include 'sections/full-width.php';
include 'sections/fifty-fifty.php';
include 'sections/one-two-third.php';
include 'sections/four-fourths.php';

get_header(); ?>

		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					$rows = get_field('repeater_field_name');
					if($rows)
					{
						echo '<div class="section">';
					
						foreach($rows as $row)
						{
							$sectionType = $row['section_type'];
							sectionTemplate($sectionType,the_ID());
						}
					
						echo '</div>';
					}


					echo get_the_content(); 
				
				endwhile;
			?>

		</div><!-- #content -->
<?php

get_footer();
