<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

/**
 * Page thumbnail variables.
 */
$post_thumbnail_id = get_post_thumbnail_id();
$post_thumbnail_size = 'medium';
$post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, $post_thumbnail_size );
$post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, $post_thumbnail_size );
$post_thumbnail_caption = wp_get_attachment_caption( $post_thumbnail_id );

$recommended_posts = array(
	'posts_per_page'    => 4,
	'post_type'		    => 'post',
	'post_status'       => 'publish',
	'ignore_sticky_posts' => true,
	'nopaging'          => false,
	'no_found_rows' => true,
	'meta_query' => array(
		array(
			'key' => 'article_recommended',
			'value' => '1'
		)
	),
);
$recommended_query = new WP_Query( $recommended_posts );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shinka-post__main' ); ?>>
	<div class="shinka-post__heading">
		<?php the_title( '<h1 class="shinka-post__title">', '</h1>' ); ?>
	</div>
	<div class="shinka-post__content-wrapper">
		<div class="shinka-post__content-container">
			<?php if ( has_post_thumbnail() ): ?>
			<div class="shinka-post__thumbnail">
				<figure class="shinka-post__thumbnail-wrapper">
					<img class="shinka-post__thumbnail-img" src="<?php echo esc_url( $post_thumbnail_src ); ?>"
						srcset="<?php echo esc_attr( $post_thumbnail_srcset ); ?>"
						sizes="(max-width: 768px) 800px, (max-width: 1400px) 1400px, (max-width: 2000px) 2000px"
						alt="<?php the_title(); ?>"
					>
					<?php if ( $post_thumbnail_caption ): ?>
						<figcaption><?php echo esc_html( $post_thumbnail_caption ); ?></figcaption>
					<?php endif; ?>
				</figure>
			</div>
			<?php endif; ?>
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
		</div>
		<?php
		get_sidebar();
		?>
	</div>
	<?php 
		if( $recommended_query->have_posts() ):
	?>
	<h3 class="shinka__in-post-title">Contenuti consigliati</h3>
	<div class="shinka__recommended-content">
		<?php while( $recommended_query->have_posts() ):
            $recommended_query->the_post();
            $post_permalink = get_the_permalink();
            $post_title = $post->post_title; 
        ?>
		<article class="shinka__recommended-content-post">
			<?php if ( has_post_thumbnail() ):
                $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ); 
			?>
			<div class="shinka__recommended-content-image">
				<a href="<?php echo esc_url( $post_permalink ); ?>">
					<figure class="shinka-utils__image-wrapper">
						<img class="shinka__recommended-content-thumb shinka-utils__crop-16x9" src="<?php echo esc_url( $featured_image_url ); ?>">
					</figure>
				</a>
			</div>
			<?php endif; ?>
			<div class="shinka__recommended-content-text">
				<a href="<?php echo esc_url( $post_permalink ); ?>">
					<h3 class="shinka__recommended-content-title"><?php echo esc_html( $post_title ); ?></h3>
				</a>
			</div>
		</article>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</article>
