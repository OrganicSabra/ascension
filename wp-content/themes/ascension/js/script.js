jQuery(function( $ ) {
	
	$('.main-navigation ul li').hover(function() {
		$(this).children('ul').slideToggle();
	});
	
	$('.mobile-btn').click(function() {
		$('.main-menu').slideToggle();
	});
	
	$(document).ready(function(){
		$('.bxslider').bxSlider({
			'controls': false
		});
	});
});