<?php
if (get_theme_mod('bigstory_bg_mobile')) {
	echo '<!-- Featured Story -->
		<a href="'. get_theme_mod('bigstory_link') .'" >
			<img src="'. get_theme_mod('bigstory_tit_mobile') . '" id="mobile-big-story-title" />
			<img src="'. get_theme_mod('bigstory_tit_desktop'). '" id="desktop-big-story-title" />

			<div id="big-story-img" class="big-story-img"></div>
		</a>

		<style>
			@media (max-width: 700px) {
				#big-story-img {
					background-image: url("'.get_theme_mod('bigstory_bg_mobile').'");
				}
			}
			@media (min-width: 700px) {
				#big-story-img {
					background-image: url("'.get_theme_mod('bigstory_bg_desktop').'");
				}
			}
		</style>
	<!-- /Featured Story -->';
}?>
