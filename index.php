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

<!-- 		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
		<!-- front-page-1 -->
<!-- 		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-9404505295518697"
		     data-ad-slot="5617822996"
		     data-ad-format="auto"></ins> -->
<!-- 		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script> -->


		<?php
			if ( !is_paged() ) { get_template_part('loop', 'index'); }
			else {
				get_template_part('loop');
			}
		?>
			<?php  ?>

		</div>
		<?php get_template_part( 'pagination'); ?>

		<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
		<!-- front-page-2 -->
<!-- 		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-9404505295518697"
		     data-ad-slot="7145639034"
		     data-ad-format="auto"></ins> -->
<!-- 		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script> -->

	</section>

</main>

<?php get_footer(); ?>
