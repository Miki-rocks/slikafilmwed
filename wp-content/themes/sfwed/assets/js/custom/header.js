// Mobile navigation toggle button function
$(".navbar-toggler").on("click", function () {
  $(".site-navigation").toggleClass("site-navigation-open");
  $("body").toggleClass("mobile-nav-open");
});

// Adding class on scroll for colored header
var heroHeight = 300;
if ($(".sfwed-section.homepage-hero").length) {
  heroHeight = $(".sfwed-section.homepage-hero").height();
  heroHeight = heroHeight / 2;
}

$(window).on("scroll", function () {
  var scroll = $(window).scrollTop();
  if (scroll >= heroHeight) {
    $(".header").addClass("header-scrolled");
  } else {
    $(".header").removeClass("header-scrolled");
  }
});

$(
  ".header .site-navigation-list .primary-navigation__item .primary-navigation__link:not(.btn)"
).click(function () {
  if ($(window).width() < 1024) {
    $(".navbar-toggler").click();
  }

  var $this = $(this);
  var offset = $(".header").height();

  if (
    location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") &&
    location.hostname == this.hostname
  ) {
    var target = $(this.hash);
    target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
    if (target.length) {
      $("html, body").animate(
        {
          scrollTop: target.offset().top - offset,
        },
        1000
      );
      return false;
    }
  }
});
