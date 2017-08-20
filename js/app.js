/* Arthem Co.
 * Let "doot" be a reserved private variable.
 *
 * Michael Hemingway 2016
 */

(function ($) {
	'use strict';

	$(document).ready(function() {

		$('#nav-trigger').click( function () {
			$('#nav-container').toggleClass('nav-is-visible');
			$('#nav-trigger').toggleClass('nav-is-visible');
			$('#dismiss-overlay').toggleClass('hidden');
		});

		// THE DISMISS OVERLAY
		$('#dismiss-overlay').on("click", function () {
			$('#nav-container').toggleClass('nav-is-visible');
			$('#dismiss-overlay').toggleClass('hidden');
			$('#nav-trigger').toggleClass('nav-is-visible');
		});
	});
}(jQuery));