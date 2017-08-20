<?php get_header(); ?>
<?php $tax = $wp_query->get_queried_object(); ?>
<main role="main">
	<section class="byline-profile">

	<?php $image = get_field('byline_picture', $tax); if( $image ):?>
		<img class="byline-img" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" />
	<?php else: ?>
		<img src="<?= get_template_directory_uri()?>/assets/img/gravatar.jpg" alt="anonymous" class="byline-img">
	<?php endif; ?>

		<div class="byline-body">
			<h1 itemprop="author" class="name"><?= $tax->name;?></h1>
			<div class="contact">
				<?php if (get_field("byline_twitter", $tax ) != '') {
					echo '@' . get_field("byline_twitter", $tax );
				} ?>
				<?php if (get_field('byline_website', $tax) != '') {
					echo ' | <a href="' . get_field('byline_website', $tax) . '">Online</a>';
					}?>
			</div>

			<?= term_description() ?>
		</div>
	</section>

	<section class="site-container stories">
		<header class="section-header">
			<h3 itemprop="author" class="section-title">
				Stories by <?php $tax = $wp_query->get_queried_object();
				echo $tax->name;?>
			</h3>
		</header>

		<div class="flex-container">

		<?php $args= array('post_type'=> 'post', 
						   'post_status' => 'publish',
						   'posts_per_page' => -1, 
						   'tax_query' => 
						   array( 
							   array( 'taxonomy' => 'byline',
									 'field' => 'slug',
									 'terms' => $tax )
						   ) 
						  ); 
		$my_query = null; 
		$my_query = new WP_Query($args); 
		if( $my_query->have_posts() ) { ?>

		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="story flex-item">
				<?php if ( has_post_thumbnail()) :?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
						<?php the_post_thumbnail(array(300, 169)); ?>
				</a>
				<?php else: ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/soc-profile.jpg" alt="">
					</a>
				<?php endif; ?>
				<div class="card-wrapper">
					<h2>
					 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-title" itemprop="headline"><?php the_title(); ?></a>
				</h2>
					<span class="date uppercase"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></span>
					<?php if (has_tag()) :?> <span class="tagged"><?php the_tags(''); ?></span> <?php endif; ?>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php } wp_reset_query(); ?>
	<?php get_template_part( 'pagination'); ?>
</main>
<?php get_footer(); ?>