jQuery(document).ready(function () {
    jQuery('.owl-carousel-kaizen-list').owlCarousel({
        stagePadding: 0,
        items: 1,
        loop: true,
        margin: 0,
        singleItem: true,
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
});