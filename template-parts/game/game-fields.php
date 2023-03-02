<?php 
    $game_developers = $args['game_developers'];
    $game_publishers = $args['game_publishers'];
    $game_release_date = $args['game_release_date'];
    $game_temp_date = $args['game_temp_date'];
    $game_platforms = $args['game_platforms'];
    $game_original_title = $args['game_original_title'];
    $game_rating = $args['game_rating'];
    $game_languages = $args['game_languages'];
    $game_deck_compatibility = $args['game_deck_compatibility'];
<<<<<<< HEAD
    $game_dev_array = array();
    $game_publisher_array = array();
=======
>>>>>>> 479b35bd9a35899ed92fab36c2cc426696c0c154
?>
<!-- Game details -->
<div class="shinka-game__info">
    <h3>Informazioni</h3>
    <div class="shinka-game__info-table">
        <?php if ( $game_developers ) : ?>
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Sviluppatore</span>
<<<<<<< HEAD
            <span class="shinka-game__info-detail">
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
=======
            <?php
                foreach ( $game_developers as $game_developer ) :
                    $developer_permalink = get_permalink( $game_developer->ID );
                    $developer_name = get_the_title( $game_developer->ID );
            ?>
            <span class="shinka-game__info-detail">
                <a href="<?php echo esc_url( $developer_permalink ); ?>"><?php echo esc_html( $developer_name ); ?></a>
            </span>
            <?php endforeach; ?>
>>>>>>> 479b35bd9a35899ed92fab36c2cc426696c0c154
        </div>
        <?php 
            endif;
            if ( $game_publishers ) :
        ?> 
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Publisher</span>
<<<<<<< HEAD
            <span class="shinka-game__info-detail">
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
=======
            <?php
                foreach ( $game_publishers as $game_publisher ) :
                    $publisher_permalink = get_permalink( $game_publisher->ID );
                    $publisher_name = get_the_title( $game_publisher->ID );
            ?>
            <span class="shinka-game__info-detail">
                <a href="<?php echo esc_url( $publisher_permalink ); ?>"><?php echo esc_html( $publisher_name ); ?></a>
            </span>
            <?php endforeach; ?>
>>>>>>> 479b35bd9a35899ed92fab36c2cc426696c0c154
        </div>
        <?php endif; ?>
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Data di uscita</span>
            <?php if ( $game_release_date ) : ?>
            <span class="shinka-game__info-detail"><?php echo esc_html( $game_release_date ); ?></span>
            <?php elseif ( $game_temp_date ): ?>
            <span class="shinka-game__info-detail"><?php echo esc_html( $game_temp_date ); ?></span>
            <?php else: ?>
            <span class="shinka-game__info-detail">Da determinare</span>
            <?php endif; ?>
        </div>
        <?php if ( $game_platforms ) : ?>
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Piattaforme</span>
            <span class="shinka-game__info-detail">
            <?php 
                $platforms_string = implode( ', ', $game_platforms );
                echo esc_html( $platforms_string ); 
            ?>
            </span>
        </div>
        <?php 
            endif; 
            if ( $game_original_title ) :
        ?>
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Titolo originale</span>
            <span class="shinka-game__info-detail"><?php echo esc_html( $game_original_title ); ?></span>
        </div>
        <?php 
            endif;
            if ( $game_rating ) :
        ?> 
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">PEGI</span>
            <span class="shinka-game__info-detail"><?php echo esc_html( $game_rating ); ?></span>
        </div>
        <?php 
            endif;
            if ( $game_languages ) :
        ?>
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Lingue</span>
            <span class="shinka-game__info-detail"><?php echo esc_html( $game_languages ); ?></span>
        </div>
        <?php 
            endif;
            if ( $game_deck_compatibility ) :
        ?>
        <div class="shinka-game__info-content">
            <span class="shinka-game__info-bold">Compatibilità Steam Deck</span>
            <span class="shinka-game__info-detail"><?php echo esc_html( $game_deck_compatibility ); ?></span>
        </div>
        <?php endif; ?>
    </div>
</div>
