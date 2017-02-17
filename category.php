<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="clearfix site-container site-content category">

			<h1 class="index-title">// <?php single_cat_title(); ?></h1>
			<div class="flex-container">
			<?php get_template_part('loop-big'); ?>

			<?php if ( !is_paged()) : ?>
			<article class="flex-item has-border three-wide">
					<div class="card-wrapper">
							<a href="<?= get_home_url().'/'.get_page_uri(get_page_by_title('submit'))?>"><img class="sidebar-img" src="<?= get_template_directory_uri()?>/assets/img/sidebar/submit-1.jpg" alt="Submit your work"></a>
					</div>
			</article>
			<?php endif; ?>

			</div>
			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
