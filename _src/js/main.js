import Util from 'bootstrap/js/dist/util';
import Alert from 'bootstrap/js/dist/alert'
import Button from 'bootstrap/js/dist/button';
import Carousel from 'bootstrap/js/dist/carousel';
import Collapse from 'bootstrap/js/dist/collapse';
import Dropdown from 'bootstrap/js/src/dropdown';
import Modal from 'bootstrap/js/src/modal';
import Popover from 'bootstrap/js/src/popover';
import ScrollSpy from 'bootstrap/js/src/scrollspy';
import Tab from 'bootstrap/js/src/tab';
import Toast from 'bootstrap/js/src/toast';
import Tooltip from 'bootstrap/js/src/tooltip';

import 'slick-carousel';
import 'jquery.scrollto';

/*********************************************************
COYOTE SCRIPTS
**********************************************************/

jQuery(document).ready(function($) {

	"use strict";

	if($('.scroll-links a').length){
		$('.scroll-links a').click(function(ev){
			ev.preventDefault();
			const dest = $(this).attr('href');
			$(window).scrollTo( dest, 200, {
				offset: -100,
			});
		});
	}
	
	
// 	Modals with Isotope
	if($('body').hasClass('page-template-page-template-staff-directory')) {
		
// 		$('.single-staff-card .modal').modal({ show: false})
		
		$('.single-staff-card').each( function() {
			
			
			
			var $trigger = $(this).find('a.staff-modal-toggle');
			var $targetAttribute = $($trigger).attr('data-target')/* .replace('#', '') */;		
						
/*
$(document).on('click', $trigger, function() {
	$($targetAttribute).modal('show');
});	
*/		
			
/*
			$($trigger).click(function(){
				
				$($targetAttribute).modal('show');
				$($targetAttribute).addClass('show').fadeIn();
				
				console.log($targetAttribute);
				
			});
*/
			
		});
		
	}

// 	Set heights for Contact Us module
	if($('section.contact-us').length) {
		
		$('.staff-cards-wrap').each( function() {
			
			var $card = $(this).find('.staff-card .fh');				
			
			var setHeight = function setHeight() {
	
				var $cardHeight = $($card).height();
								
				$($card).css('min-height', $cardHeight);
				
			};
				
			setHeight();
			
			$(window).resize(function() {
				setHeight();
			});
			
		});
	
	};
	
// 	Set heights for event cards
	if($('article.type-events .inner.card-inner').length) {
		

		if($(".utility-event-slider").hasClass("slick-active")){
			
			var setHeight = function setHeight() {

				var $card = $('article.type-events .inner.card-inner');
				var $cardWidth = $($card).width();
	
				$($card).css('height', $cardWidth);
				
				console.log($cardWidth);

			}
		
			setHeight();

			$(window).resize(function() {
				setHeight();
			});

		}

	};
	
// 	Set heights for Home: Upcoming Events
	if($('.home .upcoming-events').length) {
					
		var setHeight = function setHeight() {

			var $card = $('.home .upcoming-events a'); 
			var $cardWidth = $($card).width();

			$($card).css('height', $cardWidth);
			
			console.log($cardWidth);

		}
	
		setHeight();

		$(window).resize(function() {
			setHeight();
		});

	};
	
	
	if($('.quote-slider').length) {
		$('.quote-slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			rows: 0
		});
	};
	
	
	if($('.home-small-images').length) {
	$('.home-small-images').slick({
		arrows: false,
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 3000,
        cssEase:'linear',
        infinite: true,
        focusOnSelect: false,
		vertical: true,
		pauseOnHover: false,
		rows: 0
	});
	};

	if($('.home-large-images').length) {
		$('.home-large-images').slick({
			arrows: false,
	        slidesToShow: 1,
	        autoplay: true,
	        autoplaySpeed: 3000,
	        speed: 3000,
	        cssEase:'linear',
	        infinite: true,
	        focusOnSelect: false,
			vertical: true,
			pauseOnHover: false,
			rows: 0
		});	
	};
	
	if($('.events-calendar').length) {
		
		$('.events-calendar').each(function() {
	
			var $slider = $(this).find('.event-month-slider');
			var $next = $(this).find('.next');
			var $prev = $(this).find('.prev');
			
			$($slider).slick({
				arrows: false,
				fade: true,
		        slidesToShow: 1,
		        autoplaySpeed: 0,
		        speed: 300,
		        cssEase:'linear',
		        infinite: true,
		        focusOnSelect: false,
				rows: 0,
				adaptiveHeight: true
			});	
			
			
			// Controls
			$($next).click(function() {
			    $slider.slick('slickNext');
			});
			
			$($prev).click(function() {
			    $slider.slick('slickPrev');
			});
			
		});
		
	};	

	if($('.layout-event-slider').length) {
		$('.layout-event-slider').each(function() {
			
			var $slider = $(this).find('.utility-event-slider');
			var $next = $(this).find('button.next');
			var $prev = $(this).find('button.prev');
			
			console.log($next);
			
			$($slider).slick({
				arrows: false,
		        slidesToShow: 4,
		        slidesToScroll: 3,
		        autoplaySpeed: 0,
		        speed: 300,
		        cssEase:'linear',
		        infinite: true,
		        focusOnSelect: false,
				rows: 0
			});	
			
			// Controls
			$($next).click(function() {
			    $slider.slick('slickNext');
			    console.log("loaded");
			});
			
			$($prev).click(function() {
			    $slider.slick('slickPrev');
			});
		
		});
		
	};	

	if($('.collapse').length) {		

		// $('.collapse').collapse();
		
		$(document).on('click', '.accordion > .card > .card-header', function() {
			if ( ! $(this).hasClass('open') ) $(this).addClass('open');
			else $(this).removeClass('open');

			$(this).parent().siblings().find('.card-header').each(function(){
					$(this).removeClass('open');
			})

			$(this).next('.collapse').collapse('toggle');
		});
	
	};

	// make your javas

});







/*
 * Use this handy function and variable to get the CSS viewport dimensions.
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}

var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;
