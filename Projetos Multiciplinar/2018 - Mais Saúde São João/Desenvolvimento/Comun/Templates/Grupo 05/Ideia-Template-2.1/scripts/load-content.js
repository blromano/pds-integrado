var publishPhrases = [
    "Como foi seu dia hoje?",
    "Como vão os exercícios?",
    "Anda se alimentando bem?",
    "Conte como foi seu dia hoje.",
    "Mostre o que você esta comendo.",
    "Como vai sua rotina?",
    "Desabafe um pouco!"
];

$(document).ready(function() {
    AOS.init({
        duration: 1200,
    });

    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
            && 
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });
    
    $("textarea#publish-textarea").attr("placeholder", publishPhrases[Math.round(Math.random() * publishPhrases.length)]);
});