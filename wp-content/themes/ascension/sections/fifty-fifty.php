<?php function fiftyFifty($row,$ID) { 
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$fontColor = $row['font_color'];
	$background = '';
	$titleAlign = $row['section_title_alignment'];
	$topPad = $row['top_padding'];
	$botPad = $row['bottom_padding'];
	
	if($bgColor) {
		if($bgImage) {
			$background = 'background: '.$bgColor.' url(\''.$bgImage.'\') no-repeat center center; background-size: 100% 100%;';
		}
		else {
			$background = 'background-color: '.$bgColor.';';
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
	
	if($titleAlign) {
		$titleAlign = 'text-align: '.$titleAlign.';';
	}
?>

	<div class="row halves" style="<?php echo $background . $fontColor . $topPad . $botPad; ?>">
		<div class="widcon">
			<?php if($row['top_content']) {
				echo $row['top_content'];
			} ?>
			<div class="half">
				<?php echo $row['content_1']; ?>
			</div>
			<div class="half">
				<?php echo $row['content_2']; ?>
			</div>
			<div class="clear"></div>
			<?php if($row['bottom_content']) {
				echo '<div class="bottom">'.$row['bottom_content'].'</div>';
			} ?>
		</div>	
	</div>

<?php } ?>
