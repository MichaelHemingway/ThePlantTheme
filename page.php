<?php get_my_header(); ?>
	<main role="main" class="bg-white">
		<section class="clearfix site-container">
			<h1 class="u-centered"><?php the_title(); ?></h1>
			<?php //get_sidebar(); ?>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div id="the-article">
					<?php the_content(); ?>
					</div>
				<br class="clear">
				<?php edit_post_link(); ?>
			</article>
		<?php endwhile; ?>
		<?php else: ?>
			<article>
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			</article>
		<?php endif; ?>
		</section>
	</main>

<?php get_footer(); ?>
