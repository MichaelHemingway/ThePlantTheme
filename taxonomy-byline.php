<?php get_header(); ?>
<main role="main">
    <section class="clearfix site-container site-content">
        <h1 itemprop="author" class="article-title playfair">
            <?php $tax = $wp_query->get_queried_object();
            echo $tax->name;?>
        </h1>
        <div class="byline-body">
            <?php $image=get_field('byline_picture', $tax); if( $image ):?>
                <figure>
                    <img class="byline-img" src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" />
                </figure>
        <?php endif; ?>
            <?=term_description() ?>
        </div>
        <div class="byline-contact">
            <?php $value=get_field( "byline_email", $tax ); 
            echo '<a href="mailto:'.$value.'">'.$value.'</a>'; ?>
        </div>
    </section>


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
    <section class="clearfix site-container site-content">
        <h1 class="index-title helvetica has-border u-centered">Posts by author</h1>
        <div class="flex-container">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="card flex-item has-border">
                <?php if ( has_post_thumbnail()) {?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <figure>
                        <?php the_post_thumbnail(array(300, 169)); ?>
                    </figure>
                </a>
                <?php } ?>
                <div class="card-wrapper">
                    <h2>
			         <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="helvetica" itemprop="headline"><?php the_title(); ?></a>
                </h2>
                    <span class="date uppercase"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?></span>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
        <?php get_template_part( 'pagination'); ?>
    </section>
    <?php } wp_reset_query(); ?>
</main>
<?php get_footer(); ?>