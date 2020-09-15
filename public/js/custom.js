"use strict";

window.addEventListener('load', function() {
//------------------------------------------------------------------------
//						NAVBAR SLIDE SCRIPT
//------------------------------------------------------------------------
    $(window).scroll(function () {
        if ($(window).scrollTop() > $("nav").height()) {
            $("nav.navbar").addClass("show-menu");
        } else {
            $("nav.navbar").removeClass("show-menu");
            $("nav.navbar .navMenuCollapse").collapse({
                toggle: false
            });
            $("nav.navbar .navMenuCollapse").collapse("hide");
        }
    });

});
window.addEventListener('load', function() {
    $('a.smooth').smoothScroll({speed: 800});
});