<?php

// Clean up Parent Items
function remove_parent_sidebars() {
    unregister_sidebar('sidebar-1');
	unregister_sidebar('sidebar-2');
	unregister_sidebar('sidebar-3');
}
add_action( 'widgets_init', 'remove_parent_sidebars', 11 );

// Add Child Theme Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __('Main Menu'),
      'social-menu' => __('Social Menu'),
      'footer-menu' => __('Footer Menu'),
    )
  );
}
add_action( 'init', 'register_my_menus' );

function theme_slug_widgets_init() {
	
	register_sidebar( array(
        'name' => __( 'Pre Footer 1', 'context' ),
        'id'            => 'pre-footer-1',
		'description'   => '',
        'class'         => 'pre-footer pre-footer-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title">',
		'after_title'   => '</h2>' 
    ) );
	register_sidebar( array(
        'name' => __( 'Pre Footer 2', 'context' ),
        'id'            => 'pre-footer-2',
		'description'   => '',
        'class'         => 'pre-footer pre-footer-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title">',
		'after_title'   => '</h2>' 
    ) );
	
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );


function sectionTemplate($sectionType,$row,$theID) {
	if($sectionType == 'shortcode') {
		showShortcode($row,$theID);
	}
	elseif($sectionType == 'full-width') {
		fullWidth($row,$theID);
	}
	elseif($sectionType == 'fifty-fifty') {
		fiftyFifty($row,$theID);
	}
	elseif($sectionType == 'one-two-third') {
		oneTwoThird($row,$theID);
	}
	elseif($sectionType == 'four-fourths') {
		fiftyFifty($row,$theID);
	}
}

function getStyles($row) {
	$bgColor = $row['background_color'];
	$bgImage = $row['background_image'];
	$fontColor = $row['font_color'];
	$background = '';
	$titleAlign = $row['section_title_alignment'];
	
	if($bgColor) {
		if($bgImage) {
			$background = 'background: '.$bgColor.' url(\''.$bgImage.'\') no-repeat center center;';
		}
		else {
			$background = 'background-color: '.$bgColor.';';
		}
	}
	
	if($fontColor) {
		$fontColor = 'color: '.$fontColor.'px;';
	}
	
	if($topPad) {
		$topPad = 'padding-top: '.$topPad.'px;';
	}
	
	if($botPad) {
		$botPad = 'padding-bottom: '.$botPad.';';	
	}	
	
	if($titleAlign) {
		$titleAlign = 'text-align: '.$titleAlign.';';
	}
}

?>