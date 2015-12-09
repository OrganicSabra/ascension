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
	    	$('.main-navigation').removeClass('non-stick');
	        $('.main-navigation').addClass('sticky');
	    }
	    else {
	    	$('.main-navigation').removeClass('sticky');
	    	$('.main-navigation').addClass('non-stick');
	    }
	});

});