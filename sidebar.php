<!-- sidebar -->
<aside id="sidebar" class="sidebar" role="complementary">
	<div id="sidebar-wrap">
	<?php date_default_timezone_set('America/New_York');
		$date = date('h:i');
		if ($date === "09:11") {
			echo '<a href="'. get_home_url().'/'.get_page_uri(get_page_by_title('submit')).'"><img class="sidebar-img" src="'. get_template_directory_uri().'/assets/img/sidebar/allahu-0.jpg" alt="allahu ackbar"></a>';
		} else {
			echo '<a href="'. get_home_url().'/'.get_page_uri(get_page_by_title('submit')).'"><img class="sidebar-img" src="'. get_template_directory_uri().'/assets/img/sidebar/submit-0.jpg" alt="Submit your work"></a>';
		}?> 
		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
		</div>

		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
		</div>
	</div>
</aside>
<!-- /sidebar -->
