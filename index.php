<?php get_header( 'home' ); ?>
<?php if ( !is_paged() ) {
	echo '<main class="first-page" role="main">';
} else {
	echo '<main class="" role="main">';
}
if(isset($_SESSION["message"])) {
	echo'<div id=#post-success" class="has-border u-centered" style="margin: 2em; padding: 1em; opacity: 0.92; background-color: #FFF;">Thanks, we got your submission!<br />The category\'s editor will prep it for posting as soon as possible. :) </div>';
	unset($_SESSION["message"]);
}
?>
    <!-- section -->
    <section class="clearfix site-container site-content index">

        <?php if ( !is_paged() ): get_template_part( 'content', 'featured-story' ); endif;

        if (get_theme_mod('bigstory_hex')) {
		echo '<style> .first-page { background-color:'.get_theme_mod('bigstory_hex').'}</style>';
		} ?>

        <div class="container">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'card flex-item has-border'); ?>>
                <!-- post thumbnail -->
                <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <figure>
                        <?php the_post_thumbnail(); ?>
                    </figure>
                </a>
								<?php endif; ?>
                <!-- /post thumbnail -->

                <div class="card-wrapper">
                    <p class="category-description uppercase">
                        <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?></p>
                    <!-- post title -->
                    <h2 class="card-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="" itemprop="headline"><?php the_title(); ?></a>
                    </h2>
                    <!-- /post title -->
                    <!-- post details -->
                    <span rel="author" class="author"><?php the_author_posts_link(); ?></span>
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
            <?php if ( !is_paged()) : ?>
            <article class="flex-item has-border three-wide">
                <div class="card-wrapper">
                    <h2 class="helvetica huge">Staff</h2>
                    <ul class="u-list-none">
								<li>Editor in Chief <a href="mailto:chief@theplantnewspaper.com">Athina Khalid</a></li>
								<li>Managing Editor <a href="mailto:contact@theplantnewspaper.com">Julia Crowly</a></li>
								<li>Copy Editor <a href="mailto:contact@theplantnewspaper.com">Chloe Wong-Mersereau</a></li>
                        <li>Web Developer <a href="https://arthem.co/">Michael Hemingway</a></li>
                    </ul>
					<hr />
					<a href="<?php echo get_page_uri(get_page_by_title('submit'))?>"><img class="sidebar-img" src="<?php echo get_template_directory_uri()?>/assets/img/sidebar/submit-1.jpg" alt="Submit your work"></a>
                </div>
            </article>
            <?php endif; ?>
        </div>
        <?php get_template_part( 'pagination'); ?>
    </section>
    <!-- /section -->
</main>

<?php get_footer(); ?>
