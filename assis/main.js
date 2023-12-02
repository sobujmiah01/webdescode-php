jQuery(document).ready(function($) {
    $(".fa-bars").hide();
    $(".fa-times").hide();
    
    function toggleNavigation() {
        $('.fa-bars, .fa-times').toggle();
        $(".main_navigation").toggle(200);
    }

    function updateUI() {
        if (jQuery(window).width() <= 935) {
            $(".main_navigation").hide();
            $(".fa-bars").show();
        } else {
            $(".main_navigation").show();
            $(".fa-bars, .fa-times").hide();
        }
    }

    updateUI(); // Initial UI setup

    $(document).on('click', '.fa-bars', function() {
        toggleNavigation();
    });

    $(document).on('click', '.fa-times', function() {
        $(".fa-bars").show();
        $(".fa-times").hide();
        $(".main_navigation").hide(200);
    });

    jQuery(window).on('resize orientationchange', function() {
        updateUI(); // Update UI on window resize or orientation change
    });
});
