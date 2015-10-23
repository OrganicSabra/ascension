<?php function showShortcode($row,$ID) { ?>

	<div class="row shortcode">
		<?php
		do_shortcode($row['shortcode']);
		echo 'Shortcode Section';
		?>	
	</div>

<?php } ?>
