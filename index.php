<?php get_header( 'home' ); ?>
<?php if ( !is_paged() ) {
	echo '<main class="first-page" role="main">';
} else {
	echo '<main class="" role="main">';
}
if(isset($_SESSION["message"])) {
	echo'<div id=#post-success" class="u-centered" style="margin: 2em; padding: 1em; opacity: 0.92; background-color: #FFF;">Thanks, we got your submission!<br />The category\'s editor will prep it for posting as soon as possible. :) </div>';
	unset($_SESSION["message"]);
}
?>
	<section class="site-container site-content index">

		<?php
			if ( !is_paged() ): get_template_part( 'content', 'featured-story' );
			endif;
			if (get_theme_mod('bigstory_hex')) {
				//echo '<style> .first-page { background-color:'.get_theme_mod('bigstory_hex').'}</style>';
			}
		?>

			<?php get_template_part('loop', 'index'); ?>

		</div>
		<?php get_template_part( 'pagination'); ?>

	</section>

</main>

<?php get_footer(); ?>
