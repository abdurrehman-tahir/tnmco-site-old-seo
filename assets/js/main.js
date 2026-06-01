/**
 * Template Name: Rapid - v2.3.1
 * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function($) {
    "use strict";


    // Preloader (if the #preloader div exists)
    $(window).on('load', function() {
        if ($('#preloader').length) {
            $('#preloader').delay(100).fadeOut('slow', function() {
                $(this).remove();
            });
        }
    });

    // Back to top button click handler
    $('.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });

    // Initial state on load
    var initialScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (initialScrollTop > 100) {
        $('#header').addClass('header-scrolled');
        $('#topbar').addClass('topbar-scrolled');
    }

    // Smooth scroll for the navigation and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 50;
    $(document).on('click', '#mobilemenu a, .scrollto', function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('#mobilemenu').length) {
                    $('#mobilemenu .active, #mobilemenu .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function() {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('#mobilemenu, .mobile-nav');
    var main_nav_height = $('#header').outerHeight();

    // Unified, passive scroll listener for high performance (prevents scroll-blocking)
    window.addEventListener('scroll', function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Back to top button visibility
        if (scrollTop > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }

        // Header scroll class
        if (scrollTop > 100) {
            $('#header').addClass('header-scrolled');
            $('#topbar').addClass('topbar-scrolled ');
        } else {
            $('#header').removeClass('header-scrolled');
            $('#topbar').removeClass('topbar-scrolled ');
        }

        // Navigation active state on scroll
        var cur_pos = scrollTop + 200;
        nav_sections.each(function() {
            var top = $(this).offset().top - main_nav_height,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                main_nav.find('li').removeClass('active');
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }

            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first").addClass('active');
            }
        });
    }, { passive: true });

    // jQuery counterUp (used in Whu Us section)
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

    // Porfolio isotope and filter
    $(window).on('load', function() {
        var portfolioIsotope = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-item'
        });
        $('#portfolio-flters li').on('click', function() {
            $("#portfolio-flters li").removeClass('filter-active');
            $(this).addClass('filter-active');

            portfolioIsotope.isotope({
                filter: $(this).data('filter')
            });
            aos_init();
        });
    });

    // Initiate venobox (lightbox feature used in portofilo)
    $(document).ready(function() {
        $('.venobox').venobox({
            'share': false
        });
    });

    $(".team-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            },
            900: {
                items: 4
            }
        }
    });

    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            900: {
                items: 1
            }
        }
    });

    // Clients carousel (uses the Owl Carousel library)
    $(".clients-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 4
            },
            900: {
                items: 6
            }
        }
    });

    // Portfolio details carousel
    $(".portfolio-details-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1
    });

    // Init AOS
    function aos_init() {
        AOS.init({
            duration: 1000,
            once: true
        });
    }
    $(window).on('load', function() {
        aos_init();
    });




    // values to keep track of the number of letters typed, which quote to use. etc. Don't change these values.
    var i = 0,
        a = 0,
        isBackspacing = false,
        isParagraph = false;

    // Typerwrite text content. Use a pipe to indicate the start of the second line "|".  
    var textArray = [
        "All In One Place!",
        "BlockChain Ledger!",
        "E-Commerce!",
        "Moblie App Development!",
        "Machine Learning!"
    ];

    // Speed (in milliseconds) of typing.
    var speedForward = 100, //Typing Speed
        speedWait = 1000, // Wait between typing and backspacing
        speedBetweenLines = 1000, //Wait between first and second lines
        speedBackspace = 25; //Backspace Speed

    //Run the loop
    // Clear the static SEO fallback text before the typewriter starts animating
    $("#output").children("h1").text("");
    typeWriter("output", textArray);

    function typeWriter(id, ar) {
        var element = $("#" + id),
            aString = ar[a],
            eHeader = element.children("h1")
        if (!isBackspacing) {
            if (i < aString.length) {

                if (aString.charAt(i) == "|") {
                    isParagraph = true;
                    eHeader.removeClass("cursor");
                    i++;
                    setTimeout(function() { typeWriter(id, ar); }, speedBetweenLines);
                } else {
                    if (!isParagraph) {
                        eHeader.text(eHeader.text() + aString.charAt(i));
                    }
                    i++;
                    setTimeout(function() { typeWriter(id, ar); }, speedForward);
                }

                // If full string has been typed, switch to backspace mode.
            } else if (i == aString.length) {

                isBackspacing = true;
                setTimeout(function() { typeWriter(id, ar); }, speedWait);

            }

        } else {

            if (eHeader.text().length > 0) {

                if (eHeader.text().length > 0) {
                    eHeader.addClass("cursor");
                    eHeader.text(eHeader.text().substring(0, eHeader.text().length - 1));
                }
                setTimeout(function() { typeWriter(id, ar); }, speedBackspace);

            } else {

                isBackspacing = false;
                i = 0;
                isParagraph = false;
                a = (a + 1) % ar.length;
                setTimeout(function() { typeWriter(id, ar); }, 50);

            }
        }
    }




})(jQuery);