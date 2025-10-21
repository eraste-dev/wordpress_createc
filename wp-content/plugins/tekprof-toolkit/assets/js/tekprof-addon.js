; (function ($) {
    "use strict";

    var WidgetDefaultHandler = function ($scope) {

        // ## Video Popup
        if ($scope.find('.video-play').length) {
            $('.video-play').magnificPopup({
                type: 'video',
            });
        }

        // ## Video Popup
        if ($('.video-play').length) {
            $('.video-play').magnificPopup({
                type: 'video',
            });
        }

        // ## Video Popup With Text
        if ($('.video-play-text').length) {
            $('.video-play-text').magnificPopup({
                type: 'video',
            });
        }

        // ## Main Slider
        if ($scope.find('.main-slider-active').length) {
            $('.main-slider-active').slick({
                infinite: true,
                arrows: true,
                dots: false,
                fade: true,
                autoplay: true,
                prevArrow: '<button class="prev-arrow"><i class="fal fa-angle-left"></i></button>',
                nextArrow: '<button class="next-arrow"><i class="fal fa-angle-right"></i></button>',
                autoplaySpeed: 5000,
                pauseOnHover: false,
                slidesToScroll: 1,
                slidesToShow: 1,
            });
        }

        // ## Client Logo Slider
        if ($scope.find('.client-logo-active').length) {
            $('.client-logo-active').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: false,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });
        }

        // ## Testimonial Slider
        if ($scope.find('.testimonials-active').length) {
            $('.testimonials-active').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                prevArrow: '.testi-arrow-left',
                nextArrow: '.testi-arrow-right',
                responsive: [
                    {
                        breakpoint: 990,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }

        // ## Testimonial Two Slider
        if ($scope.find('.testimonials-two-active').length) {
            $('.testimonials-two-active').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                prevArrow: '.testi-arrow-left',
                nextArrow: '.testi-arrow-right'
            });
        }

        // ## Testimonial Three Slider
        if ($scope.find('.testimonials-three-active').length) {
            $('.testimonials-three-active').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                speed: 400,
                arrows: true,
                dots: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                prevArrow: '.testi-arrow-left',
                nextArrow: '.testi-arrow-right'
            });
        }


        // ## Testimonials Four Carousel
        if ($scope.find('.testimonials-four-active').length) {
            $('.testimonials-four-active').slick({
                infinite: true,
                speed: 400,
                arrows: false,
                dots: true,
                appendDots: '.testimonial-dots',
                focusOnSelect: true,
                autoplay: true,
                autoplaySpeed: 5000,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        }


        // ## Testimonial Five
        if ($scope.find('.testimonial-five-slider').length) {
            $('.testimonial-five-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                speed: 400,
                arrows: false,
                dots: true,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
            });
        }

        // ## Testimonial Six Slider
        if ($scope.find('.testimonials-six-active').length) {
            $scope.find('.testimonials-six-active').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    speed: 400,
                    arrows: false,
                    dots: true,
                    focusOnSelect: true,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    responsive: [
                        {
                            breakpoint: 990,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                });
            }

        // ## Marquee Right Slider
        if ($scope.find('.marquee-slider-right').length) {
            $('.marquee-slider-right').slick({
                speed: 8000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: true,
                cssEase: 'linear',
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: false,
            });
        }


        // ## Marquee Left Slider
        if ($scope.find('.marquee-slider-left').length) {
            $('.marquee-slider-left').slick({
                speed: 8000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: true,
                cssEase: 'linear',
                slidesToShow: 1,
                slidesToScroll: -1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: true,
                rtl: true,
            });
        }



        // ## Working Process Two Slider
        const $wsSlider = $scope.find(".working-process-two-active");
        $wsSlider
            .on('init', () => {
                mouseWheel($wsSlider)
            })
            .slick({
                dots: false,
                vertical: true,
                arrows: false,
                infinite: false,
                slidesToShow: 3
            })
        function mouseWheel($wsSlider) {
            $(window).on('wheel', { $wsSlider: $wsSlider }, mouseWheelHandler)
        }
        function mouseWheelHandler(event) {
            event.preventDefault()
            const $wsSlider = event.data.$wsSlider
            const delta = event.originalEvent.deltaY
            if (delta > 0) {
                $wsSlider.slick('slickNext')
            }
            else {
                $wsSlider.slick('slickPrev')
            }
        }


        // ## Blog Three Slider
        const $blogSlider = $scope.find(".blog-three-active");
        $blogSlider
            .on('init', () => {
                mouseWheel($blogSlider)
            })
            .slick({
                dots: false,
                vertical: true,
                arrows: false,
                infinite: false,
                slidesToShow: 2
            })
        function mouseWheel($blogSlider) {
            $(window).on('wheel', { $blogSlider: $blogSlider }, mouseWheelHandler)
        }
        function mouseWheelHandler(event) {
            event.preventDefault()
            const $blogSlider = event.data.$blogSlider
            const delta = event.originalEvent.deltaY
            if (delta > 0) {
                $blogSlider.slick('slickNext')
            }
            else {
                $blogSlider.slick('slickPrev')
            }
        }


        // ## Team Slider
        if ($scope.find('.team-slider').length) {
            $('.team-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 2,
                infinite: true,
                speed: 400,
                arrows: false,
                dots: true,
                focusOnSelect: true,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }


        // ## Service Four Slider
        if ($scope.find('.service-four-slider').length) {
            $('.service-four-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: false,
                speed: 400,
                arrows: false,
                dots: true,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        // ## Service Image Popup Gallery
        $('.service-item-four .image .plus').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
            },
        });


        // Service Item Four Ative
        $(".service-item-four").hover(function () {
            $(".service-item-four").removeClass("active");
            $(this).addClass("active");
        });



        // ## Hover Content
        $('.hover-content').hover(
            function () {
                $(this).find('.inner-content').slideDown();
            }, function () {
                $(this).find('.inner-content').slideUp();
            }
        );


        /* ## Fact Counter + Text Count - Our Success */
        if ($scope.find('.counter-text-wrap').length) {
            $('.counter-text-wrap').appear(function () {

                var $t = $(this),
                    n = $t.find(".count-text").attr("data-stop"),
                    r = parseInt($t.find(".count-text").attr("data-speed"), 10);

                if (!$t.hasClass("counted")) {
                    $t.addClass("counted");
                    $({
                        countNum: $t.find(".count-text").text()
                    }).animate({
                        countNum: n
                    }, {
                        duration: r,
                        easing: "linear",
                        step: function () {
                            $t.find(".count-text").text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $t.find(".count-text").text(this.countNum);
                        }
                    });
                }

            }, {
                accY: 0
            });
        }


        /* ## Circle Progress */
        if ($.fn.circleProgress) {
            var progressOne = $('.circle-progress.one')
            if ($.fn.circleProgress) {
                progressOne.appear(function () {
                    progressOne.circleProgress({
                        value: 0.89,
                        size: 120,
                        thickness: 1,
                        fill: "#002FF5",
                        // lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(89 * progress) + '<span>%</span>');
                    });
                });
            };
        };
        if ($.fn.circleProgress) {
            var progressTwo = $('.circle-progress.two')
            if ($.fn.circleProgress) {
                progressTwo.appear(function () {
                    progressTwo.circleProgress({
                        value: 0.89,
                        size: 120,
                        thickness: 1,
                        fill: "#002FF5",
                        // lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(5 * progress) + '<span>k+</span>');
                    });
                });
            };
        };


        /* ## Circle Progress Team */
        if ($.fn.circleProgress) {
            var progressTeamOne = $('.circle-progress-two.one')
            if ($.fn.circleProgress) {
                progressTeamOne.appear(function () {
                    progressTeamOne.circleProgress({
                        value: 0.85,
                        size: 100,
                        thickness: 5,
                        fill: "#FC5546",
                        lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(85 * progress) + '<span>%</span>');
                    });
                });
            };
        };
        if ($.fn.circleProgress) {
            var progressTeamTwo = $('.circle-progress-two.two')
            if ($.fn.circleProgress) {
                progressTeamTwo.appear(function () {
                    progressTeamTwo.circleProgress({
                        value: 0.79,
                        size: 100,
                        thickness: 5,
                        fill: "#FC5546",
                        lineCap: 'round',
                        emptyFill: "transparent",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(79 * progress) + '<span>%</span>');
                    });
                });
            };
        };


        /* ## Circle Progress Achievement */
        if ($.fn.circleProgress) {
            var progressAchieveOne = $('.circle-progress-achievement.one')
            if ($.fn.circleProgress) {
                progressAchieveOne.appear(function () {
                    progressAchieveOne.circleProgress({
                        value: 0.84,
                        size: 65,
                        thickness: 5,
                        fill: "white",
                        lineCap: 'round',
                        emptyFill: "rgba(255, 255, 255, .2)",
                        startAngle: Math.PI / 4 * 1,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(65 * progress) + '<span>+</span>');
                    });
                });
            };
        };
        if ($.fn.circleProgress) {
            var progressAchieveTwo = $('.circle-progress-achievement.two')
            if ($.fn.circleProgress) {
                progressAchieveTwo.appear(function () {
                    progressAchieveTwo.circleProgress({
                        value: 0.75,
                        size: 65,
                        thickness: 5,
                        fill: "white",
                        lineCap: 'round',
                        emptyFill: "rgba(255, 255, 255, .2)",
                        startAngle: Math.PI / 4 * 2,
                        animation: { duration: 2000 },
                    }).on('circle-animation-progress', function (event, progress) {
                        $(this).find('.counting').html(Math.round(4.8 * progress));
                    });
                });
            };
        };

        // ## Case Filter
        $('.case-active').imagesLoaded(function () {
            var items = $('.case-active').isotope({
                itemSelector: '.item',
                percentPosition: true,
            });
            // items on button click
            $('.case-nav').on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                items.isotope({
                    filter: filterValue
                });
            });
            // menu active class
            $('.case-nav li').on('click', function (event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
            });
        });


        // ## Price Range Fliter jQuery UI
        if ($scope.find('.price-slider-range').length) {
            $(".price-slider-range").slider({
                range: true,
                min: 5,
                max: 100,
                values: [10, 65],
                slide: function (event, ui) {
                    $("#price").val("$ " + ui.values[0] + " - $ " + ui.values[1]);
                }
            });
            $("#price").val("$ " + $(".price-slider-range").slider("values", 0) +
                " - $ " + $(".price-slider-range").slider("values", 1));
        }


        // ## SkillBar
        if ($scope.find('.skillbar').length) {
            $('.skillbar').appear(function () {
                $('.skillbar').skillBars({
                    from: 0,
                    speed: 4000,
                    interval: 100,
                });
            });
        }


        // ## Latest Work
        // $('.latest-work-item').click(function () {
        //     $('.latest-work-item').removeClass('active');
        //     $(this).addClass('active');
        //     $('.normal-area').slideDown();
        //     $(this).find('.normal-area').slideUp();
        //     $('.active-area').slideUp();
        //     $(this).find('.active-area').slideDown();
        // });



        // ## Scroll to Top
        if ($scope.find('.scroll-to-target').length) {
            $(".scroll-to-target").on('click', function () {
                var target = $(this).attr('data-target');
                // animate
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 1000);

            });
        }


        // ## Nice Select
        $('select').niceSelect();


    };

    //elementor front start
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/widget",
            WidgetDefaultHandler
        );

    });

    /* ==========================================================================
     When document is loaded, do
  ========================================================================== */

    $(window).on('load', function () {


        // ## Latest Work
        $('.latest-work-item').click(function () {
            $('.latest-work-item').removeClass('active');
            $(this).addClass('active');
            $('.normal-area').slideDown();
            $(this).find('.normal-area').slideUp();
            $('.active-area').slideUp();
            $(this).find('.active-area').slideDown();
        });

        // ## Latest Work
        $('.latest-work-item .active-area').hide();
        $('.latest-work-item.active .active-area').show();
        $('.latest-work-item .normal-area').show();
        $('.latest-work-item.active .normal-area').hide();


        // ## Preloader
        function handlePreloader() {
            if ($('.preloader').length) {
                $('.preloader').delay(200).fadeOut(500);
            }
        }
        handlePreloader();

    });

    // ## FAQ Nav Fixed
    if ($('.faq-tab-wrap').length) {
        var faqOffset = $('.faq-tab-wrap').offset().top;
        var footerOffset = $('.for-sticky').offset().top;
    }


    $(window).on('scroll', function () {

        // ## FAQ Nav Fixed
        var sticky = $('.faq-tab-wrap'),
            scroll = $(window).scrollTop();

        if (scroll >= faqOffset) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
        if (scroll >= footerOffset) sticky.removeClass('fixed');

    });

    // ## AOS Animation
    window.onload = function () {
        setTimeout(() => {
            AOS.init();
        }, 500); // Adjust delay if needed
    };


    $('.mc-form').on('submit', function (e) {
        e.preventDefault();

        let email = $('.mc-form__input').val();

        $.ajax({
            url: TekprofObject.ajax_url,
            type: 'POST',
            data: {
                action: 'subscribe_user', // WP AJAX action
                email: email
            },
            success: function (response) {
                $('.mc-form__feedback').html(response);
                $('.mc-form__input').val('');
            },
            error: function (error) {
                $('.mc-form__feedback').html(response.error_text);
            }
        });
    });

    function TekProfcartClickEvents() {
		// h-btn-cart
		$(".add_to_cart_button").on('click', function (e) {
			e.preventDefault();

			$('.widget-cart-wrap').addClass('cart-open');
		});

		$('.cart-close').on('click', function (e) {
			e.preventDefault();

			$('.widget-cart-wrap').removeClass('cart-open');
		});
	}

  TekProfcartClickEvents();

})(jQuery);