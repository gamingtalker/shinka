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
?>
<h3 class="shinka__in-post-title">In questo articolo</h3>
<div class="shinka__post-game">
    <div class="shinka__post-game-wrapper">
        <?php if ( $game_cover ) : ?>
        <div class="shinka__post-game-cover">
            <a href="<?php echo esc_url( $game_permalink ); ?>">
                <img class="shinka__post-game-cover-img" src="<?php echo esc_url( $game_cover['sizes']['medium'] ); ?>" alt="<?php echo esc_html( $game_title ); ?>">
            </a>
        </div>
        <?php endif; ?>
        <div class="shinka__post-game-heading">
            <a href="<?php echo esc_url( $game_permalink ); ?>">
                <h3 class="shinka__post-game-title"><?php echo esc_html( $game_title ); ?></h3>
            </a>
            <p class="shinka__post-game-summary"><?php echo esc_html( $game_summary ); ?></p>
        </div>
        <div class="shinka__post-game-details">
            <?php if ( $game_developers ) : ?>
            <div class="shinka__post-game-developer shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Sviluppatore: </span>
                <span class="shinka__post-game-text-content">
                <?php foreach ( $game_developers as $game_developer ) :
                    $developer_permalink = get_permalink( $game_developer->ID );
                    $developer_name = get_the_title( $game_developer->ID ); ?>
                    <a href="<?php echo esc_url( $developer_permalink ); ?>"><?php echo esc_html( $developer_name ); ?></a>
                    <?php endforeach; ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if ( $game_publishers ) : ?>
            <div class="shinka__post-game-publisher shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Publisher: </span>
                <span class="shinka__post-game-text-content">
                <?php foreach ( $game_publishers as $game_publisher ) :
                    $publisher_permalink = get_permalink( $game_publisher->ID );
                    $publisher_name = get_the_title( $game_publisher->ID ); ?>
                    <a href="<?php echo esc_url( $publisher_permalink ); ?>"><?php echo esc_html( $publisher_name ); ?></a>
                    <?php endforeach; ?>
                </span>
            </div>
            <?php endif; ?>
            <?php if ( $game_release_date ) : ?>
            <div class="shinka__post-game-release-date shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Data di uscita: </span><span class="shinka__post-game-text-content"><?php echo esc_html( $game_release_date ); ?></span>
            </div>
            <?php else: ?>
            <div class="shinka__post-game-release-date shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Data di uscita: </span><span class="shinka__post-game-text-content">Da determinare</span>
            </div>
            <?php endif; ?>
            <?php if ( $game_platforms ) : ?>
            <div class="shinka__post-game-platforms shinka__post-game-text">
                <span class="shinka__post-game-text-bold">Piattaforme: </span>
                <span class="shinka__post-game-text-content">
                <?php $platforms_string = implode( ', ', $game_platforms );
                    echo $platforms_string; 
                ?>
                </span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
