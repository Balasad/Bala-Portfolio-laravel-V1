import './bootstrap';
import AOS from 'aos';
import GLightbox from 'glightbox';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';

// ── Theme Toggle ──
// Icons and click handler are now CSS-driven + inline onclick on the button in app.blade.php.
// This avoids race conditions with Alpine/Livewire on production (Render).
// The <head> inline script applies the theme class to <html> before paint (FOUC prevention).

document.addEventListener('DOMContentLoaded', () => {
    // ── AOS ──
    AOS.init({
        duration: 600,
        easing: 'ease-out',
        once: true,
        offset: 50,
        disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    });

    // ── GLightbox ──
    GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: false,
        selector: '.glightbox',
        skin: 'clean',
    });
});