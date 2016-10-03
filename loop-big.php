<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card flex-item transition has-border'); ?>>
    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php the_post_thumbnail(array(600,338)); ?>
    </a>
    <!-- /post thumbnail -->
    <div class="card-wrapper">
        <p class="category-description uppercase">
            <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?></p>
        <!-- post title -->
        <h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="helvetica" itemprop="headline"><?php the_title(); ?></a>
		</h2>
        <!-- /post title -->
        <!-- post details -->
        <span rel="author" class="author"><?php the_author_posts_link(); ?></span>
        <br />
        <span class="date uppercase"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></span>
        <!-- /post details -->
    </div>

    <?php else: // Article wihtout image arrangement?>
    <div class="card-wrapper">
        <!-- post category no link -->
        <p class="category-description uppercase">
            <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?></p>
        <!-- /post category no link -->
        <h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="helvetica huge" itemprop="headline"><?php the_title(); ?></a>
		</h2>
        <!-- post details -->
        <span rel="author" class="author"><?php the_author_posts_link(); ?></span>
        <br />
        <span class="date uppercase"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></span>
        <!-- /post details -->
    </div>
    <?php endif; ?>
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