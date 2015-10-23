<?php function oneTwoThird($row,$ID) { 
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$fontColor = $row['font_color'];
	$topPad = $row['top_padding'];
	$botPad = $row['bottom_padding'];
	$background = '';
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
		$topPad = 'padding-top: '.$topPad.';';
	}
	if($botPad) {
		$botPad = 'padding-bottom: '.$botPad.';';	
	}
?>

	<div class="row onetwothirds" style="<?php echo $background . $fontColor . $topPad . $botPad; ?>">
		<div class="widcon">
			<?php if($row['top_content']) {
				echo $row['top_content'];
			} ?>
			<div class"onethird">
				<?php echo $row['content_1']; ?>
			</div>
			<div class="twothird">
				<?php echo $row['content_2']; ?>
			</div>
			<div class="clear"></div>
			<?php if($row['bottom_content']) {
				echo '<div class="bottom">'.$row['bottom_content'].'</div>';
			} ?>	
		</div>
	</div>

<?php } ?>
