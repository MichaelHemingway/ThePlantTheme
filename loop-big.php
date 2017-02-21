<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card flex-item has-border ' . get_post_meta( $post->ID, 'post_size', true)); ?>>

  <!-- post thumbnail -->
  <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <?php the_post_thumbnail('large'); ?>
  </a>
  <?php endif; ?>
  <!-- /post thumbnail -->

  <div class="card-wrapper">
    <p class="category-description uppercase">
        <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?></p>
    <!-- post title -->
    <h2>
	    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="card-title" itemprop="headline"><?php the_title(); ?></a>
    </h2>
    <!-- /post title -->

    <!-- post details -->
    <span rel="author" class="author">by <?php the_author_posts_link(); ?></span>
    <?php if (has_tag()) :?> <span class="tagged"><?php the_tags(''); ?></span> <?php endif; ?>
    <!-- /post details -->
  </div>
</article>
<!-- /article -->
<?php endwhile; ?>
<?php else: ?>
<!-- article -->
<article>
    <h2><?php _e( 'There ain\'t nothing here, son.', 'html5blank' ); ?></h2>
</article>
<!-- /article -->
<?php endif; ?>
