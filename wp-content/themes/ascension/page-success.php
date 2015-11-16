<?php
/**
Template Name: Success Stories
 */
// This template needs to display "Testimonial Posts" in a loop with pagination & a sidebar.

get_header(); ?>

		<div id="content" class="site-content" role="main">
		<?php
		while ( have_posts() ) : the_post();
			$bgColor = get_field('banner_background_color');
			$bgImage = get_field('page_banner');
			$bannerTopPad = get_field('banner_top_padding');
			$bannerBotPad = get_field('banner_bottom_padding');
			$sidebar = get_field('include_sidebar');
			$contentBg = get_field('content_background');
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
			if($bannerTopPad) {
				$bannerTopPad = 'padding-top: '.$bannerTopPad.'px;';
			}
			
			if($bannerBotPad) {
				$bannerBotPad = 'padding-bottom: '.$bannerBotPad.'px;';	
			}	
			if($contentBg) {
				$contentBgPos = get_field('content_background_position');
				if($contentBgPos) {
					if($contentBgPos == 'top-left') {
						$bgPos = 'top left';	
					}
					elseif($contentBgPos == 'top-right') {
						$bgPos = 'top right';	
					}
					elseif($contentBgPos == 'bottom-left') {
						$bgPos = 'bottom left';	
					}
					elseif($contentBgPos == 'bottom-right') {
						$bgPos = 'bottom right';	
					}
					elseif($contentBgPos == 'center-center') {
						$bgPos = 'center center';	
					}
				}
				$contentBg = 'background: #fff url(\''.$contentBg.'\') no-repeat '.$bgPos.';';
			}
			?>
			<div class="page-banner" style="<?php echo $background; ?>">
				<div class="widcon">
					<div class="banner-text" style="<?php echo $bannerTopPad . $bannerBotPad; ?>">
						<?php echo get_field('banner_text'); ?>
					</div>
				</div>
			</div>
			<div class="page-content" style="<?php echo $contentBg; ?>">
				<div class="widcon">
				<?php if($sidebar) { ?>
					<div class="left-content">
				<?php } ?>
					<?php echo get_the_content(); ?>
					<?php
					// Loop through the posts.
					?>
					</div>
					<div class="clear"></div>
					<?
					} 
					if(get_field('add_content_below_icon_list')) {
						echo get_field('secondary_content');
					}
					?>
					
					
				<?php if($sidebar) { 
					$sideType = get_field('select_sidebar');
					?>
					</div>
					<div class="right-content">
						<?php dynamic_sidebar($sideType); ?>
					</div>
				<?php } ?>
					<div class="clear"></div>
				</div>
			</div> 
			<?php
		endwhile;
		?>

		</div><!-- #content -->
<?php

get_footer();
