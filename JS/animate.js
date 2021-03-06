var jq = jQuery.noConflict();

jq(document).ready(function () {
    "use strict";

    var owl = jq("#owl-example");

    owl.owlCarousel({
        navigation: true,
        pagination: false,
        autoPlay: 2500,
        stopOnHover: true,
        items: 10, //10 items above 1000px browser width
        itemsDesktop: [1199, 6], //6 items between 1000px and 901px
		itemsDesktopSmall: [900, 4], // betweem 900px and 601px
		itemsMobile: [600, 3], //2 items between 600 and 0
		itemsTablet: [600, 3], //2 items between 600 and 0
        /*touchDrag: false,*/
        
    });

    var owl = jq("#owl-hello");

    owl.owlCarousel({
        navigation: true,
        pagination: false,
        autoPlay: 2000,
        stopOnHover: true,
        items: 10, //10 items above 1000px browser width
        itemsDesktop: [1199, 6], //6 items between 1000px and 901px
		itemsDesktopSmall: [900, 4], // betweem 900px and 601px
		itemsMobile:  [ 600, 3], //3 items between 600 and 0
		itemsTablet: [600, 3], //3 items between 600 and 0.
        /*touchDrag: false,*/
        
    });
});