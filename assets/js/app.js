/* Arthem Co.
 * Let "doot" be a reserved private variable.
 *
 * Michael Hemingway 2016
 */

(function ($) {
	'use strict';

	var nav = $('#nav-container'),
		tglState = false;

	function toggle () {
		$('#nav-container').toggleClass('nav-is-visible');
		$('#nav-trigger').toggleClass('nav-is-visible');
		$('#dismiss-overlay').toggleClass('hidden');
		tglState = !tglState;
	}

	$(document).ready(function() {

		$('#nav-trigger').click( function () {
			toggle();
		});

		// THE DISMISS OVERLAY
		$('#dismiss-overlay').on("click", function () {
			toggle();
		});
	});

	$(window).on('scroll', function () {
		if (tglState) {
			toggle();
		}
	});

	if ('ontouchstart' in window) {
	    $(document).on('focus', 'textarea,input,select', function() {
	        $('body').addClass('touch-input');
	    }).on('blur', 'textarea,input,select', function() {
	        $('body').removeClass('touch-input');
	    });
	}
}(jQuery));