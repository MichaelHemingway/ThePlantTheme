<?php get_header(); ?>

	<main role="main">
		<!-- section -->
    <section class="clearfix site-container site-content">
        <h1 class="article-title playfair"><?php _e( 'Archives', 'html5blank' ); ?></h1>
			
			<h2>Archives by Month:</h2>
			
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			<h2>Archives by Subject:</h2>
			<ul>
			 <?php wp_list_categories(); ?>
			</ul>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
