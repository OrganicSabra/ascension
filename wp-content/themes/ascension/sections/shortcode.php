<?php function showShortcode($row,$ID) { ?>

	<div class="row shortcode">
		<?php
		echo do_shortcode($row['shortcode']);
		?>	
	</div>

<?php } ?>
