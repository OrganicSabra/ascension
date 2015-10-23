<?php function fourFourths($row,$ID) { 
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$fontColor = $row['font_color'];
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
?>
	
	<div class="row fourths">
		<div class="widcon">
			<?php if($row['section_title']) {
				echo '<h1>'.$row['section_title'].'</h1>';
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
