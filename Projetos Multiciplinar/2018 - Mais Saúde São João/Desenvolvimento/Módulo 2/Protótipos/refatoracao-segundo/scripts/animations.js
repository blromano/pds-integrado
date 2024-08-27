$(document).ready(function() {
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
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
                    }
                });
            }
        }
    });

    var active_one = null;
    function updateActive() {
        $('li.nav-item').each(function() {
            // detecta qual esta ativo
            // console.log($(this));
            if($(this).hasClass('active')) {
                // console.log("Active: " + $(this).children('a.nav-link').attr('href'));
                active_one = $(this);
            }
        });
    }
    updateActive();

    function turnActive(obj) {

        if(!$(obj).hasClass('border-left')) {
            $(obj).addClass('active border-bottom border-danger');
            if(active_one != null)
                active_one.removeClass('active border-bottom border-danger');
            active_one = obj;
        }
    }

    var sections = $('section');

    function verifyScrollArea() {
        var scrollY = $('html, body').scrollTop();
        // console.log(scrollY);

        var actual = "intro";
        sections.each(function() {
            // console.log($(this).attr('id') + ": " + $(this).offset().top);
            if($(this).offset().top < scrollY + $(window).height()/3) actual = $(this).attr('id');
        });
        // console.log(actual);

        $('li.nav-item').each(function() {
            if($(this).children('a.nav-link').attr('href') == '#'+actual) {
                if($(this).children('a.nav-link').attr('href') != active_one.children('a.nav-link').attr('href')) {
                    turnActive($(this));
                    // console.log("Active one: " + active_one.children('a.nav-link').attr('href'))
                } else {
                    // console.log("its the same!");
                }
            }
        });
    }

    $(document).scroll(function() {
        verifyScrollArea();
    });

    $('li.nav-item').click(function() {
        turnActive($(this));
        //verifyScrollArea();
    });
    
    $('ul.active-hover li.nav-item').hover(function() {
        turnActive($(this));
    });

});
