/**
 * Main JS file for BlogBox behaviours
 */
(function ($) {
	"use strict";

	$(document).ready(function(){
		var $menuToggle = $('#menu-toggle'),
			$navMenu = $('#nav-menu');

		// Responsive video embeds
		$('.entry-content').fitVids();

		// Scroll to top
		$('#jump-top').on('click', function(e) {
			e.preventDefault();
			$('html, body').animate({'scrollTop': 0});
		});

		// Enable menu toggle
		$menuToggle.click(function(){
			if ( $menuToggle.hasClass( 'toggled--on' ) ) {
				$menuToggle.removeClass('toggled--on').attr('aria-expanded', 'false');
				$navMenu.slideUp();
			} else {
				$menuToggle.addClass('toggled--on').attr('aria-expanded', 'true');
				$navMenu.slideDown();
			}
		});

		// Adjust full-width images
		adjustImages();

		$(window).bind('resize orientationchange', function() {
			adjustImages();
			if ( $menuToggle.is(':hidden') ) {
				$menuToggle.removeClass('toggled--on').attr('aria-expanded', 'false');
				$navMenu.removeAttr('style');
			}
		});
	});

	function adjustImages() {
		var $entry = $('.entry-box'),
			$entryContent = $entry.find('.entry-content'),
			entryWidth = $entry.outerWidth(),
			entryContentWidth = $entryContent.width();
		$entryContent.find('.full-width').each(function() {
			var _this = $(this);
			_this.css({ 'margin-left': entryContentWidth / 2 - entryWidth / 2, 'max-width': 'none', 'width': entryWidth });
			_this.find('img').css({ 'width': entryWidth });
		});
	}

}(jQuery));