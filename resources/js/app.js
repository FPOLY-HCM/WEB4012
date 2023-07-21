import Alpine from 'alpinejs'
import Swiper from 'swiper'
import 'swiper/css'
import {Navigation} from "swiper/modules";
import hljs from 'highlight.js/lib/common'

window.Alpine = Alpine

new Swiper('.swiper', {
    modules: [Navigation],
    slidesPerView: 4,
})

document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre code').forEach((el) => {
        hljs.highlightElement(el);
    });
});

Alpine.start()
