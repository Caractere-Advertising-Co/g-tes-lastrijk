const swiper = new Swiper('.swiper', {
    loop: false,
    slidesPerView: 3,
    speed: 300,
    autoplay:true,
    loop: true,
    spaceBetween: 20,

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});
