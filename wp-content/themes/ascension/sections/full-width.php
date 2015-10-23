<?php function fullWidth($row,$ID) {
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$fontColor = $row['font_color'];
	$background = '';
	$titleAlign = $row['section_title_alignment'];
	$topPad = $row['top_padding'];
	$botPad = $row['bottom_padding'];
	
	if($bgColor) {
		if($bgImage) {
			$background = 'background: '.$bgColor.' url(\''.$bgImage.'\') no-repeat center center;';
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

	<div class="row fullwidth" style="<?php echo $background . $fontColor; ?>">
		<div class="widcon" style="<?php echo $topPad . $botPad; ?>">
			<?php if($row['section_title']) {
				echo '<h1 class="title" style="'.$titleAlign.'">'.$row['section_title'].'</h1>';
			} ?>
			<?php echo $row['content_1']; ?>
			<?php if($row['bottom_content']) {
				echo '<div class="bottom">'.$row['bottom_content'].'</div>';
			} ?>
		</div>
	</div>

<?php } ?>
