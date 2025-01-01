jQuery(document).ready(function($) {
    $(".fa-bars").hide();
    $(".fa-xmark").hide();

    function toggleNavigation() {
        $(".fa-bars, .fa-xmark").toggle();
        $(".main_navigation").toggle(200);
    }

    function updateUI() {
        const isMobile = window.matchMedia("(max-width: 935px)").matches;
        if (isMobile) {
            $(".main_navigation").hide();
            $(".fa-bars").show();
        } else {
            $(".main_navigation").show();
            $(".fa-bars, .fa-xmark").hide();
        }
    }

    updateUI(); // Initial UI setup

    $(document).on("click", ".fa-bars, .fa-xmark", function() {
        toggleNavigation();
    });

    let resizeTimer;
    jQuery(window).on("resize orientationchange", function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateUI, 200); // Debounced resize handler
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const codeBlocks = document.querySelectorAll('.preformatted-text.line-numbers');

    codeBlocks.forEach(codeBlock => {
        // Add event listener to the pseudo-element
        codeBlock.addEventListener('click', () => {
            const textArea = document.createElement("textarea");
            textArea.value = codeBlock.innerText.trim(); // Use innerText for formatted content
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            // Visual feedback for copy action
            codeBlock.classList.add('copied');
            setTimeout(() => {
                codeBlock.classList.remove('copied');
            }, 4000);
        });
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
jQuery(document).ready(function ($) {
    $('#commentform').on('submit', function (e) {
        let valid = true;
        const nameField = $('#author');
        const emailField = $('#email');
        const commentField = $('#comment');

        // Reset placeholders
        nameField.attr('placeholder', 'Name');
        emailField.attr('placeholder', 'Email');
        commentField.attr('placeholder', 'Comment');

        // Validate Name
        if (nameField.val().trim() === '') {
            nameField.val(''); // Clear current value
            nameField.attr('placeholder', 'Enter your name');
            valid = false;
        }

        // Validate Email
        const emailValue = emailField.val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex
        if (emailValue === '') {
            emailField.val(''); // Clear current value
            emailField.attr('placeholder', 'Enter your email');
            valid = false;
        } else if (!emailRegex.test(emailValue)) {
            emailField.val(''); // Clear current value
            emailField.attr('placeholder', 'Enter a valid email');
            valid = false;
        }

        // Validate Comment
        if (commentField.val().trim() === '') {
            commentField.val(''); // Clear current value
            commentField.attr('placeholder', 'Comment cannot be empty');
            valid = false;
        }

        // Prevent form submission if invalid
        if (!valid) {
            e.preventDefault();
        }
    });
});



