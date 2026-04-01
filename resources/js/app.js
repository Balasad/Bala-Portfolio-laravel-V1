import './bootstrap';
import AOS from 'aos';
import GLightbox from 'glightbox';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 80,
    });

    GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: true,
        selector: '.glightbox',
        skin: 'clean',
    });
});
