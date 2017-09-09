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
		
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>

		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- post-sidebar-1 -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:600px"
		     data-ad-client="ca-pub-9404505295518697"
		     data-ad-slot="1825207201"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
</aside>
<!-- /sidebar -->
