<?php 
/*------------------------------------*\
    Shortcodes
\*------------------------------------*/

// [pullquote] $content [/pullquote]
function pullquotes_shortcode($atts, $content) {
	return '<blockquote class="pullquote">' . $content . '</blockquote>';
}
// [underline] $content [/underline]
function underline_shortcode($atts, $content) {
	return '<span class="underline">' . $content . '</span>';
}
// [dropcap] $X [/dropcap]
function dropcap_shortcode($atts, $content = null) {
	$str = strlen(utf8_decode($content));
	if ($str == 1) {
		return '<span class="dropcap">' . $content . '</span>';
	}
	else return $content;
}

// Add Shortcodes
add_shortcode('pullquote', 'pullquotes_shortcode');
add_shortcode('dropcap', 'dropcap_shortcode');
add_shortcode('underline', 'underline_shortcode');