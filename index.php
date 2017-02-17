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

        <?php
					if ( !is_paged() ): get_template_part( 'content', 'featured-story' );
					endif;
        	if (get_theme_mod('bigstory_hex')) {
						//echo '<style> .first-page { background-color:'.get_theme_mod('bigstory_hex').'}</style>';
					}
				?>

        <div class="flex-container">

          <?php get_template_part('loop-big'); ?>

          <?php if ( !is_paged()) : ?>
          <article class="flex-item has-border three-wide">
              <div class="card-wrapper">
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
