<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		 <section class="stories search site-container site-content">
		 <header class="section-header">
		 	<h3 class="section-title"><?php echo sprintf( __( '%s Results for "', 'html5blank' ), $wp_query->found_posts ); echo get_search_query();?>"</h3>
		 </header>
		 <div class="flex-container">
			<?php get_template_part('loop'); ?>
			</div>
            <?php get_template_part('pagination'); ?>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
