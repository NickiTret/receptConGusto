// import Swiper bundle with all modules installed
import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const sliderHero = document.querySelector(".slider-hero");

if (sliderHero) {
    const sliderItem = sliderHero.querySelectorAll(".swiper-slide");

    if (sliderItem.length > 1) {
        const swiper = new Swiper(sliderHero, {
            // effect: "coverflow",
            // coverflowEffect: {
            //     rotate: 180,
            //     slideShadows: false,
            // },
            direction: "horizontal",
            loop: true,
            autoplay: {
                delay: 15000,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }
}
