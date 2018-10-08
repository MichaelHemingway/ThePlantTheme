<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/Z0MbcACY1FI" frameborder="0" allowfullscreen></iframe>

					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
