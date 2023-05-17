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

const sliders = Array.from(document.querySelectorAll(".swiper-special"));

if (sliders) {
    sliders.forEach((slider) => {
        let thumbnail = slider.querySelector(".swiper-wrapper");
        const thumbnails = JSON.parse(thumbnail.getAttribute("data-json"));
        new Swiper(slider, {
            spaceBetween: 0,
            autoHeight: true,
            // navigation: {
            //     nextEl: ".swiper-button-next",
            //     prevEl: ".swiper-button-prev",
            // },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function (index, className) {
                    let image = Array.from(thumbnails).find(
                        (el, idx) => typeof el === "object" && idx === index
                    );
                    console.log(thumbnails);
                    //   return '<span class="' + className + '">' + (index + 1) + "</span>";
                    return (
                        '<span class="' +
                        className +
                        '">' +
                        `<img src="https://e-con-gusto.ru/${image.image}" alt="Картинка соуса">` +
                        "</span>"
                    );
                },
            },
        });
    });
}
