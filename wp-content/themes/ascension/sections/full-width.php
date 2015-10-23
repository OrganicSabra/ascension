<?php function fullWidth($row,$ID) {
	
	getStyles($row);  
	
?>

	<div class="row fullwidth" style="<?php echo $background . $fontColor . $topPad . $botPad; ?>">
		<div class="widcon">
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
