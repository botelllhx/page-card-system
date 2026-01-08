document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.pcs-slider').forEach(slider => {
    new Swiper(slider, {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: slider.querySelector('.swiper-button-next'),
        prevEl: slider.querySelector('.swiper-button-prev'),
      }
    });
  });
});
