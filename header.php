<!doctype html>
<!-- 
 /$$$$$$$$ /$$                       /$$$$$$$  /$$                       /$$    
|__  $$__/| $$                      | $$__  $$| $$                      | $$    
	 | $$   | $$$$$$$   /$$$$$$       | $$  \ $$| $$  /$$$$$$  /$$$$$$$  /$$$$$$  
	 | $$   | $$__  $$ /$$__  $$      | $$$$$$$/| $$ |____  $$| $$__  $$|_  $$_/  
	 | $$   | $$  \ $$| $$$$$$$$      | $$____/ | $$  /$$$$$$$| $$  \ $$  | $$    
	 | $$   | $$  | $$| $$_____/      | $$      | $$ /$$__  $$| $$  | $$  | $$ /$$
	 | $$   | $$  | $$|  $$$$$$$      | $$      | $$|  $$$$$$$| $$  | $$  |  $$$$/
	 |__/   |__/  |__/ \_______/      |__/      |__/ \_______/|__/  |__/   \___/  
-->

<html <?php language_attributes(); ?>class="no-js">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
	<meta name="theme-color" content="#1C5139">

	<title>
		<?php wp_title( ''); ?>
		<?php if(wp_title( '', false)) { echo ' :'; } ?>
		<?php bloginfo( 'name'); ?>
	</title>

	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/touch.png" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<?php wp_head(); ?>

	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-69152759-1', 'auto');
	ga('send', 'pageview');</script>
</head>

<body <?php body_class(); ?>>

<span id="nav-trigger" class="nav-trigger">Menu<span></span></span>

<a href="<?php echo home_url(); ?>" class="logo" id="nav-logo">
	<img src="<?php echo get_theme_mod( 'plant_header_logo');?>" alt="Logo" class="logo-img">
</a>

<nav id="nav-container" class="nav-container">

	<?php get_template_part( 'searchform'); ?>

	<ul class="nav u-list-none">
		<li class="nav-element bg-news">
			<a itemprop="url" href="<?php $cat_id = get_cat_ID( 'news' );
			$cat_link = get_category_link( $cat_id );
			echo $cat_link; ?>">News</a>
		</li>

		<li class="nav-element bg-voices">
			<a itemprop="url" href="<?php $cat_id = get_cat_ID( 'voices' );
			$cat_link = get_category_link( $cat_id );
			echo $cat_link; ?>">Voices</a>
		</li>


		<li class="nav-element bg-arts">
			<a itemprop="url" href="<?php $cat_id = get_category_by_slug('arts');
			$id = $cat_id->term_id;
			$cat_link = get_category_link( $id );
			echo $cat_link; ?>
			">Arts &amp; Culture</a>
		</li>

		<li class="nav-element bg-sports">
			<a itemprop="url" href="<?php $cat_id = get_cat_ID('sports');
			$cat_link = get_category_link( $cat_id );
			echo $cat_link; ?>">Sports</a>
		</li>

		<li class="nav-element bg-science">
			<a itemprop="url" href="<?php $cat_id = get_cat_ID('science');
			$cat_link = get_category_link( $cat_id );
			echo $cat_link; ?>">Science</a>
		</li>

		<li class="nav-element bg-curiosities">
			<a itemprop="url" href="<?php $cat_id = get_cat_ID('curiosities');
			$cat_link = get_category_link( $cat_id );
			echo $cat_link; ?>">Curiosities</a>
		</li>
	</ul>

	<div class="nav-social">
		<ul>
			<li class="nav-social-item"><a href="https://www.instagram.com/theplantnews/">Instagram</a></li>
			<li class="nav-social-item"><a href="https://www.facebook.com/theplantnews/">Facebook</a></li>
			<li class="nav-social-item"><a href="https://scontent-yyz1-1.cdninstagram.com/t51.2885-15/e35/20759982_1719983854969465_7093691822865645568_n.jpg">Snapchat</a></li>
			<li class="nav-social-item"><a href="https://twitter.com/theplantnews">Twitter</a></li>
		</ul>
	</div>
</nav>

<div id="dismiss-overlay" class="hidden"></div>
<div class="wrapper">
