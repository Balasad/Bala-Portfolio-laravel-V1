import './bootstrap';
import AOS from 'aos';
import GLightbox from 'glightbox';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';

const isDarkMode = localStorage.getItem('darkMode') !== 'false';

document.body.classList.toggle('dark-mode', isDarkMode);

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

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
