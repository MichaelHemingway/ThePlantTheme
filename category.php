<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="clearfix site-container site-content category">

			<h1 class="has-border playfair index-title"><?php single_cat_title(); ?></h1>
			<div class="flex-container">
			<?php get_template_part('loop-big'); ?>
			</div>
			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
