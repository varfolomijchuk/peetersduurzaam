import * as Slick from '../js/vendor/slick.min.js'
$(document).on('ready', function () {

    if ($('.icon-box').length) {
        $('.icon-box .icon-carousel-wrapper').each((id, el) => {
            $(el).slick({
                autoplay: true,
                swipeToSlide: true,
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                infinite: true,
                slidesToShow: 3,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,

                        }
                    }

                ]
            });
        });
    }

    if ($('.profiles').length) {
       $('.profiles .carousel-wrapper').each((id, el) => {
            let toShow = $(el).data('to-show');
           $(el).slick({
               autoplay: false,
               arrows: true,
               infinite: true,
               slidesToShow: toShow,
               slidesToScroll: 1,
               variableWidth: true
           });
       });
    }

    //CPT carousel
    if ($('.cpt-carousel').length) {
        $('.cpt-carousel .cpt-carousel-wrapper').each((id, el) => {
            // cpt-carousel.php
            if (el.hasAttribute('data-post-type')) {
                $(el).slick({
                    infinite: true,
                    draggable: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });
            } else {
                // blog-carousel.php
                $(el).slick({
                    infinite: true,
                    draggable: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    variableWidth: false,
                });
            }
        });
    }

    if ($('.image-carousel').length) {
        $('.image-carousel .carousel-wrapper').each((id, el) => {
            $(el).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        });
    }

    if ($('.text-carousel').length) {
        let responsiveSlideToShow = $('body').hasClass('single-vacature');

        $('.text-carousel .text-carousel-wrapper').each((id, el) => {
            $(el).slick({
                infinite: true,
                draggable: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            arrows: false,
                            slidesToShow: responsiveSlideToShow ? 1 : 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,

                        }
                    }

                ]
            });
        });
    }

    if ($('.reviews-carousel').length) {
        $('.reviews-carousel .review-carousel-wrapper').each((id, el) => {
            $(el).slick({
                infinite: true,
                draggable: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,

                        }
                    }

                ]
            });
        });
    }

    if ($('.logo-carousel').length) {
        $('.logo-carousel .carousel-wrapper').each((id, el) => {
            let toShow = $(el).data('to-show');
            $(el).slick({
                autoplay: true,
                swipeToSlide: true,
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                infinite: true,
                slidesToShow: toShow,
                variableWidth: true,
            });
        });
    }

    if ($('.single-item-slider').length) {
        $('.single-item-slider .single-item-slider-container').each((id, el) => {
            $(el).slick({
                autoplay: false,
                dots: true,
                customPaging : function(slider, i) {
                    i++;
                    var thumb = $(slider.$slides[i]).data();
                    return '<a>'+i+'</a>';
                },
                arrows: true,
                prevArrow: "<button class='simple-prev '>Vorige</button>",
                nextArrow: "<button class='simple-next '>Volgende</button>",
                infinite: true,
                draggable: true,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        });
    }
});