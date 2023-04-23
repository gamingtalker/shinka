<?php
    /**
     * Games variables.
     */
    $game_title = $args['game_title'];
    $game_summary = $args['game_summary'];
    $game_featured_image = $args['game_featured_image'];
    $game_developers = $args['game_developers'];
    $game_publishers = $args['game_publishers'];
    $game_cover = $args['game_cover'];
    $game_permalink = $args['game_permalink'];
    $game_platforms = $args['game_platforms'];
    $game_release_date = $args['game_release_date'];
    $game_temp_date = $args['game_temp_date'];
    $game_dev_array = array();
    $game_publisher_array = array();
?>
<h3 class="shinka__in-post-title">In questo articolo</h3>
<div class="shinka__post-game">
    <?php if ( $game_cover ) : ?>
    <div class="shinka__post-game-wrapper">
        <div class="shinka__post-game-cover">
            <a href="<?php echo esc_url( $game_permalink ); ?>">
                <img src="<?php echo esc_url( $game_cover['sizes']['medium'] ); ?>" class="shinka__post-game-cover-img" alt="<?php echo esc_attr( $game_title ); ?>">
            </a>
        </div>
    <?php else: ?>
    <div class="shinka__post-game-wrapper shinka__game-no-cover">
    <?php endif; ?> 
        <div class="shinka__post-game-heading">
            <a href="<?php echo esc_url( $game_permalink ); ?>">
                <h3 class="shinka__post-game-title"><?php echo esc_html( $game_title ); ?></h3>
            </a>
            <?php if ( $game_summary ): ?>
            <p class="shinka__post-game-summary"><?php echo esc_html( $game_summary ); ?></p>
            <?php endif; ?>
        </div>
        <div class="shinka__post-game-details">
            <?php if ( $game_developers ) : ?>
            <div class="shinka__post-game-developer shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Sviluppatore: </span>
                <span class="shinka__post-game-text-content">
                    <?php
                        foreach ( $game_developers as $game_developer ) :
                            $developer_permalink = get_permalink( $game_developer->ID );
                            $developer_name = get_the_title( $game_developer->ID );
                            $developer_permalink = esc_url( $developer_permalink );
                            $developer_name = esc_html( $developer_name );
                            $game_dev_array[] = '<a href=' . $developer_permalink . '>' . $developer_name . '</a>';
                        endforeach;
                        echo implode( ', ', $game_dev_array );
                    ?>
                </span>
            </div>
            <?php 
                endif;
                if ( $game_publishers ) : 
            ?>
            <div class="shinka__post-game-publisher shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Publisher: </span>
                <span class="shinka__post-game-text-content">
                    <?php
                        foreach ( $game_publishers as $game_publisher ) :
                            $publisher_permalink = get_permalink( $game_publisher->ID );
                            $publisher_name = get_the_title( $game_publisher->ID );
                            $publisher_permalink = esc_url( $publisher_permalink );
                            $publisher_name = esc_html( $publisher_name );
                            $game_publisher_array[] = '<a href=' . $publisher_permalink . '>' . $publisher_name . '</a>';
                        endforeach;
                        echo implode( ', ', $game_publisher_array );
                    ?>
                </span>
            </div>
            <?php endif; ?>
            <div class="shinka__post-game-release-date shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Data di uscita: </span>
                <?php if ( $game_release_date ) : ?>
                <span class="shinka__post-game-text-content"><?php echo esc_html( $game_release_date ); ?></span>
                <?php elseif ( $game_temp_date ): ?>
                <span class="shinka__post-game-text-content"><?php echo esc_html( $game_temp_date ); ?></span>
                <?php else: ?>
                <span class="shinka__post-game-text-content">Da determinare</span>
                <?php endif; ?>
            </div>
            <?php if ( $game_platforms ) : ?>
            <div class="shinka__post-game-platforms shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Piattaforme: </span>
                <span class="shinka__post-game-text-content">
                <?php
                    $platforms_string = implode( ', ', $game_platforms );
                    echo esc_html( $platforms_string );
                ?>
                </span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
