/* Arthem Co. 
 * Let "doot" be a reserved private variable.
 *
 * Michael Hemingway 2016 
 */

// JSHint globals
/*global $ */
/*global jQuery */
/*global Headroom */

(function () {
	'use strict';

	// HELPER FUNCTIONS
	var $ = function (id) {
		return document.getElementById(id);
	};

	function setStyles() {
		var a = localStorage.getItem('dark-ui'),
		    body = document.getElementsByTagName('body')[0],
		    toggle = document.getElementById("dark-ui-toggle");
		if (a === "dark") {
			body.className += (' dark-ui');
			toggle.checked = true;
		} else {
			body.classList.remove('dark-ui');
			toggle.checked = false;
		}
	}

	document.addEventListener("DOMContentLoaded", function (event) {
		$('nav-trigger').addEventListener("click", function () {
			$('global-header').classList.toggle('nav-is-visible');
			$('nav-container').classList.toggle('nav-is-visible');
			$('dismiss-overlay').classList.toggle('hidden');
		});

		// THE DISMISS OVERLAY
		$('dismiss-overlay').addEventListener("click", function () {
			$('global-header').classList.toggle('nav-is-visible');
			$('nav-container').classList.toggle('nav-is-visible');
			$('dismiss-overlay').classList.toggle('hidden');
		});

		var body = document.querySelector('body'),
			isSingle = body.classList.contains('single-post');

		if (isSingle === true) {
			$('dark-ui-toggle').addEventListener("click", function () {
				var b = $('dark-ui-toggle'),
				    s = b.checked;
				if (s !== true) {
					b.checked = false;
					localStorage.setItem('dark-ui', 'light');
				} else {
					b.checked = true;
					localStorage.setItem('dark-ui', 'dark');
				}
				setStyles();
			});
			setStyles();
		}
		(function () {
			var header = new Headroom(document.querySelector("#global-header"), {
				tolerance: 5,
				offset: 205,
				classes: {
					initial: "headroom-pinned",
					pinned: "slideDown",
					unpinned: "headroom-unpinned"
				}
			});
			header.init();
		}());
	});
	
}());