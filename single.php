<?php get_header(); ?>

<main role="main" id="panel">
    <!-- section -->
    <section class="clearfix site-container">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <!-- article -->
        <article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class( 'is-single'); ?>>
            <span itemprop="datePublished" class="date"><?php the_time('F j, Y'); ?></span> <span class="small">| <?php the_category(', '); ?></span>

            <h1 itemprop="headline" class="article-title playfair"><?php the_title(); ?></h1>

            <?php if ( has_post_thumbnail()) :?>
            <!-- post thumbnail -->
            <figure>
                <?php the_post_thumbnail(); ?>
                <figcaption>
					<span class="media-credit"><?php $var = '';//the_media_credit_html(get_post_thumbnail_id());
                if ($var != '') {echo $var; }?></span>
					<div class="caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
                </figcaption>
            </figure>
            <!-- /post thumbnail -->
            <?php endif; ?>

            <div class="article-info">
                <i class="author" rel="author"><?php _e( 'By', 'html5blank' ); ?> <?php the_author_posts_link(); ?></i><br />
                <?php edit_post_link('Edit this', '','', 0, 'post-edit-btn'); ?>
            </div>
            <hr />

            <?php //get_sidebar(); ?>

            <div id="the-article">
                <?php the_content(); ?>
            </div>

            <?php the_tags( __( '#', 'html5blank' ), ' #', '<br>'); ?>

            <hr />
            <?php post_nav_background(); ?>
            <?php the_post_navigation( array( 'next_text'=> '<span class="meta-nav helvetica">' . __( 'Next:', 'twentyfifteen' ) . '</span> ' . '
            <div class="post-title-nav">%title</div>', 'prev_text' => '<span class="meta-nav helvetica">' . __( 'Previous:', 'twentyfifteen' ) . '</span> ' . ' <div class="post-title-nav">%title</div>', ) ); ?>
            <?php plant_related_posts(); ?>

        </article>
        <!-- /article -->
        <?php endwhile; ?>

        <?php else: ?>
        <article>
            <h1><?php _e( 'Sorry, nothing to display. ', 'html5blank ' ); ?></h1>
        </article>
        <?php endif; ?>

    </section>
</main>
<?php get_footer(); ?>
