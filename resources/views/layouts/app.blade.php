{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Balasaravanan S — UI/UX Designer & Laravel Developer based in Chennai. Designing intuitive interfaces and building enterprise-grade web applications.">
    <meta name="theme-color" content="#020617">
    <meta name="color-scheme" content="dark">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bala Portfolio</title>
    {{-- Preconnect for faster font load --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Only load weights actually used: 400,700,900 for Roboto; 700,900 for Condensed --}}
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet"></noscript>

    <style>
:root {
    --green:        #22c55e;
    --green-light:  #4ade80;
    --green-dim:    rgba(34,197,94,0.15);
    --green-glow:   rgba(34,197,94,0.35);
    --bg:           #020617;
    --bg-card:      rgba(15, 23, 42, 0.6);
    --surface:      rgba(255,255,255,0.04);
    --border:       rgba(255,255,255,0.08);
    --text:         #ffffff;
    --text-muted:   #94a3b8;
    --radius:       16px;
    --font-display: 'Roboto Condensed', sans-serif;
    --font-body:    'Roboto', sans-serif;
    --shadow:       0 4px 20px rgba(0,0,0,0.3);
}

[x-cloak] { display: none !important; }

/* Light Theme Variables */
body:not(.dark-mode) {
    --bg:           #fef9f3;
    --bg-card:      rgba(255, 255, 255, 0.85);
    --surface:      rgba(255,255,255,0.6);
    --border:       rgba(0,0,0,0.1);
    --text:         #1a1a2e;
    --text-muted:   #6b7280;
    --green:        #ec4899;
    --green-light:  #f472b6;
    --green-dim:    rgba(236, 72, 153, 0.15);
    --green-glow:   rgba(236, 72, 153, 0.4);
    --shadow:       0 4px 20px rgba(0,0,0,0.08);
}

/* Dark Theme Variables */
body.dark-mode {
    --bg:           #020617;
    --bg-card:      rgba(15, 23, 42, 0.6);
    --surface:      rgba(255,255,255,0.04);
    --border:       rgba(255,255,255,0.08);
    --text:         #ffffff;
    --text-muted:   #94a3b8;
    --green:        #22c55e;
    --green-light:  #4ade80;
    --green-dim:    rgba(34,197,94,0.15);
    --green-glow:   rgba(34,197,94,0.35);
    --shadow:       0 4px 20px rgba(0,0,0,0.3);
}

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

html { scroll-behavior: smooth; }

body {
    font-family: var(--font-body);
    background: var(--bg);
    color: var(--text);
    overflow-x: hidden;
    transition: background 0.5s ease, color 0.5s ease;
}

/* ── Galaxy Background (Dark) ── */
.galaxy-container {
    position: fixed;
    inset: 0;
    z-index: -1;
    background: radial-gradient(circle at 50% 50%, #0f172a 0%, #020617 100%);
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.8s ease;
}

.galaxy-container.active {
    opacity: 1;
}

.starfield {
    position: absolute;
    width: 200%;
    height: 200%;
    background-image:
        radial-gradient(1px 1px at 20px 30px, #fff, rgba(0,0,0,0)),
        radial-gradient(1.5px 1.5px at 40px 70px, #fff, rgba(0,0,0,0)),
        radial-gradient(2px 2px at 50px 160px, var(--green-light), rgba(0,0,0,0)),
        radial-gradient(1px 1px at 90px 40px, #fff, rgba(0,0,0,0));
    background-size: 300px 300px;
    opacity: 0.3;
    animation: drift 100s linear infinite;
    will-change: transform;
    contain: strict;
}

@keyframes drift {
    from { transform: translate(0, 0); }
    to   { transform: translate(-50%, -50%); }
}

/* ── Sakura Background (Light Theme) ── */
.sakura-container {
    position: fixed;
    inset: 0;
    z-index: -1;
    background: linear-gradient(135deg, #ffeef8 0%, #fff5f8 25%, #fef0f5 50%, #fff8fc 75%, #fef9f3 100%);
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.8s ease;
}

.sakura-container.active {
    opacity: 1;
}

/* Sakura Particles */
.sakura {
    position: absolute;
    width: 14px;
    height: 14px;
    background: radial-gradient(circle, #ffb7c5 0%, #ff91a4 50%, #ff6b8a 100%);
    border-radius: 50% 0 50% 50%;
    opacity: 0.85;
    animation: falling linear infinite;
    box-shadow: 0 2px 10px rgba(255, 107, 138, 0.3);
}

.sakura::before,
.sakura::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: inherit;
    border-radius: inherit;
}

.sakura::before {
    transform: rotate(60deg);
    top: -3px;
    left: 3px;
}

.sakura::after {
    transform: rotate(-60deg);
    top: 3px;
    left: -3px;
}

@keyframes falling {
    0% {
        transform: translateY(-100px) rotate(0deg) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 0.85;
    }
    90% {
        opacity: 0.85;
    }
    100% {
        transform: translateY(100vh) rotate(720deg) translateX(100px);
        opacity: 0;
    }
}

/* ── Nebula Glow ── */
.nebula {
    position: absolute;
    width: 800px;
    height: 800px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--green-glow) 0%, transparent 70%);
    filter: blur(80px);
    opacity: 0.4;
    mix-blend-mode: screen;
    animation: nebulaPulse 10s ease-in-out infinite alternate;
    pointer-events: none;
    will-change: transform, opacity;
    contain: layout style;
    transition: background 0.5s ease;
}

@keyframes nebulaPulse {
    0%   { transform: scale(1) translate(10%, -10%);  opacity: 0.3; }
    100% { transform: scale(1.3) translate(-5%, 5%);  opacity: 0.5; }
}

/* ── Navbar ── */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 22px 64px;
    position: sticky;
    top: 0;
    z-index: 200;
    background: var(--bg-card);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
    contain: layout style;
    transition: background 0.5s ease, border-color 0.5s ease;
}

.navbar-brand {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 20px;
    background: linear-gradient(90deg, var(--text) 60%, var(--green-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-decoration: none;
    transition: filter 0.3s;
}

.navbar-brand:hover {
    filter: drop-shadow(0 0 12px var(--green-glow));
}

.nav-links {
    display: flex;
    gap: 32px;
}

.nav-links a {
    font-size: 14px;
    font-weight: 500;
    color: var(--text-muted);
    text-decoration: none;
    transition: color 0.3s;
}
.nav-links a:hover { color: var(--green-light); }

/* Hamburger */
.nav-hamburger {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    cursor: pointer;
    background: none;
    border: none;
    padding: 4px;
    z-index: 210;
}

.nav-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-hamburger.open span:nth-child(2) { opacity: 0; }
.nav-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* ── Theme Toggle ── */
.theme-toggle {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    margin-left: 16px;
}

.theme-toggle:hover {
    background: var(--green-dim);
    border-color: var(--green);
    transform: scale(1.1);
}

.theme-icon {
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Mobile drawer */
.mobile-drawer {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--bg);
    backdrop-filter: blur(20px);
    z-index: 190;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 36px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s, background 0.5s ease;
}

.mobile-drawer.open {
    display: flex;
    opacity: 1;
    pointer-events: all;
}

.mobile-drawer a {
    font-family: var(--font-display);
    font-size: 36px;
    font-weight: 700;
    color: var(--text-muted);
    text-decoration: none;
    letter-spacing: 2px;
    transition: color 0.3s;
}
.mobile-drawer a:hover { color: var(--green-light); }

.nav-hamburger span {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--text);
    border-radius: 2px;
    transition: all 0.3s;
}

/* ── Buttons ── */
.btn {
    font-family: var(--font-display);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 10px 24px;
    border-radius: 30px;
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    text-decoration: none;
    display: inline-block;
}
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 30px var(--green-glow);
}

.btn-outline {
    border: 2px solid var(--green);
    padding: 9px 24px;
    border-radius: 30px;
    background: transparent;
    color: var(--text);
    text-decoration: none;
    font-weight: 700;
    font-size: 13px;
    transition: all 0.3s;
    white-space: nowrap;
}
.btn-outline:hover { 
    background: var(--green-dim); 
    color: var(--green-light);
}

/* ── General Section Styles ── */
.hero, .portfolio, .experience, .contact-section {
    padding: 80px 80px;
    position: relative;
    z-index: 1;
}

.portfolio, .experience, .contact-section {
    content-visibility: auto;
    contain-intrinsic-size: 0 600px;
}

.section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green-light);
    margin-bottom: 12px;
    transition: color 0.5s ease;
}

h2 {
    font-family: var(--font-display);
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 40px;
    color: var(--text);
    transition: color 0.5s ease;
}

/* ── Responsive Breakpoints ── */

/* Tablet */
@media (max-width: 1024px) {
    .navbar { padding: 18px 40px; }
    .hero, .portfolio, .experience { padding: 60px 40px; }
    h2 { font-size: 36px; }
}

/* Mobile */
@media (max-width: 768px) {
    .navbar { padding: 14px 16px; }
    .nav-links { display: none; }
    .desktop-cta { display: none !important; }
    .nav-hamburger { display: flex; }
    .hero, .portfolio, .experience { padding: 40px 16px; }
    h2 { font-size: 28px; margin-bottom: 24px; }
    .section-label { font-size: 10px; letter-spacing: 2px; }
    .nebula { width: 300px; height: 300px; opacity: 0.2; }
}

@media (max-width: 420px) {
    .navbar { padding: 12px 14px; }
    .hero, .portfolio, .experience { padding: 32px 14px; }
}
    
/* ── Navbar slide-down on load ── */
.navbar {
    animation: navSlideDown 0.6s cubic-bezier(0.22,1,0.36,1) both;
}
@keyframes navSlideDown {
    from { transform: translateY(-100%); opacity: 0; }
    to   { transform: translateY(0);     opacity: 1; }
}

/* ── Mobile drawer links slide in ── */
.mobile-drawer.open a {
    animation: drawerLinkIn 0.4s cubic-bezier(0.22,1,0.36,1) both;
}
.mobile-drawer.open a:nth-child(1) { animation-delay: 0.05s; }
.mobile-drawer.open a:nth-child(2) { animation-delay: 0.12s; }
.mobile-drawer.open a:nth-child(3) { animation-delay: 0.19s; }
@keyframes drawerLinkIn {
    from { opacity: 0; transform: translateX(-30px); }
    to   { opacity: 1; transform: translateX(0); }
}

/* ── Footer ── */
.footer {
    padding: 60px 80px 30px;
    border-top: 1px solid var(--border);
    position: relative;
    z-index: 1;
    background: var(--bg);
    transition: background 0.5s ease, border-color 0.5s ease;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
    margin-bottom: 40px;
}

.footer-brand p {
    color: var(--text-muted);
    font-size: 14px;
    margin-top: 8px;
    transition: color 0.5s ease;
}

.footer-links {
    display: flex;
    gap: 32px;
}

.footer-links a {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
}

.footer-links a:hover {
    color: var(--green-light);
}

.footer-social {
    display: flex;
    gap: 12px;
}

.footer-social a {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: var(--surface);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    transition: all 0.3s;
}

.footer-social a:hover {
    background: var(--green-dim);
    border-color: var(--green);
    color: var(--green-light);
    transform: translateY(-3px);
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    border-top: 1px solid var(--border);
    transition: border-color 0.5s ease;
}

.footer-bottom p {
    color: var(--text-muted);
    font-size: 13px;
    transition: color 0.5s ease;
}

@media (max-width: 768px) {
    .footer {
        padding: 40px 16px 24px;
    }
    .footer-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 24px;
    }
    .footer-links {
        gap: 24px;
    }
}

