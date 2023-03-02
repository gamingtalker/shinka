<?php
	/**
	 * Template part for displaying posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package _s
	 */

	/**
	 * Post variables.
	 */
	$tags_list = get_the_tag_list();
	$article_category = get_field( 'article_category' );
	$author_id = ( $post->post_author ); // Get post author.

	/**
	 * Game variables.
	 */
	$games_list = get_field( 'article_games' );
	if ( $games_list ) :
		$game_id = ( $games_list[0]->ID );
		$game_featured_image = get_the_post_thumbnail_url( $game_id );
		$game_permalink = get_permalink( $game_id );
		$game_title = get_the_title( $game_id );
		$game_release_date = get_field( 'game_release_date', $game_id );
		$game_temp_date = get_field( 'game_temp_date', $game_id );
		$game_platforms = get_field( 'game_platforms', $game_id );
		$game_developers = get_field( 'game_developer', $game_id );
		$game_publishers = get_field( 'game_publisher', $game_id );
		$game_cover = get_field( 'game_cover', $game_id );
		$game_summary = get_field( 'game_summary', $game_id ); 
	endif;

	/**
	 * Post thumbnail variables.
	 */
	$post_thumbnail_id = get_post_thumbnail_id();
<<<<<<< HEAD
	$post_thumbnail_size = 'medium_large';
	$post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
=======
>>>>>>> 479b35bd9a35899ed92fab36c2cc426696c0c154
	$post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );
?>

<?php if ( $article_category == 'Recensione' ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'shinka-post__main shinka-post__type-review' ); ?>>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'shinka-post__main' ); ?>>
<?php endif; ?>
	<?php 
		get_template_part( 
			'template-parts/post/header',
			null,
			array(
<<<<<<< HEAD
				'post_thumbnail_src' => $post_thumbnail_src,
=======
>>>>>>> 479b35bd9a35899ed92fab36c2cc426696c0c154
				'article_category' => $article_category,
				'author_id' => $author_id,
				'post_thumbnail_id' => $post_thumbnail_id,
				'post_thumbnail_caption' => $post_thumbnail_caption,
			),
		);
	?>
		<div class="shinka-post__content">
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shinka' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			?>
		</div>
		<?php
			if ( $article_category == 'Recensione' ) :
				get_template_part(
					'template-parts/post/review',
					null,
					array(
						'post_thumbnail_src' => $post_thumbnail_src,
						'game_title' => $game_title,
						'game_summary' => $game_summary,
						'game_featured_image' => $game_featured_image,
						'game_developers' => $game_developers,
						'author_id' => $author_id,
					),
				);
			endif;
		?>
		<?php if ( $tags_list ) : ?>
		<!-- Post tags -->
		<div class="shinka-post__tags">
			<?php /* translators: 1: list of tags. */
				printf( esc_html__( 'Tag: %1$s', 'shinka' ), $tags_list );
			?>
		</div>
		<?php 
			endif;
			wp_reset_postdata();
			// Get related content.
			get_template_part( 'template-parts/post/related-content' );
			// Get post game.
			if ( $games_list ) :
				get_template_part(
					'template-parts/post/game',
					null,
					array(
						'game_title' => $game_title,
						'game_summary' => $game_summary,
						'game_featured_image' => $game_featured_image,
						'game_developers' => $game_developers,
						'game_publishers' => $game_publishers,
						'game_cover' => $game_cover,
						'game_permalink' => $game_permalink,
						'game_platforms' => $game_platforms,
						'game_release_date' => $game_release_date,
						'game_temp_date' => $game_temp_date
					),
				);
			endif;
			// Load comments if open.
			if ( comments_open() ) : 
		?>
			<!-- Post comments -->
			<h3 class="shinka__in-post-title">Commenti</h3>
			<?php
				comments_template();
				endif; 
			?>
		</div>
		<!-- Post sidebar -->
		<?php get_sidebar(); ?>
		</div>
		<?php get_template_part( 'template-parts/post/recommended-content' ); ?>
	</div>
</article>
