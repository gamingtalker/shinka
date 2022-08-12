(function( $ ) {
    "use strict";
    $(document).ready(function() {
        var isMenuOpen = false;
        var isSearchOpen = false;
        // Magnific Popup.
        $(".post-img-link, .game-cover-img").magnificPopup({
            type: "image"
        });
        $(".gallery, .gallery-game").each(function() {
            $(this).magnificPopup({
                delegate: "a",
                gallery: {
                    enabled: true,
                    tCounter: "<span class='mfp-counter'>%curr% di %total%</span>"
                },
                type: "image"
            });
        });
        // Header events handler.
        $(".shinka-header__menu-icon").click( function() {
            if(!isMenuOpen) {
                $("#header-menu").show();
                isMenuOpen = true;
            }
            else {
                $("#header-menu").hide();
                isMenuOpen = false;
            }
        });
        $(".shinka-header__search-icon").click( function() {
            if(!isSearchOpen) {
                $("#search-bar").show();
                isSearchOpen = true;
            }
            else {
                $("#search-bar").hide();
                isSearchOpen = false;
            }
        });
        $(".menu-item-has-children").click( function() {
            $(".sub-menu").toggle();
        });
        $(document).on("click", function(event) {
            if (!$(event.target).closest("#header-menu, .shinka-header__menu-icon").length && isMenuOpen) {
                $("#header-menu").hide();
                isMenuOpen = false;
            }
            if (!$(event.target).closest("#search-bar, .shinka-header__search-icon").length && isSearchOpen) {
                $("#search-bar").hide();
                isSearchOpen = false;
            }
        });
        // Post share.
        var postURL = encodeURIComponent(document.URL);
        var postTitle = document.getElementsByClassName("shinka-post__title")[0].innerText;
        console.log("Social message: " + postTitle + " - " + postURL);
        $(".shinka-post__sns-btn-facebook").on("click", function() {
            const url = "https://www.facebook.com/sharer.php?u=" + postURL + "?utm_source=facebook%26utm_medium=social%26utm_campaign=social_share";
            window.open(url, "_blank");
        });
        $(".shinka-post__sns-btn-twitter").on("click", function() {
            const url = "https://twitter.com/intent/tweet?url=" + postURL + "?utm_source=twitter%26utm_medium=social%26utm_campaign=social_share" + "&text=" + postTitle + "&via=gamingtalker";
            window.open(url, "_blank");
        });
        $(".shinka-post__sns-btn-whatsapp").on("click", function() {
            const url = "https://api.whatsapp.com/send?text=" + postTitle + " - " + postURL + "?utm_source=whatsapp%26utm_medium=social%26utm_campaign=social_share";
            window.open(url, "_blank");
        });
        $(".shinka-post__sns-btn-telegram").on("click", function() {
            const url = "https://t.me/share/url?url=" + postURL + "?utm_source=telegram%26utm_medium=social%26utm_campaign=social_share" + "&text=" + postTitle;
            window.open(url, "_blank");
        });
    });
})( jQuery );