</style>
</head>
<body :class="{ 'dark-mode': darkMode }" x-cloak>
    <div class="galaxy-container" :class="{ 'active': darkMode }">
        <div class="starfield"></div>
    </div>
    
    <div class="sakura-container" :class="{ 'active': !darkMode }" id="sakura-container"></div>

    {{-- Mobile Drawer --}}
    <div class="mobile-drawer" id="mobile-drawer">
        <a href="{{ route('home') }}#work"       onclick="closeDrawer()">Work</a>
        <a href="{{ route('home') }}#experience" onclick="closeDrawer()">Experience</a>
        <a href="{{ route('contact') }}"           onclick="closeDrawer()">Contact</a>
    </div>

    <nav class="navbar">
        <span class="navbar-brand">Bala Saravanan</span>

        <div class="nav-links">
            <a href="{{ route('home') }}#work">Work</a>
            <a href="{{ route('home') }}#experience">Experience</a>
            <a href="{{ route('contact') }}">Contact</a>
        </div>

        <a href="{{ route('contact') }}" class="btn desktop-cta" style="display:block;">Get In Touch</a>

        <button class="nav-hamburger" id="hamburger" aria-label="Toggle menu" onclick="toggleDrawer()">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <button 
            class="theme-toggle" 
            @click="darkMode = !darkMode"
            :aria-label="darkMode ? 'Switch to light mode' : 'Switch to dark mode'"
        >
            <span x-show="darkMode" class="theme-icon">☀️</span>
            <span x-show="!darkMode" class="theme-icon">🌙</span>
        </button>
    </nav>

    @yield('content')

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <span class="navbar-brand">Bala Saravanan</span>
                <p>UI/UX Designer & Laravel Developer</p>
            </div>
            <div class="footer-links">
                <a href="{{ route('home') }}#work">Work</a>
                <a href="{{ route('home') }}#experience">Experience</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="footer-social">
                <a href="#" aria-label="LinkedIn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <a href="#" aria-label="GitHub">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                <a href="#" aria-label="Twitter">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Balasaravanan S. Built with Laravel & ❤️</p>
        </div>
    </footer>

    <script>
    function toggleDrawer() {
        const drawer = document.getElementById('mobile-drawer');
        const burger  = document.getElementById('hamburger');
        drawer.classList.toggle('open');
        burger.classList.toggle('open');
    }
    function closeDrawer() {
        document.getElementById('mobile-drawer').classList.remove('open');
        document.getElementById('hamburger').classList.remove('open');
    }
    
    // Sakura Effect
    function createSakura() {
        const container = document.getElementById('sakura-container');
        if (!container) return;
        
        const petalCount = 25;
        
        for (let i = 0; i < petalCount; i++) {
            setTimeout(() => {
                if (document.body.classList.contains('dark-mode')) return;
                
                const petal = document.createElement('div');
                petal.className = 'sakura';
                petal.style.left = Math.random() * 100 + '%';
                petal.style.animationDuration = (Math.random() * 5 + 8) + 's';
                petal.style.animationDelay = '0s';
                petal.style.opacity = Math.random() * 0.5 + 0.4;
                petal.style.transform = `scale(${Math.random() * 0.5 + 0.5})`;
                petal.style.width = (Math.random() * 8 + 8) + 'px';
                petal.style.height = (Math.random() * 8 + 8) + 'px';
                
                container.appendChild(petal);
                
                setTimeout(() => petal.remove(), 15000);
            }, i * 500);
        }
        
        // Continuous petals
        setInterval(() => {
            if (document.body.classList.contains('dark-mode')) return;
            
            const petal = document.createElement('div');
            petal.className = 'sakura';
            petal.style.left = Math.random() * 100 + '%';
            petal.style.animationDuration = (Math.random() * 5 + 8) + 's';
            petal.style.opacity = Math.random() * 0.5 + 0.4;
            petal.style.transform = `scale(${Math.random() * 0.5 + 0.5})`;
            petal.style.width = (Math.random() * 8 + 8) + 'px';
            petal.style.height = (Math.random() * 8 + 8) + 'px';
            
            container.appendChild(petal);
            
            setTimeout(() => petal.remove(), 15000);
        }, 2000);
    }
    
    // Watch for dark mode changes
    document.addEventListener('alpine:init', () => {
        Alpine.data('themeWatcher', () => ({
            darkMode: localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches),
            init() {
                this.$watch('darkMode', (value) => {
                    localStorage.setItem('darkMode', value);
                    if (!value) {
                        setTimeout(createSakura, 500);
                    }
                });
                if (!this.darkMode) {
                    setTimeout(createSakura, 1000);
                }
            }
        }));
    });
    
    // Start sakura if light mode on load
    if (!document.body.classList.contains('dark-mode')) {
        setTimeout(createSakura, 1000);
    }
    </script>
</body>
</html>