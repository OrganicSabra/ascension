<?php
/**
 * The template for displaying the footer
 */
?>

		
		
		
		<footer class="site-footer">
			<div class="pre-footer">
				<div class="widcon">
					<div class="contact">
						<img src="/wp-content/themes/ascension/images/footer-image.png" class="footer-img" />
						<?php wp_nav_menu( array( 'theme_location' => 'social-menu', 'menu_class' => 'social-menu', 'menu_id' => 'socialMenu' ) ); ?>
						<h4 class="white">314.725.4513</h4>
						<a href="mailto:info@ascendsionmobile.com">info@ascendsionmobile.com</a>
					</div>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu', 'menu_id' => 'mainMenu' ) ); ?>
				</div>
			</div>
			<div class="footer">
				<div class="widcon">
	
				</div>
			</div>
		</footer>
		
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>