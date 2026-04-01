import './bootstrap';
import AOS from 'aos';
import GLightbox from 'glightbox';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';

document.addEventListener('DOMContentLoaded', () => {
    // AOS - Optimized settings
    AOS.init({
        duration: 600,
        easing: 'ease-out',
        once: true,
        offset: 50,
        disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    });

    // GLightbox - Lazy load
    GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: false,
        selector: '.glightbox',
        skin: 'clean',
    });
});
