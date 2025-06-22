import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

import Swiper from "swiper/bundle";
import "swiper/css/bundle";

document.addEventListener("DOMContentLoaded", function () {
    const sliders = document.querySelectorAll(".swiper");
    sliders.forEach((slider) => {
        new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: slider.querySelector(".swiper-button-next"),
                prevEl: slider.querySelector(".swiper-button-prev"),
            },
            pagination: {
                el: slider.querySelector(".swiper-pagination"),
                clickable: true,
            },
        });
    });
});

import "tom-select/dist/css/tom-select.css";
import TomSelect from "tom-select";

window.TomSelect = TomSelect;

import Sortable from "sortablejs";

window.Sortable = Sortable;
