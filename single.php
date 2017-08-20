<?php get_header(); ?>

<main role="main" id="panel">
	<!-- section -->
	<section class="site-container">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class('is-single'); ?>>

			<header class="article-header">
				<?php if ( has_post_thumbnail()) : ?>
				<figure class="article-featured-image">
					<?php the_post_thumbnail(); ?>
				</figure>
				<figcaption>
					<span class="media-credit"><?php 
						the_post_thumbnail_caption();
						?> via <?php the_media_credit_html( get_post_thumbnail_id() ); ?>
				</figcaption>
				<?php endif; ?>
			</header>

			<?php //get_sidebar(); ?>
			<!-- <?php edit_post_link(); ?> -->

			<div class="article-details">
				<div class="article-byline">
					<?php // Post Author image
					$byline = get_the_terms( get_queried_object(), 'byline' )[0];
					$image = get_field('byline_picture', $byline); if( $image ): ?>
						<img src="<?php echo $image; ?>" class="post-byline-image">
					<?php else: ?>
						<img src="<?= get_template_directory_uri()?>/assets/img/gravatar.jpg" alt="anonymous" class="post-byline-image">
					<?php endif; ?>

					<div class="author-details">
						<p class="author" rel="author"><?php the_author_posts_link(); ?></p>
						<?php // twitter handle
						$handle = get_field('byline_twitter', $byline); if( $handle ): ?>
							<p class="byline-twitter"><?php echo '@'.$handle; ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div id="the-article">
				<h1 class="article-title" itemprop="headline">
					<?php the_title(); ?>
				</h1>
				<div class="article-meta">
					<span itemprop="datePublished" class="date"><?php the_time('F j, Y'); ?></span>
					<span class="small">| <?php the_category(', '); ?></span>
				</div>
				<?php the_content(); ?>
			</div>
		</article>

		<!-- /article -->
		<?php endwhile; ?>

		<?php else: ?>
		<article>
			<h1><?php _e( 'Sorry, nothing to display. ', 'html5blank ' ); ?></h1>
		</article>
		<?php endif; ?>

	</section>
	<?php plant_related_posts(); ?>
</main>

<?php get_footer(); ?>
