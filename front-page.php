<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>
<div id="main-content" class="shinka-page">
    <div class="shinka-wrapper">
        <div class="shinka-home__main-news">
            <article class="shinka-home__main-story shinka-home__top-news">
                <a href="#">
                    <picture class="shinka-home__main-thumb">
                        <img class="shinka-home__news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/08/Battlefield_2042_KIN_Portal_Screenshot_01_BattleOfTheBulge_36533960f60d71d91763.jpg">
                    </picture>
                </a>
                <div class="shinka-home__news-text">
                    <div class="shinka-home__news-category">
                        <p>Notizia</p>
                    </div>
                    <a href="#">
                        <h2 class="shinka-home__news-title shinka-home__news-title-big">Testo test</h2>
                    </a>
                </div>
            </article>
            <div class="shinka-home__sec-story-group">
                <article class="shinka-home__sec-story shinka-home__top-news">
                    <a href="#">
                        <picture class="shinka-home__main-thumb">
                            <img class="shinka-home__news-image" src="https://www.gamingtalker.it/wp-content/uploads/2019/07/games-with-gold-img01.jpg">
                        </picture>
                    </a>
                    <div class="shinka-home__news-text">
                        <div class="shinka-home__news-category">
                            <p>Notizia</p>
                        </div>
                        <a href="#">
                            <h2 class="shinka-home__news-title shinka-home__news-title-small">Testo test</h2>
                        </a>
                    </div>
                </article>
                <article class="shinka-home__sec-story shinka-home__top-news">
                    <a href="#">
                        <picture class="shinka-home__main-thumb">
                            <img class="shinka-home__news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/NBA-2K23-Michael-Jordan-Edition-Wide.jpg">
                        </picture>
                    </a>
                    <div class="shinka-home__news-text">
                        <div class="shinka-home__news-category">
                            <p>Notizia</p>
                        </div>
                        <a href="#">
                            <h2 class="shinka-home__news-title shinka-home__news-title-small">Testo test</h2>
                        </a>
                    </div>
                </article>
            </div>
        </div>
        <div class="shinka-home__hot-news-container">
            <div class="shinka-home__hot-news">
                <div class="shinka-home__hot-news-content">
                    <a href="#">
                        <img class="shinka-home__hot-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                    </a>
                    <div class="shinka-home__hot-news-text">
                        <a href="#">
                            <h3 class="shinka-home__hot-news-title">Test</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="shinka-home__hot-news">
                <div class="shinka-home__hot-news-content">
                    <a href="#">
                        <img class="shinka-home__hot-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                    </a>
                    <div class="shinka-home__hot-news-text">
                        <a href="#">
                            <h3 class="shinka-home__hot-news-title">Test</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="shinka-home__hot-news">
                <div class="shinka-home__hot-news-content">
                    <a href="#">
                        <img class="shinka-home__hot-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                    </a>
                    <div class="shinka-home__hot-news-text">
                        <a href="#">
                            <h3 class="shinka-home__hot-news-title">Test</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="shinka-home__hot-news">
                <div class="shinka-home__hot-news-content">
                    <a href="#">
                        <img class="shinka-home__hot-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                    </a>
                    <div class="shinka-home__hot-news-text">
                        <a href="#">
                            <h3 class="shinka-home__hot-news-title">Test</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="shinka-home__title">Ultime notizie</h1>
        <div class="shinka-archive__timeline-container">
            <div class="shinka-archive__timeline-content">
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
            </div>
            <div class="shinka-archive__sidebar">
                <h2>Test</h2>
            </div>
        </div>
        <div class="shinka-timeline__extra">
            <div class="shinka-timeline__extra-content">
                <div class="shinka-timeline__extra-heading">
                    <h2 class="shinka-timeline__extra-heading-title">Video</h2>
                    <a href="#" class="shinka-timeline__extra-heading-link">Tutti i video ></a>
                </div>
                <div class="shinka-timeline__extra-news-wrapper">
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shinka-archive__timeline-container shinka-archive__timeline-container-secondary">
            <div class="shinka-archive__timeline-content">
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
            </div>
            <div class="shinka-archive__sidebar">
                <h2>Test</h2>
            </div>
        </div>
        <div class="shinka-timeline__extra">
            <div class="shinka-timeline__extra-content">
                <div class="shinka-timeline__extra-heading">
                    <h2 class="shinka-timeline__extra-heading-title">Evento / Gioco</h2>
                    <a href="#" class="shinka-timeline__extra-heading-link">Tutte le notizie su EVENTO / GIOCO ></a>
                </div>
                <div class="shinka-timeline__extra-news-wrapper">
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                    <div class="shinka-timeline__extra-news">
                        <a href="#">
                            <img class="shinka-timeline__extra-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2021/06/inscryption-img01.jpg">
                        </a>
                        <div class="shinka-timeline__extra-news-text">
                            <a href="#">
                                <h3 class="shinka-timeline__extra-news-title">Test</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shinka-archive__timeline-container shinka-archive__timeline-container-secondary">
            <div class="shinka-archive__timeline-content">
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
                <div class="shinka-archive__timeline-news">
                    <div class="shinka-archive__timeline-news-media">
                        <a href="#">
                            <img class="shinka-archive__timeline-news-image" src="https://www.gamingtalker.it/wp-content/uploads/2022/07/The_Division_Resurgence_Marketing_Key-Art_Logoless.jpg">
                        </a>
                    </div>
                    <div class="shinka-archive__timeline-news-text">
                        <p class="shinka-archive__timeline-news-category shinka-archive__timeline-news-metadata">Notizia</p>
                        <h2 class="shinka-archive__timeline-news-title">
                            <a href="#">Test</a>
                        </h2>
                        <p class="shinka-archive__timeline-news-date shinka-archive__timeline-news-metadata">TK:TK, TK/TK/TKTK</p>
                        <p class="shinka-archive__timeline-news-excerpt shinka-archive__timeline-news-metadata">Notizia</p>
                    </div>
                </div>
            </div>
            <div class="shinka-archive__sidebar">
                <h2>Test</h2>
            </div>
        </div>
        <div class="shinka-archive__load-more-button">
            <a href="#" class="shinka-archive__load-more-link">Altre notizie</a>
        </div>
    </div>
</div>

<?php
get_footer();
