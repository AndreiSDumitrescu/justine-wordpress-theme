//Self Invoking Anonymous Functions
var $justine = jQuery.noConflict();

(function(){
	'use strict';
	//DOM ready
	$justine(document).ready(function(){


		// browser window scroll (in pixels) after which the "back to top" link is shown
		var offset = 300,

		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,

		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,

		//grab the "back to top" link
		$justineback_to_top = $justine('.jump-top');

		//hide or show the "back to top" link
		$justine(window).scroll(function(){
			( $justine(this).scrollTop() > offset ) ? $justineback_to_top.addClass('jump-is-visible') : $justineback_to_top.removeClass('jump-is-visible jump-fade-out');
			if( $justine(this).scrollTop() > offset_opacity ) { 
				$justineback_to_top.addClass('jump-fade-out');
			}
		});

		//smooth scroll to top
		$justineback_to_top.on('click', function(event){
			event.preventDefault();
			$justine('body,html').animate({
				scrollTop: 0 ,
			 	}, scroll_top_duration
			);
		});
		
		//initialize slick slider for gallery
		$justine('.slider').slick({
		  infinite: true,
		  speed: 300,
		  adaptiveHeight: true
		});

		//fixed menu on scroll
		var menu = $justine('.site-header');
		var origOffsetY = menu.offset().top;

		function scroll() {
		    if ($justine(window).scrollTop() >= origOffsetY) {
		        menu.addClass('sticky-nav');
		    } else {
		        menu.removeClass('sticky-nav');
		    }
		 }

		document.onscroll = scroll;

		$justine('.your-class').slick({
		  autoplay: true,
		  autoplaySpeed: 2000,
	    });
	});
})($justine);