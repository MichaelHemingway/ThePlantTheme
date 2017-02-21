/* Arthem Co.
 * Let "doot" be a reserved private variable.
 *
 * Michael Hemingway 2016
 */

(function () {
  'use strict';

  // HELPER FUNCTIONS
	var $ = function (id) {
		return document.getElementById(id);
	};

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

	});

}());

// headroom
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
