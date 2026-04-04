import './bootstrap';
import AOS from 'aos';
import GLightbox from 'glightbox';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';

// ── Alpine.js Setup (must be before @bukScripts loads Alpine) ──
import Alpine from 'alpinejs';
window.Alpine = Alpine;

// Register theme store BEFORE Alpine.start()
Alpine.store('theme', {
    dark: localStorage.getItem('darkMode') !== 'false',

    init() {
        // Sync body class with stored value on Alpine boot
        document.body.classList.toggle('dark-mode', this.dark);
    },

    toggle() {
        this.dark = !this.dark;
        localStorage.setItem('darkMode', String(this.dark));
        document.body.classList.toggle('dark-mode', this.dark);
    }
});

Alpine.start();

// ── Dark mode: apply immediately before render (prevents FOUC) ──
const isDarkMode = localStorage.getItem('darkMode') !== 'false';
document.body.classList.toggle('dark-mode', isDarkMode);

// ── AOS + GLightbox ──
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 600,
        easing: 'ease-out',
        once: true,
        offset: 50,
        disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    });

    GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: false,
        selector: '.glightbox',
        skin: 'clean',
    });
});