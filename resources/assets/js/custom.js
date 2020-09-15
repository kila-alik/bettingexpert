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

    $('.gallery').each(function () { // the containers for all your galleries
        var $this = $(this);
        $this.magnificPopup({
            delegate: 'a.gallery-box:not(.external)', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            image: {
                titleSrc: function (item) {
                    return item.el.find('span.caption').text();
                }
            },
            callbacks: {
                open: function() {
                    $this.trigger('stop.owl.autoplay');
                },
                close: function() {
                    $this.trigger('play.owl.autoplay');
                }
            }
        });
    });

    let date = $('#clock').attr('data-date');
    $('#clock').countdown(date, function(event) {
        var totalHours = event.offset.totalDays * 24 + event.offset.hours;
        $(this).html(event.strftime(
            ''
            + '<span>%w</span> недель '
            + '<span>%d</span> дней '
            + '<span>%H</span> час '
            + '<span>%M</span> мин '
            + '<span>%S</span> сек'
        ));
    });

});
window.addEventListener('load', function() {
    $('a.smooth').smoothScroll({speed: 800});
});