import Alpine from 'alpinejs'
import Swiper from 'swiper'
import 'swiper/css'
import {Navigation} from "swiper/modules";

window.Alpine = Alpine

new Swiper('.swiper', {
    modules: [Navigation],
    slidesPerView: 4,
})

Alpine.start()
