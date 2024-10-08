$.fn.isInViewport = function () {
    let elementTop = $(this).offset().top;
    let elementBottom = elementTop + $(this).outerHeight();
    let viewportTop = $(window).scrollTop() - 200;
    let viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on("load resize scroll", function () {
    $('.animateOnEnter').each(function() {
        if ( $(this).isInViewport() ) {
            $(this).addClass('inView');
        }
    });

    $('.bg-el--right, .bg-el--left').each(function() {
        if ( $(this).isInViewport() ) {
            $(this).addClass('inView');
        }
    });
});
