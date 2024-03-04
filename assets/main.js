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
document.addEventListener('DOMContentLoaded', function () {
    var preformattedTextList = document.querySelectorAll('.preformatted-text');

    preformattedTextList.forEach(function (preformattedText) {
        var copyButton = document.createElement('button');
        copyButton.textContent = 'Copy Text';
        copyButton.className = 'copy-button';
        copyButton.addEventListener('click', function () {
            var textArea = document.createElement("textarea");
            textArea.value = preformattedText.textContent;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Text copied to clipboard!');
        });

        preformattedText.insertAdjacentElement('beforebegin', copyButton);
    });
});
jQuery(document).ready(function($) {
    $(".fas.fa-search").hide();
    function searchRes() {
        $(".search_aria").toggle(200);
    }

    function updateUI() {
        if (jQuery(window).width() <= 550) {
            /* $("search_aria").hide(); */
            $(".fas.fa-search").show();
        } else {
            $(".search_aria").show();
            $(".fas.fa-search").hide();
        }
    }

    updateUI(); // Initial UI setup

    $(document).on('click', '.fas.fa-search', function() {
        searchRes();
    });

    $(document).on('click', '.fas.fa-search', function() {
        $(".search_aria").show();
        /* $(".main_navigation").hide(200); */
    });

    jQuery(window).on('resize orientationchange', function() {
        updateUI(); // Update UI on window resize or orientation change
    });
});
