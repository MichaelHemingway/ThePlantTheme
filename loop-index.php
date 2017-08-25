<section class="recent stories">
	<header class="section-header">
		<h3 class="section-title">Recent Stories</h3>
	</header>

	<div class="flex-container">
	<?php // Custom Query for recent posts
	$args = array(
		'post_type'      => 'post', 
		'post_status'    => 'publish',
		'posts_per_page' => 8, 
		'meta_query'     =>  array( 
			array( 
				'key' => 'post_size',
				'value' => array('medium', 'large', 'centerfold'),
				'compare' => 'NOT IN'
			)
		) 
	); 
		$recent = null; 
		$recent = new WP_Query($args); 
		if ($recent->have_posts() ): while ($recent->have_posts()): $recent->the_post(); ?>


		<article id="post-<?php the_ID(); ?>" <?php post_class( 'story flex-item ' . get_post_meta( $post->ID, 'post_size', true)); ?>>

			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
					<?php the_post_thumbnail('large'); ?>
			</a>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/soc-profile.jpg" alt="">
				</a>
			<?php endif; ?>

			<div class="card-wrapper">

				<p class="item-category uppercase">
					<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?>
				</p>

				<h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-title" itemprop="headline">
						<?php the_title(); ?>
					</a>
				</h2>

				<span rel="author" class="author">by <?php the_author_posts_link(); ?></span>
				<?php if (has_tag()) :?> <span class="tagged"><?php the_tags(''); ?></span> <?php endif; ?>
			</div>
		</article>

		<?php endwhile; ?>
		<?php else: ?>

		<article>
				<h2><?php _e( 'There ain\'t nothing here, son.', 'html5blank' ); ?></h2>
		</article>

		<?php endif; ?>
	</div>
</section>


<section class="featured stories">
<header class="section-header">
	<h3 class="section-title">Top Stories</h3>
</header>

<div class="flex-container">
<?php // Custom Query for featured posts
$args = array(
	'post_type'      => 'post', 
	'post_status'    => 'publish',
	'posts_per_page' => 5, 
	'meta_query'     =>  array( 
		array( 
			'key' => 'post_size',
			'value' => array('medium', 'large', 'centerfold'),
			'compare' => 'IN'
		)
	) 
); 
	$featured = null; 
	$featured = new WP_Query($args); 
	if ($featured->have_posts() ): while ($featured->have_posts()): $featured->the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'story flex-item ' . get_post_meta( $post->ID, 'post_size', true)); ?>>

		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
				<?php the_post_thumbnail('large'); ?>
		</a>
		<?php else: ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/soc-profile.jpg" alt="">
			</a>
		<?php endif; ?>

		<div class="card-wrapper">

			<p class="item-category uppercase">
				<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?>
			</p>

			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-title" itemprop="headline">
					<?php the_title(); ?>
				</a>
			</h2>

			<span rel="author" class="author">by <?php the_author_posts_link(); ?></span>
			<?php if (has_tag()) :?> <span class="tagged"><?php the_tags(''); ?></span> <?php endif; ?>
		</div>
	</article>

	<?php endwhile; ?>
	<?php else: ?>

	<article>
			<h2><?php _e( 'There ain\'t nothing here, son.', 'html5blank' ); ?></h2>
	</article>

	<?php endif; ?>
	</div>
</section>





