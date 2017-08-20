<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="stories site-container site-content category">
			<header class="section-header">
				<h3 class="section-title">// <?php single_cat_title(); ?></h3>
			</header>

			<div class="flex-container">
			<?php get_template_part('loop'); ?>
			</div>
			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
