const swiper = new Swiper(".swiper-hero", {
  loop: true,
  autoplay: false,
  cssMode: true,

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

const swiperFrontPage = new Swiper(".swiper-resp", {
  cssMode: true,
  loop: true,
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const swiperCard = new Swiper(".swiper-card", {
  cssMode: true,
  slidesPerView: 1.2,
  loop: true,
  spaceBetween: 50,
  autoplay: false,
});

const swiperAbout = new Swiper(".swiper-about", {
  cssMode: true,
  loop: true,
  slidesPerView: 1,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const swiperBlog = new Swiper(".swiper-blog", {
  cssMode: true,
  loop: true,
  slidesPerView: 1,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const swiperExtra = new Swiper(".swiper-extra", {
  loop: true,

  navigation: {
    nextEl: ".swiper-button-next",
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1.2,
      spaceBetween: 20,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
  },
});
