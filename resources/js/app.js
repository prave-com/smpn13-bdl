import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

import Swiper from "swiper/bundle"; // Mengimpor semua modul Swiper
import "swiper/css/bundle"; // Mengimpor semua CSS Swiper

document.addEventListener("DOMContentLoaded", function () {
    // Inisialisasi Swiper untuk Berita di Halaman Homepage
    const newsHomepageSwiperElement = document.querySelector(
        ".swiper-news-homepage",
    );
    if (newsHomepageSwiperElement) {
        new Swiper(newsHomepageSwiperElement, {
            slidesPerView: 1, // Default untuk mobile
            spaceBetween: 24, // Gap antar slide
            loop: true,
            autoplay: {
                delay: 5000, // Geser otomatis setiap 5 detik
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: newsHomepageSwiperElement.querySelector(
                    ".swiper-button-next",
                ),
                prevEl: newsHomepageSwiperElement.querySelector(
                    ".swiper-button-prev",
                ),
            },
            pagination: {
                el: newsHomepageSwiperElement.querySelector(
                    ".swiper-pagination",
                ),
                clickable: true,
            },
            breakpoints: {
                // Konfigurasi responsif untuk tampilan yang berbeda
                640: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 32,
                },
            },
        });
    }

    // Swiper untuk Hero Section di homepage
    const homepageHeroSwiperElement = document.querySelector(
        ".homepage-hero-swiper",
    );
    if (homepageHeroSwiperElement) {
        new Swiper(homepageHeroSwiperElement, {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: homepageHeroSwiperElement.querySelector(
                    ".swiper-button-next",
                ),
                prevEl: homepageHeroSwiperElement.querySelector(
                    ".swiper-button-prev",
                ),
            },
            pagination: {
                el: homepageHeroSwiperElement.querySelector(
                    ".swiper-pagination",
                ),
                clickable: true,
            },
        });
    }

    // Inisialisasi Swiper untuk Gambar Ekstrakurikuler di Halaman Ekstrakurikuler (bisa ada beberapa)
    // Gunakan forEach karena ada banyak ekstrakurikuler, dan setiap ekstrakurikuler punya slider sendiri
    const extracurricularPageSwiperElements = document.querySelectorAll(
        ".swiper-extracurricular-page",
    );
    extracurricularPageSwiperElements.forEach((sliderElement) => {
        new Swiper(sliderElement, {
            slidesPerView: 1,
            spaceBetween: 16, // Sesuai contoh ekstrakurikuler (16)
            loop: true,
            autoplay: {
                delay: 2000, // Sesuai contoh ekstrakurikuler (2000ms)
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: sliderElement.querySelector(".swiper-button-next"),
                prevEl: sliderElement.querySelector(".swiper-button-prev"),
            },
            pagination: {
                el: sliderElement.querySelector(".swiper-pagination"),
                clickable: true,
            },
            // Breakpoints bisa disesuaikan jika perlu perbedaan antara mobile/desktop
            // Untuk ekstrakurikuler, jika hanya 1 gambar per slide, breakpoints ini bisa dihilangkan
            // atau disesuaikan jika ingin multi-gambar di desktop.
            // Contoh: Jika ingin 2 slide di desktop, bisa tambahkan:
            // breakpoints: {
            //     768: {
            //         slidesPerView: 2,
            //         spaceBetween: 20,
            //     },
            // }
        });
    });
});

import "tom-select/dist/css/tom-select.css";
import TomSelect from "tom-select";

window.TomSelect = TomSelect;

import Sortable from "sortablejs";

window.Sortable = Sortable;
