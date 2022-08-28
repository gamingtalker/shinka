<?php
/**
 * Create widget for latest "articoli".
 */
class shinka_widget_articles extends WP_Widget {
    function __construct() {
        parent::__construct (
            'shinka_widget_articles', __( 'Ultimi articoli', 'shinka' ),
            array( 'description' => __( 'Mostra gli ultimi articoli.', 'shinka' ),
        ));
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
    */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

		// Widget query.
        $articles_query = array(
            'posts_per_page'    => 4,
            'post_type'		    => 'post',
            'post_status'       => 'publish',
            'ignore_sticky_posts' => true,
            'nopaging'          => false,
            'no_found_rows' => true,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key'     => 'article_category',
                    'value'   => 'Articolo',
                    'compare' => 'LIKE',
                ),
                array(
                    'key'     => 'article_category',
                    'value'   => 'Recensione',
                    'compare' => 'LIKE',
                ),
            ),
        );
        $the_query = new WP_Query( $articles_query ); ?>
        <div class="shinka-sidebar__new-post-wrapper">
        <?php if( $the_query->have_posts() ) : ?>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                $post_thumbnail_id = get_post_thumbnail_id();
                $post_thumbnail_size = 'medium';
                $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, 'medium' );
                $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'thumbnail' );
                $post_title = get_the_title();
            ?>
            <div class="shinka-sidebar__new-post">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="shinka-sidebar__new-post-image">
                        <a href="<?php esc_url( the_permalink() ); ?>">
                            <figure class="shinka-utils__image-wrapper">
                            <?php 
                            the_post_thumbnail(
                                'medium',
                                [
                                    'class' => 'shinka-sidebar__new-post-thumb shinka-utils__crop-16x9',
                                    'srcset' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 700w, ' .
                                                wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 1000w, ',
                                    'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                                    'alt' => esc_html( $post_title ),
                                    'loading' => 'lazy'
                                ],
                            );
                            ?>
                            </figure>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="shinka-sidebar__new-post-text">
                    <a href="<?php esc_url( the_permalink() ); ?>">
                        <h3 class="shinka-sidebar__new-post-title"><?php echo esc_html( $post_title ); ?></h3>
                    </a>
                </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
                endif; 
            ?>
        </div>
        <?php
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
    */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Ultimi articoli', 'gt_widget_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        
        return $instance;
    }
}

/**
 * Create widget for latest "guide".
 */
class shinka_widget_guides extends WP_Widget {
    function __construct() {
        parent::__construct (
            'shinka_widget_guides', __( 'Ultime guide', 'shinka' ),
            array( 'description' => __( 'Mostra le ultime guide.', 'shinka' ),
        ));
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
    */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

		// Widget query.
        $guides_query = array(
            'posts_per_page'    => 4,
            'post_type'		    => 'post',
            'post_status'       => 'publish',
            'ignore_sticky_posts' => true,
            'nopaging'          => false,
            'no_found_rows' => true,
            'meta_query' => array(
                array(
                    'key'     => 'article_category',
                    'value'   => 'Guida',
                    'compare' => 'LIKE',
                ),
            ),
        );
        $the_query = new WP_Query( $guides_query ); ?>
        <div class="shinka-sidebar__new-post-wrapper">
        <?php if( $the_query->have_posts() ) : ?>
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                $post_thumbnail_id = get_post_thumbnail_id();
                $post_thumbnail_size = 'medium';
                $post_thumbnail_src = wp_get_attachment_image_url( $post_thumbnail_id, 'medium' );
                $post_thumbnail_srcset = wp_get_attachment_image_srcset( $post_thumbnail_id, 'thumbnail' );
                $post_title = get_the_title();
            ?>
            <div class="shinka-sidebar__new-post">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="shinka-sidebar__new-post-image">
                        <a href="<?php esc_url( the_permalink() ); ?>">
                            <figure class="shinka-utils__image-wrapper">
                            <?php 
                            the_post_thumbnail(
                                'medium',
                                [
                                    'class' => 'shinka-sidebar__new-post-thumb shinka-utils__crop-16x9',
                                    'srcset' => wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 700w, ' .
                                                wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ) . ' 1000w, ',
                                    'sizes' => '(max-width: 700px) 400w, (max-width: 1000px) 800w, (max-width: 1200px) 1000w',
                                    'alt' => esc_html( $post_title ),
                                    'loading' => 'lazy'
                                ],
                            );
                            ?>
                            </figure>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="shinka-sidebar__new-post-text">
                    <a href="<?php esc_url( the_permalink() ); ?>">
                        <h3 class="shinka-sidebar__new-post-title"><?php echo esc_html( $post_title ); ?></h3>
                    </a>
                </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
                endif; 
            ?>
        </div>
        <?php
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
    */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Ultime guide', 'gt_widget_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
    */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        
        return $instance;
    }
}

// Register the widgets.
function shinka_load_custom_widgets() {
    register_widget( 'shinka_widget_articles' );
    register_widget( 'shinka_widget_guides' );
}
add_action( 'widgets_init', 'shinka_load_custom_widgets' );
