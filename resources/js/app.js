require("./bootstrap");

import $ from "jquery";

import Swiper from "swiper";
import "swiper/css/bundle";

$(".swiper-container").each(function () {
    let swiper = $(this).attr("id", Math.floor(Math.random() * 10) + 1);
    new Swiper(swiper.get());
});
