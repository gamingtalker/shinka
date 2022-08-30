<?php 
    $game_cover = $args['game_cover'];
    $game_title = $args['game_title'];
    $game_genres = $args['game_genres'];
?>
<!-- Game main info -->
<div class="shinka-game__main-info">
    <?php if ( $game_cover ) : ?>
    <div class="shinka-game__cover">
        <a href="<?php echo esc_url( $game_cover['url'] ); ?>" class="shinka-game__cover-link post-img-link">
            <img class="shinka-game__cover-image" src="<?php echo esc_url( $game_cover['sizes']['medium_large'] ); ?>" alt="<?php echo esc_html( $game_title ); ?>">
        </a>
    </div>
    <?php endif; ?>
    <div class="shinka-game__heading">
        <h1 class="shinka-game__title"><?php echo esc_html( $game_title ); ?></h1>
        <?php if ( $game_genres ) : ?>
        <div class="shinka-game__genres">
            <?php foreach( $game_genres as $game_genre ) : ?>
            <span class="shinka-game__genre-text"><?php echo esc_html( $game_genre ); ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
