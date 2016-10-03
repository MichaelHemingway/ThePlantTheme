<?php /* Template Name: Staff Page Template */ get_header(); ?>

<main role="main">
    <section class="clearfix site-container">

        <h1 class="article-title playfair u-centered">The Staff</h1>
        <?php the_content(); ?>
        <br class="clear" />
        <?php edit_post_link(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="flex-container">
                <!-- Editor in Chief -->
                <div id="EIC-card" itemprop="person" class="card flex-item transition has-border">
                    <?php $image=get_field( 'editor_in_chief_img'); if( $image ):?>
                    <figure>
                        <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" />
                    </figure>
                    <?php endif; ?>
                    <div class="card-wrapper">
                        <h2 class="card-title helvetica">
                            <?php $value=get_field( "editor_in_chief_name"); echo $value; ?>
                        </h2>
                        <span class="author">Editor in Chief</span>
                        <p class=" uppercase">
                            <?php $value=get_field( "editor_in_chief_tw"); echo '<a href="https://twitter.com/'.$value. '">&#64;'.$value. '</a>'; ?>
                        </p>
                    </div>
                </div>
                <div id="EIC-desc" class="staff-desc hidden">
                    <?php $value=get_field( "editor_in_chief_desc"); echo '<p>'.$value. '</p>'; ?>
                </div>
                <!-- /Editor in Chief -->

                <!-- Me -->
                <div id="dev-card" itemprop="person" class="card flex-item transition has-border">
                    <figure>
                        <img src="<?php echo get_template_directory_uri()?>/img/IG-29.jpg" />
                    </figure>
                    <div class="card-wrapper">
                        <h2 class="card-title helvetica">
                            Michael Hemingway
                        </h2>
                        <span class="author">Web Designer</span>
                        <p class="uppercase">
                            <a href="https://twitter.com/mikemingway">&#64;mikemingway</a>
                        </p>
                    </div>
                </div>
                <!-- /Me -->
                
                <!-- Editor in Chief -->
                <div id="ME-card" itemprop="person" class="card flex-item transition has-border">
                    <?php $image=get_field('managing_editor_img'); if( $image ):?>
                    <figure>
                        <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" />
                    </figure>
                    <?php endif; ?>
                    <div class="card-wrapper">
                        <h2 class="card-title helvetica">
                            <?php $value=get_field( "managing_editor_name"); echo $value; ?>
                        </h2>
                        <span class="author">Editor in Chief</span>
                        <p class=" uppercase">
                            <?php $value=get_field( "editor_in_chief_tw"); echo '<a href="https://twitter.com/'.$value. '">&#64;'.$value. '</a>'; ?>
                        </p>
                    </div>
                </div>
                <div id="EIC-desc" class="staff-desc hidden">
                    <?php $value=get_field( "editor_in_chief_desc"); echo '<p>'.$value. '</p>'; ?>
                </div>
                <!-- /Editor in Chief -->
            </div>
        </article>
    </section>
</main>
<?php get_footer(); ?>