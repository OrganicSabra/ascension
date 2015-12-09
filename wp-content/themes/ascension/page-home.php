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

					$rows = get_field('home_page_section');
					if($rows)
					{
						$i = 0;
						foreach($rows as $row)
						{
							
							echo '<div id="row'.count($rows).'" class="section">';
							$sectionType = $row['section_type'];
							sectionTemplate($sectionType,$row,get_the_ID());
							echo '</div>';
							
						}
					
					}


					echo get_the_content(); 
				
				endwhile;
			?>

		</div><!-- #content -->
<?php

get_footer();
