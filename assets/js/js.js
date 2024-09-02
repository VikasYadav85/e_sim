// home slider
var swiper = new Swiper(".about-slider-content", {
  spaceBetween: 0,
  slidesPerView: 1,
  watchSlidesProgress: true,
  pagination: {
    el: ".swiper-pagination",
  },
  autoplay: {
    delay: 3000,
  }
});
var swiper = new Swiper(".blog-slider-content", {
  spaceBetween: 1,
  slidesPerView: 1,
  watchSlidesProgress: true,
  spaceBetween: 10, 
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    1440: {
      slidesPerView: 4,
      spaceBetween: 15,
    },
  },
});

$(window).scroll(function () {
  var scroll = $(window).scrollTop();
  if (scroll >= 100) {
    $(".header").addClass("darkHeader");
  } else{
    $(".header").removeClass("darkHeader");
  }
});

// about slider
var slider = new Swiper ('.gallery-slider', {
  slidesPerView: 1,
  centeredSlides: true,
  loop: true,
  loopedSlides: 9, 
});

var thumbs = new Swiper ('.gallery-thumbs', {
  slidesPerView: '9',
  spaceBetween: 0,
  centeredSlides: true,
  loop: true,
  slideToClickedSlide: true,
});

slider.controller.control = thumbs;
thumbs.controller.control = slider;


var swiper = new Swiper(".awards-slider", {
  spaceBetween: 1,
  slidesPerView: 1,
  watchSlidesProgress: true,
  spaceBetween: 10, 
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
    1440: {
      slidesPerView: 4,
      spaceBetween: 15,
    },
    2000: {
      slidesPerView: 5,
      spaceBetween: 15,
    },
  },
});