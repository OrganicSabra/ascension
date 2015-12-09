<?php function oneTwoThird($row,$ID) { 
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$bgFill = $row['fill_background'];
	$fontColor = $row['font_color'];
	$background = '';
	$topPad = $row['top_padding'];
	$botPad = $row['bottom_padding'];
	
	$oneVertAlign = $row['one_third_vertical_align'];
	$twoVertAlign = $row['two_third_vertical_align'];
	
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
			$background = 'background: transparent url(\''.$bgImage.'\') no-repeat top center;';
			if($bgFill) {
				$bgSize = 'background-size: 100% 100%;';
			}
		}
	}
	
	if($fontColor) {
		$fontColor = 'color: '.$fontColor.';';
	}
	
	if($topPad) {
		$topPad = 'padding-top: '.$topPad.'px;';
	}
	
	if($botPad) {
		$botPad = 'padding-bottom: '.$botPad.'px;';	
	}	
	
	if($oneVertAlign) {
		$oneVertAlign = 'vertical-align: '.$oneVertAlign.';';
	}
	if($twoVertAlign) {
		$twoVertAlign = 'vertical-align: '.$twoVertAlign.';';
	}
	
	
?>

	<div class="row onetwothirds" style="<?php echo $background . $bgSize . $fontColor; ?>">
		<div class="widcon" style="<?php echo $topPad . $botPad; ?>">
			<?php if($row['top_content']) {
				echo $row['top_content'];
			} ?>
			<div class="onetwotable">
				<div class="onetworow">
					<div class="onethird" style="<?php echo $oneVertAlign; ?>">
						<?php echo $row['content_1']; ?>
						<div class="clear"></div>
					</div>
					<div class="twothird" style="<?php echo $twoVertAlign; ?>">
						<?php echo $row['content_2']; ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<?php if($row['bottom_content']) {
				echo '<div class="bottom">'.$row['bottom_content'].'</div>';
			} ?>	
		</div>
	</div>

<?php } ?>
