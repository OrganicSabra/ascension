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


class wpb_widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
		'wpb_widget', 
		__('Blue Title Widget', 'wpb_widget_domain'), 
		array( 'description' => __( 'Widget with Blue Stripe behind Title', 'wpb_widget_domain' ), ) 
		);
	}
	
	// Widget Front-End
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$desc = apply_filters( 'widget_description', $instance['desc'] );
		$image = apply_filters( 'widget_description', $instance['image'] );
		$button = apply_filters( 'widget_description', $instance['button'] );
		$link = apply_filters( 'widget_description', $instance['link'] );
		$ctaImg = apply_filters( 'widget_description', $instance['ctaimg'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		
		echo '<div class="blue-title-widget">';
		
		if ( ! empty( $title ) )
		echo '<h3>' . $title . '</h3>';
		
		if ( ! empty( $image ) ) 
			echo '<div class="content">';
		
		if ( ! empty( $desc ) )
		echo '<p>' . $desc . '</p>';
		
		if ( ! empty( $button ) )
		echo '<a href="'.$link.'" title="'.$title.'">' . $button . '</a>';
		
		if ( ! empty( $ctaimg ) )
		echo '<p>' . $ctaimg . '</p>';
		
		if ( ! empty( $image ) ) 
			echo '</div>';
		
		if ( ! empty( $image ) )
		echo '<img src="' . $image . '" alt="'.$title.'" class="absimg" />';
		
		echo '</div>';
		
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
	if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
		$title = __( 'New Title', 'wpb_widget_domain' );
	}
	
	if ( isset( $instance[ 'desc' ] ) ) {
		$desc = $instance[ 'desc' ];
	}
	else {
		$desc = __( 'New Description', 'wpb_widget_domain' );
	}

	if ( isset( $instance[ 'image' ] ) ) {
		$image = $instance[ 'image' ];
	}
	else {
		$image = __( 'New Image URL', 'wpb_widget_domain' );
	}

	if ( isset( $instance[ 'button' ] ) ) {
		$button = $instance[ 'button' ];
	}
	else {
		$button = __( 'Button Text', 'wpb_widget_domain' );
	}
	
	if ( isset( $instance[ 'link' ] ) ) {
		$link = $instance[ 'link' ];
	}
	else {
		$link = __( 'Button Link', 'wpb_widget_domain' );
	}
	
	if ( isset( $instance[ 'ctaimg' ] ) ) {
		$ctaimg = $instance[ 'ctaimg' ];
	}
	else {
		$ctaImg = __( 'CTA Image', 'wpb_widget_domain' );
	}
	// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Description:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text" value="<?php echo esc_attr( $desc ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image URL:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e( 'Button Text:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" type="text" value="<?php echo esc_attr( $button ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Button Link:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'ctaimg' ); ?>"><?php _e( 'CTA Image:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'ctaimg' ); ?>" name="<?php echo $this->get_field_name( 'ctaimg' ); ?>" type="text" value="<?php echo esc_attr( $ctaimg ); ?>" />
	</p>
	<?php 
	}
		
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['button'] = ( ! empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
		$instance['button'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
		$instance['ctaimg'] = ( ! empty( $new_instance['ctaimg'] ) ) ? strip_tags( $new_instance['ctaimg'] ) : '';
		return $instance;
	}
}

function wpb_load_widget_1() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget_1' );

?>