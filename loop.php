<?php if (have_posts()) : ?> 
<div class="flex-container"> 
<?php while (have_posts()) : the_post(); ?>
	<!-- article -->
	<article id="post-<?php the_ID(); ?>" class="card flex-item has-border">
            <?php if ( has_post_thumbnail()) {?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <figure>
                        <?php the_post_thumbnail(array(300, 169)); ?>
                    </figure>
                </a><?php } ?>
            <div class="card-wrapper">
                <h2>
			         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="helvetica" itemprop="headline"><?php the_title(); ?></a>
                </h2>
            <span class="date uppercase"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></span>
            </div>
        </article>
<?php endwhile; ?>
</div>
<?php  else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'There ain\'t nothing here, son.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>