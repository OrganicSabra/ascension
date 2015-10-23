<?php
/**
 Template: Home
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">
		<?php
			while ( have_posts() ) : the_post();
				?>
				<h2><?php echo get_the_title(); ?></h2>
				<?php
				the_content();
			
			endwhile;
		?>

	</div><!-- #content -->

<?php
get_footer();
