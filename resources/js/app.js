import './bootstrap';
import AOS from 'aos';
import GLightbox from 'glightbox';

import 'aos/dist/aos.css';
import 'glightbox/dist/css/glightbox.min.css';

// ── Theme Toggle (pure vanilla JS — no Alpine needed) ──
(function () {
    function getIsDark() {
        return localStorage.getItem('darkMode') !== 'false';
    }

    function applyTheme(isDark) {
        document.body.classList.toggle('dark-mode', isDark);
        const icon = document.getElementById('theme-icon');
        const btn  = document.getElementById('theme-toggle-btn');
        if (icon) icon.textContent = isDark ? '☀️' : '🌙';
        if (btn)  btn.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');
    }

    // Apply immediately to prevent flash of wrong theme
    applyTheme(getIsDark());

    // Wait for DOM then wire up the button
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('theme-toggle-btn');
        if (btn) {
            btn.addEventListener('click', () => {
                const newDark = !getIsDark();
                localStorage.setItem('darkMode', String(newDark));
                applyTheme(newDark);
            });
        }

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
})();