// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

const sliderHero = document.querySelector('.slider-hero');

if (sliderHero) {
  const sliderItem = sliderHero.querySelectorAll('.slide');

  if (sliderItem.length > 1) {
    // init Swiper:
    const swiper = new Swiper(sliderHero, {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      
  
      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },
  
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
  
      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });
  }
}


