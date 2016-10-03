<?php get_my_header(); ?>
<main role="main">
    <section class="clearfix site-container site-content category">
        <h1 class="has-border playfair index-title"><?php single_cat_title(); ?></h1>
        <div class="flex-container">
            <?php get_template_part( 'loop-big'); ?>
            <?php if ( !is_paged()) : ?>
            <article class="flex-item has-border three-wide">
                <div class="card-wrapper">
                    <h2 class="helvetica huge">Staff</h2>
                    <ul class="u-list-none">
                        <li>Voices Editor <a href="mailto:voices@theplantnewspaper.com">Maud Belair</a></li>
                    </ul>
                    <hr />
                    <a href="<?= get_home_url().'/'.get_page_uri(get_page_by_title('submit'))?>"><img class="sidebar-img" src="<?= get_template_directory_uri()?>/assets/img/sidebar/submit-1.jpg" alt="Submit your work"></a>
                </div>
            </article>
            <?php endif; ?>
        </div>
        <?php get_template_part( 'pagination'); ?>
    </section>
</main>

<?php get_footer(); ?>