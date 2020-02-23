"use strict";

initPageloader();
$(document).ready(function () {
    feather.replace();
    initNavbar();
    scroll_if_anchor(window.location.hash);
    $("body a").on("click", function () {
        var href = $(this).attr('href');

        if (href !== undefined) {
            scroll_if_anchor(href);
        }
    });
    initBackgroundImages();
    initWizard();
    initImagesGrid();
    initReveals();
    initBackToTop();
});
