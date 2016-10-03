<?php get_header( 'home' ); ?>
<style>
	@-webkit-keyframes backgroundGradient {
		0% {background-position: 31% 0%}
		50% {background-position: 70% 100%}
		100% {background-position: 31% 0%}
	}

	@-moz-keyframes backgroundGradient {
		0% {background-position: 31% 0%}
		50% {background-position: 70% 100%}
		100% {background-position: 31% 0%}
	}

	@keyframes backgroundGradient {
		0% {background-position: 31% 0%}
		50% {background-position: 70% 100%}
		100% {background-position: 31% 0%}
	}

	.main {
		background: linear-gradient(335deg, #de12ad, #127dde, #de6112, #123ede);
		background-size: 800% 800%;
		height: 100vh;
		width: 100vw;
		position: fixed;
		animation: backgroundGradient 17s ease infinite;
	}
	.temp-title {
		margin: 3em 1em 1em 1em;
		color: #FFF;
		text-transform: none;
	}
</style>

<main class="main">
	<h1 class="temp-title playfair article-title u-centered">The Plant is gearing up for 2017!</h1>
	<div class="site-container"><?php get_template_part( 'searchform'); ?></div>
</main>

<?php wp_footer(); ?>