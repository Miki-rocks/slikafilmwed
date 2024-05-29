window.addEventListener('load', function() {
    var heroSliders = document.querySelectorAll('.homepage-hero');

    heroSliders.forEach(function(heroSlider) {
        var slidesCount = heroSlider.querySelectorAll('.homepage-hero__slide').length;

        if (slidesCount > 1) {
            var slider = heroSlider.querySelector('.homepage-hero__slider');

            $(slider).slick({
                dots: true,
                appendDots: heroSlider.querySelector('.homepage-hero__slider-dots-wrap'),
                arrows: false,
                // prevArrow: heroSlider.querySelector('.homepage-hero__slider-arrow.prevArrow'),
                // nextArrow: heroSlider.querySelector('.homepage-hero__slider-arrow.nextArrow'),
                infinite: true,
                speed: 100,
                slidesToShow: 1,
                slidesToScroll: 1,
                mobileFirst: true,
                autoplay: true,
                autoplaySpeed: 3000,
                fade: true,
                cssEase: 'linear',
                centerMode: true,
                centerPadding: '16px',
                draggable: true,
                adaptiveHeight: false,
                responsive: [{
                    breakpoint: 744,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                    }
                }],
            });

        }
    });
});
