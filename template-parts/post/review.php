<?php 
/**
 * Variables for review.
 */
$post_thumbnail_src = $args['post_thumbnail_src'];
$author_id = $args['author_id'];
$game_title = $args['game_title'];
$game_summary = $args['game_summary'];
$game_featured_image = $args['game_featured_image'];
$game_developers = $args['game_developers'];

// Review content. 
$review_title = get_field( 'review_title' );
$review_summary = get_field( 'review_summary' );
$review_vote = get_field( 'review_vote' );
$vote_color;
switch ( $review_vote ) {
    case ( $review_vote < 6 ) :
        $vote_color = "#ff1414";
        break;
    case ( $review_vote >= 6 && $review_vote <= 6.5 ) :
        $vote_color = "#f65002";
        break;
    case ( $review_vote >= 7 && $review_vote <= 8.5 ) :
        $vote_color = "#00cd00";
        break;
    case ( $review_vote >= 9 && $review_vote <= 10 ) :
        $vote_color = "#008000";
        break;
}
?>
<!-- Game review -->
<div class="shinka-post__review" style="background-image: url('<?php echo esc_url( $post_thumbnail_src ); ?>')">
    <div class="shinka-post__review-wrapper">
        <div class="shinka-post__review-title">
            <h2 class="shinka-post__review-title-text"><?php echo esc_html( $review_title ); ?></h2>
        </div>
        <div class="shinka-post__review-summary">
            <p class="shinka-post__review-text"><?php echo esc_html( $review_summary ); ?></p>
        </div>
        <div class="shinka-post__review-vote" style="background: <?php echo $vote_color ?>;">
            <p class="shinka-post__review-vote-text"><?php echo esc_html( $review_vote ); ?></p>
        </div>
    </div>
</div>
<?php if ( $game_title ) :  ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Review",
    "url": "<?php echo esc_url( get_permalink() ); ?>",
    "itemReviewed": {
        "@type": "Game",
        "name": "<?php echo esc_html( $game_title ); ?>",
        "description": "<?php echo esc_html( $game_summary ); ?>",
        "image": "<?php echo esc_url( $game_featured_image ); ?>",
        "author": {
            "@type": "Organization",
            "name": "<?php foreach ( $game_developers as $game_developer ) : echo esc_html( get_the_title( $game_developer->ID ) ); endforeach; ?>"
        }
    },
    "reviewRating": {
        "@type": "Rating",
        "ratingValue": <?php echo esc_html( $review_vote ); ?>,
        "bestRating": 10,
        "worstRating": 1
    },
    "author": {
        "@type": "Person",
        "name": "<?php the_author_meta( 'display_name', $author_id ); ?>"
    },
    "reviewBody": "<?php echo esc_html( $review_summary ); ?>"
}
</script>
<?php endif; ?>
