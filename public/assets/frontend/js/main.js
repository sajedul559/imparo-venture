(function ($) {
  ("use strict");

  /*========================================
        Preloader
    ========================================*/

  $(window).on("load", function () {
    $(".ic-loading").fadeOut(500);
  });
  /*========================================
    Scroll  top
   ========================================*/

  var scrollTop = $(".ic-scroll-top");
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      scrollTop.css({
        bottom: "4%",
        opacity: "1",
        transition: "all .5s ease-in-out",
      });
    } else {
      scrollTop.css({
        bottom: "-5%",
        opacity: "0",
        transition: "all .5s ease-in-out",
      });
    }
  });
  scrollTop.on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      0
    );
    return false;
  });

  window.addEventListener("scroll", function () {
    if (window.pageYOffset > 100) {
      // setNewClass('menu-fixed')
      document.querySelector(".menu_bar").classList.add("menu-fixed");
    } else {
      // setNewClass('menu')
      document.querySelector(".menu_bar").classList.remove("menu-fixed");
    }
  });

  // menu click on mobile
  $(".mobile-menu .menuItems__top__single").each(function () {
    let $this = $(this);
    if ($this.find("ul").length > 0) {
      $this.addClass("hasChild");
    }
  });

  $(".hasChild").on("click", function () {
    var $this_ul = $(this).find("ul"),
      $this = $(this);
    $(".hasChild ul").not($this_ul).slideUp();
    $(".hasChild").not($this).removeClass("active");
    $this_ul.slideToggle();
    $this.toggleClass("active");
  });

  $(".mobile-menu .menuItems__top__single li a").click(function () {
    $(".menu-items").removeClass("true");
    $(".menu_bar").removeClass("toggled");
  });
  $("body").prepend("<div class='Overlay'></div>");

  $(".menu-bar__menu-lists a").on("click", function () {
    $(".toggle-slide-menu").toggleClass("active");
    if ($(".Overlay").hasClass("show")) {
      $(".Overlay").removeClass("show");
    } else {
      $(".Overlay").addClass("show");
    }

    $(".menu_bar").toggleClass("toggled");
  });

  $(".toggle-slide-menu a").click(function () {
    $(".toggle-slide-menu").removeClass("active");
    $(".menu_bar").removeClass("toggled");
    $(".Overlay").removeClass("show");
  });

  $(".Overlay").click(function () {
    $(".Overlay").removeClass("show");
    $(".menu_bar").removeClass("toggled");
    $(".toggle-slide-menu").removeClass("active");
  });

  $(".banner-slider").slick({
    dots: true,
    arrows: false,
    fade: true,
    infinite: true,
    speed: 800,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 4500,
    autoplay: true,
    pauseOnHover: false,
  });
  $(".service-slider").slick({
    dots: false,
    arrows: true,

    infinite: true,
    speed: 800,
    slidesToShow: 2,
    slidesToScroll: 2,
    autoplaySpeed: 4500,
    autoplay: true,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".testimonial-slider").slick({
    dots: true,
    arrows: false,

    infinite: true,
    speed: 800,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 4500,
    autoplay: true,
    pauseOnHover: false,
  });

  $(".team-slider-wrap").slick({
    dots: false,
    infinite: false,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplaySpeed: 7500,
    autoplay: false,
    arrows: false,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 4500,
        },
      },
    ],
  });
  $(".progress-slider-wrap").slick({
    dots: false,
    infinite: false,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplaySpeed: 5000,
    autoplay: true,
    arrows: false,
    pauseOnHover: false,

    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 4500,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 4500,
        },
      },
    ],
  });
  $(".gallery-slider").slick({
    dots: false,
    // fade: true,
    infinite: false,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplaySpeed: 4500,
    autoplay: true,
    arrows: true,
    pauseOnHover: false,

    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 4500,
        },
      },
    ],
  });
})(jQuery);
