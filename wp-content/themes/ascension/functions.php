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
        'name' => __( 'Page Sidebar', 'twentyfourteen' ),
        'id'            => 'page-sidebar',
		'description'   => '',
        'class'         => 'page-side',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="title">',
		'after_title'   => '</h2>' 
    ) );
	register_sidebar( array(
        'name' => __( 'About Us', 'twentyfourteen' ),
        'id'            => 'about-us',
		'description'   => '',
        'class'         => 'about-us-side page-side',
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
		fourFourths($row,$theID);
	}
}


// Custom Post Type
function issues() {
  register_post_type( 'issues',
    array(
      'labels' => array(
        'name' => __( 'Issues' ),
        'singular_name' => __( 'Issues' )
      ),
      'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'page-attributes',
			),
      'public' => true,
      'has_archive' => true,
      'exclude_from_search' => false, 
    )
  );
}
add_action( 'init', 'issues' );
function staff() {
  register_post_type( 'staff',
    array(
      'labels' => array(
        'name' => __( 'Our Staff' ),
        'singular_name' => __( 'Staff' )
      ),
      'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'page-attributes',
			),
      'public' => true,
      'has_archive' => true,
      'exclude_from_search' => false, 
    )
  );
}
add_action( 'init', 'staff' );
function work() {
  register_post_type( 'work',
    array(
      'labels' => array(
        'name' => __( 'Our Work' ),
        'singular_name' => __( 'Work' )
      ),
      'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'page-attributes',
			),
      'public' => true,
      'has_archive' => true,
      'exclude_from_search' => false, 
    )
  );
}
add_action( 'init', 'work' );
function lists() {
  register_post_type( 'lists',
    array(
      'labels' => array(
        'name' => __( 'Icon Lists' ),
        'singular_name' => __( 'Icon List' )
      ),
      'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'page-attributes',
			),
      'public' => true,
      'has_archive' => true,
      'exclude_from_search' => false, 
    )
  );
}
add_action( 'init', 'lists' );


function caption_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'postid' => 0,
	), $atts );

	$postID = esc_attr($a['postid']);

	return '<div>' . $postID . '</div>';
}
add_shortcode( 'showlist', 'showIconList' );
add_filter('showlist', 'do_shortcode');

?>