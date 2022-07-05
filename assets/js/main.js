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
    });
})( jQuery );
