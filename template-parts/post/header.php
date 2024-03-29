<?php 
    /**
     * Article variables.
     */
    $categories_list = get_the_category();
    $post_excerpt = get_the_excerpt(); // Get post excerpt.
    $author_id = $args['author_id'];
    $article_category = $args['article_category'];
    $post_title = get_the_title();

    /**
     * Post thumbnail variables.
     */
    $post_thumbnail_id = $args['post_thumbnail_id'];
    $post_thumbnail_caption = $args['post_thumbnail_caption'];

    if ( $categories_list ) :
?>
<!-- Post categories -->
<div class="shinka-post__categories">
    <ul class="shinka-post__categories-wrapper">
        <?php foreach ( $categories_list as $category ) : ?>
        <li class="shinka-post__categories-main">
            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="shinka-post__categories-link"><?php echo esc_html( $category->name ); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
<!-- Post meta -->
<div class="shinka-post__heading">
    <h1 class="shinka-post__title"><?php echo esc_html( $post_title ); ?></h1>
    <?php if ( $post_excerpt ) : ?>
        <p class="shinka-post__excerpt"><?php echo esc_html( $post_excerpt ); ?></p>
    <?php endif; ?>
    <div class="shinka-post__meta">
        <p class="shinka-post__info"><?php echo esc_html( $article_category ); ?> di <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php esc_html( the_author_meta( 'display_name', $author_id ) ); ?></a> | <time datetime="<?php esc_attr( the_time( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'j F Y, H:i' ) ); ?></time></p>
    </div>
    <div class="shinka-post__share">
        <div class="shinka-post__sns-btn shinka-post__sns-btn-facebook">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
        </svg>
        </div>
        <div class="shinka-post__sns-btn shinka-post__sns-btn-twitter">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
            </svg>
        </div>
        <div class="shinka-post__sns-btn shinka-post__sns-btn-whatsapp">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
            </svg>
        </div>
        <div class="shinka-post__sns-btn shinka-post__sns-btn-telegram">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"/>
            </svg>
        </div>
    </div>
</div>
<!-- Post content -->
<div class="shinka-post__content-wrapper">
    <div class="shinka-post__content-container">
        <?php if ( $post_thumbnail_id ) : ?>
        <div class="shinka-post__thumbnail">
            <figure class="shinka-post__thumbnail-wrapper">
                <?php
                    the_post_thumbnail(
                        'medium',
                        [
                            'class' => 'shinka-post__thumbnail-img shinka-utils__crop-16x9',
                            'srcset' => wp_get_attachment_image_url( $post_thumbnail_id, 'hot_post_thumbnail' ) . ' 700w, ' .
                                        wp_get_attachment_image_url( $post_thumbnail_id, 'post_thumbnail' ) . ' 1000w, ',
                            'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                            'alt' => esc_attr( $post_title ),
                        ],
                    );
                ?>
                <?php if ( $post_thumbnail_caption ) : ?>
                    <figcaption class="shinka-post__image-caption"><?php echo esc_html( $post_thumbnail_caption ); ?></figcaption>
                <?php endif; ?>
            </figure>
        </div>
        <?php endif; ?>
