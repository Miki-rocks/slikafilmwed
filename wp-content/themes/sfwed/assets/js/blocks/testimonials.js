jQuery(document).ready(function($) {
    if ($('.testimonials').length) {
        var $testimonialSlider = $('.testimonials__slider-text');
        var $imageSlider = $('.testimonials__slider-photo');

        // Initialize the text slider with side-to-side animation
        $testimonialSlider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: $('.testimonials__arrow.prevArrow'),
            nextArrow: $('.testimonials__arrow.nextArrow'),
            dots: false,
            infinite: true,
			// adaptiveHeight: true,
            asNavFor: '.testimonials__slider-photo',
            // responsive: [
            //     {
            //         breakpoint: 768,
            //         settings: {
            //             swipe: true
            //         }
            //     }
            // ]
        });

        // Initialize the image slider with fade animation
        $imageSlider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            asNavFor: '.testimonials__slider-text',
            fade: true,
            cssEase: 'linear'
        });

        // Function to add classes to the next slides
        function addClasses(currentIndex) {
            var $slides = $imageSlider.find('.slick-slide');
            $slides.removeClass('next-slide second-next-slide');

            var nextSlide = (currentIndex + 1) % $slides.length;
            var secondNextSlide = (currentIndex + 2) % $slides.length;

            $slides.eq(nextSlide).addClass('next-slide');
            $slides.eq(secondNextSlide).addClass('second-next-slide');
        }

        // Add classes after slide change
        $imageSlider.on('afterChange', function(event, slick, currentSlide) {
            addClasses(currentSlide);
        });

        // Add classes on init
        $imageSlider.on('init', function(event, slick) {
            addClasses(slick.currentSlide);
        });

        // Initialize the sliders and trigger the init event manually
        $imageSlider.slick('slickGoTo', 0);
    }
});
