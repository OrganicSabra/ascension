<?php
/**
 * The Header for our theme
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header" role="banner">
		<div class="widcon">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
				</a>
			</div>
			<div class="contact">
				<img src="/wp-content/themes/ascension/images/contact-card.png" class="contact-card" />
				<?php wp_nav_menu( array( 'theme_location' => 'social-menu', 'menu_class' => 'social-menu', 'menu_id' => 'socialMenu' ) ); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="main-navigation">
			<div class="widcon">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu', 'menu_id' => 'mainMenu' ) ); ?>
				<div class="clear"></div>
			</div>
		</div>
	</header><!-- #masthead -->
