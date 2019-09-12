(function($){
    "use strict";
    function benko_isotope(){
        var $grid =$('.affect-isotope').isotope({
            masonry: {
                columnWidth:'.col-item'
            },
            transitionDuration: '0.4s',
            fitWidth: true,
        });
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
    }

    jQuery(document).ready(function($) {
        $('.lazy').lazy({
            effect: "fadeIn",
            effectTime: 400,
            threshold: 0,
        });
        benko_isotope();
    });

    jQuery(window).on( 'resize', function() {
        benko_isotope();
    }).resize();

    jQuery(window).load(function(){
        $('.lazy').lazy({
            effect: "fadeIn",
            effectTime: 400,
            threshold: 0,
        });
        benko_isotope();
    });
})(jQuery);


