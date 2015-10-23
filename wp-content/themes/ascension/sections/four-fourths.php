<?php function fourFourths($row,$ID) {
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$bgFill = $row['fill_background'];
	$fontColor = $row['font_color'];
	$background = '';
	$topPad = $row['top_padding'];
	$botPad = $row['bottom_padding'];
	
	if($bgColor) {
		if($bgImage) {
			$background = 'background: '.$bgColor.' url(\''.$bgImage.'\') no-repeat center center;';
			if($bgFill) {
				$bgSize = 'background-size: 100% 100%;';
			}
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
	
?>
	
	<div class="row fourths" style="<?php echo $background . $fontColor . $topPad . $botPad; ?>">
		<div class="widcon">
			<?php if($row['top_content']) {
				echo $row['top_content'];
			} ?>
			<div class="fourth">
				
			</div>
			<div class="fourth">
				
			</div>
			<div class="fourth">
				
			</div>
			<div class="fourth">
				
			</div>
			<div class="clear"></div>
			
			<?php if($row['bottom_content']) {
				echo '<div class="bottom">'.$row['bottom_content'].'</div>';
			} ?>	
		</div>
	</div>
	
<?php } ?>
