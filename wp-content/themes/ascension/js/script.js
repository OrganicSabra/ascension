jQuery(function( $ ) {

	$('.mobile-btn').click(function() {
		$('.main-menu').slideToggle();
	});
	
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			'controls': false
		});
	});
	
	var distance = $('.main-navigation').offset().top,
    $window = $(window);
	
	$window.scroll(function() {
	    if ( $window.scrollTop() >= distance ) {
	        $('.main-navigation').css({
		      'position' : 'absolute',
		      'top' : '0px',
		      'left' : '0px'
		    });
	    }
	    else {
	    	$('.main-navigation').css({
		      'position' : 'relative'
		    });
	    }
	});

});