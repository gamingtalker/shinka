<?php
    $post_tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );
    $query_args = [
        'post__not_in'        => array( get_queried_object_id() ),
        'posts_per_page'      => 5,
        'orderby'             => 'date',
        'tax_query' => [
            [
                'taxonomy' => 'post_tag',
                'terms'    => $post_tags
            ]
        ]
    ];
    $tag_query = new WP_Query( $query_args );
?>
<?php if ( $tag_query->have_posts() ) : ?>
<!-- Related posts -->
<div class="shinka__related-content">
    <h3>Articoli correlati</h3>
    <?php 
        while ( $tag_query->have_posts() ) :
            $tag_query->the_post(); 
            $post_permalink = get_the_permalink();
            $post_title = $post->post_title; 
    ?>
    <h4 class="shinka__related-content-title">
        <a href="<?php echo esc_url( $post_permalink ); ?>"><?php echo esc_html( $post_title ); ?></a>
    </h4>
    <?php 
        endwhile; 
        wp_reset_postdata(); 
    ?>
</div>
<?php endif; ?>
