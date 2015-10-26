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
					if($$contentBgPos == 'top-left') {
						$contentBgPos = 'top left';	
					}
					elseif($$contentBgPos == 'top-right') {
						$contentBgPos = 'top right';	
					}
					elseif($$contentBgPos == 'bottom-left') {
						$contentBgPos = 'bottom left';	
					}
					elseif($$contentBgPos == 'bottom-right') {
						$contentBgPos = 'bottom right';	
					}
					elseif($$contentBgPos == 'center-center') {
						$contentBgPos = 'center center';	
					}
				}
				$contentBg = 'background: #fff url(\''.$contentBg.'\') no-repeat '.$contentBgPos.';';
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
