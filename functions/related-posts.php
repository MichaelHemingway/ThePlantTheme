<?php
// Related Posts Function, matches posts by tags - call using plant_related_posts(); )
function plant_related_posts() {
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		$tag_arr = '';
		foreach( $tags as $tag ) {
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 3, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
		echo __( '<section class="related-posts-container">', 'plantwp' );
		echo '<div id="plant-related-posts"><h4>Related Posts</h4><hr /><ul>';
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<span class="author">by <?php the_author_posts_link(); ?></span>
				</li>
			<?php endforeach; }
			}
	wp_reset_postdata();
	echo '</ul></div></section>';
} /* end plant related posts function */
