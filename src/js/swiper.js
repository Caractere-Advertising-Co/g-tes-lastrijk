const swiper = new Swiper('.swiper', {
    loop: false,
    slidesPerView: 3,
    speed: 300,
    autoplay:true,
    loop: true,
    spaceBetween: 20,

    breakpoints: {
      320: {
        slidesPerView: 1,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});
