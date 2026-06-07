import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import AOS from 'aos';
import 'aos/dist/aos.css';


window.addEventListener('load', () => {
    AOS.init({
        duration:1000,
        offset:120,
        once: true,
    });

    AOS.refresh();
});
