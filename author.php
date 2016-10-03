<?php get_header(); ?>
	<main role="main">
		<!-- section -->
		<section class="clearfix site-container site-content">
		<?php if (have_posts()): the_post(); ?>
			<h1 class="playfair"><?php echo get_the_author(); ?></h1>
		<?php if ( get_the_author_meta('description')) : ?>
		<?php echo get_avatar(get_the_author_meta('user_email')); ?>
			<h2><?php _e( 'About ', 'html5blank' ); echo get_the_author() ; ?></h2>
			<?php echo wpautop( get_the_author_meta('description') ); ?>
			<hr />
		<?php endif; ?>
		<?php rewind_posts(); while (have_posts()) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(array(600,338)); // Declare pixel size you need inside the array ?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->
				<!-- post title -->
				<h2 class="helvetica">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<!-- /Post title -->
				<span class="date"><?php the_time('F j, Y'); ?></span>
				<br class="clear">
				<?php edit_post_link(); ?>
			</article>
			<hr />
			<!-- /article -->
		<?php endwhile; ?>
		<?php else: ?>
			<!-- article -->
			<article>
				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
			</article>
			<!-- /article -->
		<?php endif; ?>
			<?php get_template_part('pagination'); ?>
		</section>
		<!-- /section -->
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
