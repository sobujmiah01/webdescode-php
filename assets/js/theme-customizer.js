(function($) {
    wp.customize('header_background_color', function(value) {
        value.bind(function(newval) {
            $('header').css('background-color', newval);
        });
    });
})(jQuery);