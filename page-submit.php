<?php get_my_header();?>
<main role="main">
	<section class="clearfix site-container">
		<h1><?php the_title(); ?></h1>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</article>
		<?php endwhile; ?>
		<?php else: ?>
		<article>
			<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		</article>
		<?php endif; ?>
	</section>
</main>

</div>
<!-- /wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
<script>var prefetch = document.createElement('meta');
prefetch.rel = 'prerender';
prefetch.href = '<?php echo home_url(); ?>';
document.addEventListener('load', function () {
document.getElementsByTagName('head')[0].appendChild(prefetch);
});</script>
</body>
</html>