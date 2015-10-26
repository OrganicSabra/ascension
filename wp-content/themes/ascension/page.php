<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

		<div id="content" class="site-content" role="main">
		<?php
		while ( have_posts() ) : the_post();
			$bgColor = get_field('banner_background_color');
			$bgImage = get_field('page_banner');
			$sidebar = get_field('include_sidebar');
			if($bgColor) {
				if($bgImage) {
					$background = 'background: '.$bgColor.' url(\''.$bgImage.'\') no-repeat top center;';
					if($bgFill) {
						$bgSize = 'background-size: 100% 100%;';
					}
				}
				else {
					$background = 'background-color: '.$bgColor.';';
				}
			}
			else {
				if($bgImage) {
					$background = 'background: #434445 url(\''.$bgImage.'\') no-repeat top center;';
					if($bgFill) {
						$bgSize = 'background-size: 100% 100%;';
					}
				}
			}
			?>
			<div class="page-banner" style="<?php echo $background; ?>">
				<div class="widcon">
					<div class="banner-text">
						<?php echo get_field('banner_text'); ?>
					</div>
				</div>
			</div>
			<div class="page-content">
			<?php if($sidebar) { ?>
				<div class="left-content">
			<?php } ?>
				<?php echo get_the_content(); ?>
			<?php if($sidebar) { ?>
				</div>
				<div class="right-content">
					<?php dynamic_sidebar(); ?>
				</div>
			<?php } ?>
			</div> 
			<?php
		endwhile;
		?>

		</div><!-- #content -->
<?php

get_footer();
