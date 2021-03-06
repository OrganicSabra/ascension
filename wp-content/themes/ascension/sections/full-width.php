<?php function fullWidth($row,$ID) {
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$bgFill = $row['fill_background'];
	$fontColor = $row['font_color'];
	$background = '';
	$topPad = $row['top_padding'];
	$botPad = $row['bottom_padding'];
	
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
	
?>

	<div class="row fullwidth" style="<?php echo $background . $bgSize . $fontColor; ?>">
		<div class="widcon" style="<?php echo $topPad . $botPad; ?>">
			<?php echo $row['content_1']; ?>
		</div>
	</div>

<?php } ?>
