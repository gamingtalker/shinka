(function( $ ) {
    'use strict';
    $(document).ready(function() {
        // Get elements.
        const menu = document.getElementById("header-menu");
        // Call Magnific Popup.
        $('.post-img-link, .game-cover-img').magnificPopup({
            type: 'image'
        });
        $('.gallery, .gallery-game').each(function() {
            $(this).magnificPopup({
                delegate: 'a',
                gallery: {
                    enabled: true,
                    tCounter: '<span class="mfp-counter">%curr% di %total%</span>'
                },
                type: 'image'
            });
        });
        // Header mobile menu handler.
        $(".shinka-header__menu-icon").click( function() {
            var menuStyle = getComputedStyle(menu);
            const menuDisplay = menuStyle.display;
            if (menuDisplay === "none") {
                menu.style.display = "block";
                console.log("Header menu visible!");
            } else {
                menu.style.display = "none";
                console.log("Header menu hidden!");
            }
        });
        var postURL = encodeURIComponent(document.URL);
        var postTitle = document.getElementsByClassName("shinka-post__title")[0].innerText;
        console.log(postURL + " " + postTitle);
        $(".shinka-post__sns-btn-facebook").on("click", function() {
            const url = "https://www.facebook.com/sharer.php?u=" + postURL;
            window.open(url, '_blank');
        });
        $(".shinka-post__sns-btn-twitter").on("click", function() {
            const url = "https://twitter.com/intent/tweet?url=" + postURL + "&text=" + postTitle + "&via=gamingtalker";
            window.open(url, '_blank');
        });
        $(".shinka-post__sns-btn-whatsapp").on("click", function() {
            const url = "https://api.whatsapp.com/send?text=" + postTitle + " - " + postURL;
            window.open(url, '_blank');
        });
        $(".shinka-post__sns-btn-telegram").on("click", function() {
            const url = "https://t.me/share/url?url=" + postURL + "&text=" + postTitle;
            window.open(url, '_blank');
        });
    });
})( jQuery );
