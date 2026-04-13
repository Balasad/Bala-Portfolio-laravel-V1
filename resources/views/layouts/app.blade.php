{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- Anti-FOUC: set theme class before CSS paints — prevents flash on Render/production --}}
    <script>
        (function(){
            /* Apply theme IMMEDIATELY to <html> — prevents flash on Render/production */
            var d = localStorage.getItem('darkMode') !== 'false';
            document.documentElement.classList.toggle('dark-mode', d);
        })();
    </script>
    {{-- ── SEO & Social Meta ── --}}
    <meta name="description" content="Balasaravanan S — UI/UX Designer & Laravel Developer based in Chennai. Designing intuitive interfaces and building enterprise-grade web applications.">
    <meta name="keywords" content="UI/UX Designer, Laravel Developer, Chennai, Web Developer, Livewire, Figma, Portfolio">
    <meta name="author" content="Balasaravanan S">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- ── Open Graph (Facebook, LinkedIn, WhatsApp) ── --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="@yield('og_title', 'Balasaravanan S — UI/UX Designer & Laravel Developer')">
    <meta property="og:description" content="@yield('og_description', 'Designing intuitive interfaces and building enterprise-grade web applications. Based in Chennai.')">
    <meta property="og:image"       content="@yield('og_image', asset('images/og-cover.png'))">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt"   content="Balasaravanan S — Portfolio">
    <meta property="og:site_name"   content="Balasaravanan Portfolio">
    <meta property="og:locale"      content="en_US">

    {{-- ── Twitter / X Card ── --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:site"        content="@Balasad_">
    <meta name="twitter:creator"     content="@Balasad_">
    <meta name="twitter:title"       content="@yield('og_title', 'Balasaravanan S — UI/UX Designer & Laravel Developer')">
    <meta name="twitter:description" content="@yield('og_description', 'Designing intuitive interfaces and building enterprise-grade web applications. Based in Chennai.')">
    <meta name="twitter:image"       content="@yield('og_image', asset('images/og-cover.png'))">
    <meta name="twitter:image:alt"   content="Balasaravanan S — Portfolio">

    <meta name="theme-color" content="#fef9f3" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#020617" media="(prefers-color-scheme: dark)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark light">
    <title>@yield('title', 'Balasaravanan S — UI/UX Designer & Laravel Developer')</title>

    {{-- JSON-LD Structured Data for SEO --}}
    {!! App\Services\SeoService::combinedSchema(
        App\Services\SeoService::personSchema(),
        App\Services\SeoService::organizationSchema()
    ) !!}
    @yield('json_ld')
    
    {{-- Preconnect for faster font load --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    {{-- Font optimization - only load used weights --}}
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet"></noscript>
    
    {{-- Livewire Styles --}}
    @livewireStyles
    {{-- Blade UI Kit Styles --}}
    @bukStyles(true)
    
    {{-- Critical inline styles for above-the-fold content --}}
    <style>
        body{margin:0;font-family:Roboto,sans-serif;background:#020617;color:#fff}
        .loading-screen{position:fixed;inset:0;background:#020617;display:flex;align-items:center;justify-content:center;z-index:9999;transition:opacity .5s}
        .loading-screen.hidden{opacity:0;pointer-events:none}
    </style>
    
    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%234ade80' stroke-width='2'><path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'/><circle cx='12' cy='7' r='4'/></svg>">

    <style>
 :root {
    --green:        #22c55e;
    --green-light:  #4ade80;
    --green-dim:    rgba(34,197,94,0.15);
    --green-glow:   rgba(34,197,94,0.35);
    --bg:           #020617;
    --bg-card:      rgba(15, 23, 42, 0.6);
    --surface:      rgba(255,255,255,0.04);
    --surface-hover: rgba(255,255,255,0.08);
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
    --green:        #ec4899;
    --green-light:  #f472b6;
    --green-dim:    rgba(236, 72, 153, 0.15);
    --green-glow:   rgba(236, 72, 153, 0.4);
    --bg:           #fef9f3;
    --bg-card:      rgba(255, 255, 255, 0.9);
    --surface:      rgba(0, 0, 0, 0.04);
    --surface-hover: rgba(0, 0, 0, 0.08);
    --border:       rgba(0, 0, 0, 0.08);
    --text:         #1a1a2e;
    --text-muted:   #6b7280;
    --shadow:       0 4px 20px rgba(0,0,0,0.08);
}

/* Dark Theme Variables */
body.dark-mode {
    --green:        #22c55e;
    --green-light:  #4ade80;
    --green-dim:    rgba(34,197,94,0.15);
    --green-glow:   rgba(34,197,94,0.35);
    --bg:           #020617;
    --bg-card:      rgba(15, 23, 42, 0.6);
    --surface:      rgba(255,255,255,0.04);
    --surface-hover: rgba(255,255,255,0.08);
    --border:       rgba(255,255,255,0.08);
    --text:         #ffffff;
    --text-muted:   #94a3b8;
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

/* Focus styles for accessibility */
*:focus-visible {
    outline: 2px solid var(--green);
    outline-offset: 2px;
}

/* Selection color */
::selection {
    background: var(--green);
    color: #fff;
}

/* Page load animation */
.page-content {
    animation: pageFadeIn 0.6s ease-out;
}

@keyframes pageFadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Prevent layout shift on images */
img {
    max-width: 100%;
    height: auto;
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
    will-change: opacity;
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
        radial-gradient(1.5px 1.5px at 50px 160px, var(--green-light), rgba(0,0,0,0));
    background-size: 300px 300px;
    opacity: 0.25;
    animation: drift 120s linear infinite;
    will-change: transform;
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
    will-change: opacity;
}

.sakura-container.active {
    opacity: 1;
}

/* Sakura Particles - Optimized */
.sakura {
    position: absolute;
    width: 12px;
    height: 12px;
    background: radial-gradient(circle, #ffb7c5 0%, #ff91a4 100%);
    border-radius: 50%;
    opacity: 0.7;
    animation: falling 12s linear forwards;
    transform: translateZ(0);
}

@keyframes falling {
    0% {
        transform: translateY(-20px) translateX(0);
        opacity: 0;
    }
    10% {
        opacity: 0.7;
    }
    90% {
        opacity: 0.7;
    }
    100% {
        transform: translateY(100vh) translateX(50px);
        opacity: 0;
    }
}

/* Reduced motion preference */
@media (prefers-reduced-motion: reduce) {
    .sakura { animation: none; opacity: 0; }
    .starfield { animation: none; }
    .nebula { animation: none; }
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
.nav-wrapper {
    position: sticky;
    top: 0;
    z-index: 200;
    display: flex;
    justify-content: center;
    padding: 8px 32px;
    pointer-events: none;
}

.navbar {
    pointer-events: all;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 1280px;
    padding: 6px 8px 6px 24px;
    border-radius: 100px;
    background: rgba(10, 18, 36, 0.7);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 8px 32px rgba(0,0,0,0.4), inset 0 1px 0 rgba(255,255,255,0.06);
    transition: padding 0.4s cubic-bezier(0.22,1,0.36,1),
                box-shadow 0.4s ease,
                background 0.4s ease;
    contain: layout style;
}

body:not(.dark-mode) .navbar {
    background: rgba(255, 252, 248, 0.82);
    border: 1px solid rgba(0,0,0,0.07);
    box-shadow: 0 8px 32px rgba(0,0,0,0.10), inset 0 1px 0 rgba(255,255,255,0.9);
}

/* Shrink state on scroll */
.navbar.scrolled {
    padding: 4px 6px 4px 22px;
    background: rgba(6, 12, 26, 0.88);
    box-shadow: 0 12px 40px rgba(0,0,0,0.55), inset 0 1px 0 rgba(255,255,255,0.05);
}
body:not(.dark-mode) .navbar.scrolled {
    background: rgba(255, 252, 248, 0.95);
    box-shadow: 0 8px 30px rgba(0,0,0,0.13);
}

/* Brand */
.navbar-brand {
    display: flex;
    align-items: center;
    gap: 9px;
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 17px;
    letter-spacing: 0.2px;
    background: linear-gradient(100deg, var(--text) 50%, var(--green-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-decoration: none;
    transition: filter 0.3s;
    white-space: nowrap;
}

.brand-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--green);
    box-shadow: 0 0 8px var(--green-glow);
    flex-shrink: 0;
    animation: dotPulse 2.5s ease-in-out infinite;
}

@keyframes dotPulse {
    0%, 100% { box-shadow: 0 0 6px var(--green-glow); opacity: 1; }
    50%       { box-shadow: 0 0 14px var(--green-glow); opacity: 0.75; }
}

.navbar-brand:hover {
    filter: drop-shadow(0 0 10px var(--green-glow));
}

/* Nav links — centre pill group */
.nav-links {
    display: flex;
    align-items: center;
    gap: 4px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.06);
    border-radius: 100px;
    padding: 4px 6px;
}

body:not(.dark-mode) .nav-links {
    background: rgba(0,0,0,0.04);
    border-color: rgba(0,0,0,0.06);
}

.nav-links a {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
    text-decoration: none;
    padding: 7px 16px;
    border-radius: 100px;
    transition: color 0.25s, background 0.25s;
    letter-spacing: 0.2px;
    white-space: nowrap;
}

.nav-links a:hover {
    color: var(--text);
    background: rgba(255,255,255,0.07);
}

body:not(.dark-mode) .nav-links a:hover {
    background: rgba(0,0,0,0.06);
    color: var(--text);
}

.nav-links a.active {
    color: var(--bg);
    background: var(--green);
    font-weight: 700;
}

body:not(.dark-mode) .nav-links a.active {
    color: #fff;
}

/* Right controls */
.nav-right {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Theme Toggle */
.theme-toggle {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
    flex-shrink: 0;
}

.theme-toggle:hover {
    background: var(--green-dim);
    border-color: var(--green);
    transform: scale(1.08);
}

.theme-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 18px;
    height: 18px;
}
.theme-icon-sun  { display: none; }
.theme-icon-moon { display: flex; }
body.dark-mode .theme-icon-sun  { display: flex; }
body.dark-mode .theme-icon-moon { display: none; }

/* CTA pill button */
.nav-cta {
    font-family: var(--font-display);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.4px;
    padding: 9px 22px;
    border-radius: 100px;
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: #fff !important;
    -webkit-text-fill-color: #fff !important;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    transition: all 0.3s;
    box-shadow: 0 4px 16px var(--green-glow);
}
.nav-cta:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 24px var(--green-glow);
}
.nav-cta svg { flex-shrink: 0; }

/* Hamburger */
.nav-hamburger {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    cursor: pointer;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 50%;
    width: 36px;
    height: 36px;
    align-items: center;
    padding: 0;
    z-index: 210;
}

.nav-hamburger span {
    display: block;
    width: 16px;
    height: 1.5px;
    background: var(--text);
    border-radius: 2px;
    transition: all 0.3s;
}

.nav-hamburger.open span:nth-child(1) { transform: translateY(6.5px) rotate(45deg); }
.nav-hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
.nav-hamburger.open span:nth-child(3) { transform: translateY(-6.5px) rotate(-45deg); }

/* Mobile drawer */
.mobile-drawer {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(2, 6, 23, 0.92);
    backdrop-filter: blur(24px);
    z-index: 190;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 32px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s, background 0.5s ease;
}

body:not(.dark-mode) .mobile-drawer {
    background: rgba(254, 249, 243, 0.96);
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

.drawer-close {
    position: absolute;
    top: 20px; right: 20px;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 50%;
    width: 40px; height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 18px;
    color: var(--text);
    transition: all 0.3s;
}
.drawer-close:hover {
    background: var(--green-dim);
    border-color: var(--green);
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
    .nav-wrapper { padding: 12px 20px; }
    .hero, .portfolio, .experience { padding: 60px 40px; }
    h2 { font-size: 36px; }
}

/* Mobile */
@media (max-width: 768px) {
    .nav-wrapper { padding: 12px 14px; }
    .navbar { padding: 8px 8px 8px 16px; border-radius: 100px; }
    .nav-links { display: none; }
    .desktop-cta { display: none !important; }
    .nav-hamburger { display: flex; }
    .hero, .portfolio, .experience { padding: 40px 16px; }
    h2 { font-size: 28px; margin-bottom: 24px; }
    .section-label { font-size: 10px; letter-spacing: 2px; }
    .nebula { width: 300px; height: 300px; opacity: 0.2; }
}

@media (max-width: 420px) {
    .nav-wrapper { padding: 10px 10px; }
    .hero, .portfolio, .experience { padding: 32px 14px; }
}
    
/* ── Navbar slide-down on load ── */
.nav-wrapper {
    animation: navSlideDown 0.7s cubic-bezier(0.22,1,0.36,1) both;
}
@keyframes navSlideDown {
    from { transform: translateY(-120%); opacity: 0; }
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

body:not(.dark-mode) .footer-social a {
    background: rgba(0, 0, 0, 0.04);
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

/* ── Scroll Progress Bar ── */
.scroll-progress {
    position: fixed;
    top: 0;
    left: 0;
    height: 3px;
    width: 0%;
    background: linear-gradient(90deg, var(--green), var(--green-light));
    z-index: 9999;
    transition: width 0.1s linear;
}

/* ── Back to Top Button ── */
.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--bg-card);
    backdrop-filter: blur(12px);
    border: 1px solid var(--border);
    color: var(--green);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top:hover {
    background: var(--green);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px var(--green-glow);
}

body:not(.dark-mode) .back-to-top {
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

body:not(.dark-mode) .back-to-top:hover {
    box-shadow: 0 8px 25px rgba(236, 72, 153, 0.3);
}

@media (max-width: 768px) {
    .back-to-top {
        bottom: 20px;
        right: 20px;
        width: 42px;
        height: 42px;
    }
}

</style>
</head>
<body>
    {{-- Set dark mode class immediately to prevent FOUC --}}
    <script>
        (function() {
            /* Sync dark-mode class from <html> (already set above) to <body> */
            var isDark = document.documentElement.classList.contains('dark-mode');
            document.body.classList.toggle('dark-mode', isDark);
        })();
    </script>
    
    {{-- Loading Screen --}}
    <div class="loading-screen" id="loading-screen">
        <div style="text-align:center">
            <div style="margin-bottom:16px">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
            </div>
            <div style="color:#4ade80;font-weight:700">Loading...</div>
        </div>
    </div>
    
    {{-- Galaxy (Dark Mode Background) --}}
    <div class="galaxy-container" id="galaxy-bg">
        <div class="starfield"></div>
    </div>
    
    {{-- Sakura (Light Mode Background) --}}
    <div class="sakura-container" id="sakura-container"></div>

    {{-- Scroll Progress Bar --}}
    <div class="scroll-progress" id="scroll-progress"></div>

    {{-- Back to Top Button --}}
    <button class="back-to-top" id="back-to-top" aria-label="Back to top">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    {{-- Mobile Drawer --}}
    <div class="mobile-drawer" id="mobile-drawer" @click.self="closeDrawer()">
        <button class="drawer-close" onclick="closeDrawer()" aria-label="Close menu">✕</button>
        <a href="{{ route('home') }}#work"       onclick="closeDrawer()">Work</a>
        <a href="{{ route('home') }}#experience" onclick="closeDrawer()">Experience</a>
        <a href="{{ route('contact') }}"           onclick="closeDrawer()">Contact</a>
    </div>

    <div class="nav-wrapper">
        <nav class="navbar" id="navbar">
            {{-- Brand --}}
            <a href="{{ route('home') }}" class="navbar-brand">
                <span class="brand-dot"></span>
                Balasaravanan
            </a>

            {{-- Centre nav links --}}
            <div class="nav-links">
                <a href="{{ route('home') }}#work">Work</a>
                <a href="{{ route('home') }}#experience">Experience</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>

            {{-- Right side controls --}}
            <div class="nav-right">
                {{-- Theme Toggle --}}
                <button
                    class="theme-toggle"
                    id="theme-toggle-btn"
                    aria-label="Toggle theme"
                    onclick="(function(){
                        var isDark = !document.body.classList.contains('dark-mode');
                        document.body.classList.toggle('dark-mode', isDark);
                        document.documentElement.classList.toggle('dark-mode', isDark);
                        localStorage.setItem('darkMode', String(isDark));
                    })()"
                >
                    <span class="theme-icon theme-icon-sun">
                        <x-heroicon-o-sun class="w-5 h-5" />
                    </span>
                    <span class="theme-icon theme-icon-moon">
                        <x-heroicon-o-moon class="w-5 h-5" />
                    </span>
                </button>

                {{-- CTA button (desktop only) --}}
                <a href="{{ route('contact') }}" class="nav-cta desktop-cta">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                    Get In Touch
                </a>

                {{-- Hamburger (mobile only) --}}
                <button class="nav-hamburger" id="hamburger" aria-label="Toggle menu" onclick="toggleDrawer()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
    </div>

    <main class="page-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <span class="navbar-brand">Balasaravanan</span>
                <p>UI/UX Designer & Laravel Developer</p>
            </div>
            <div class="footer-links">
                <a href="{{ route('home') }}#work">Work</a>
                <a href="{{ route('home') }}#experience">Experience</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="footer-social">
                <a href="https://linkedin.com/in/balasaravanan-s-366365235" aria-label="LinkedIn" class="social-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                </a>
                <a href="https://github.com/Balasad" aria-label="GitHub" class="social-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                </a>
                <a href="https://x.com/Balasad_" aria-label="X (Twitter)" class="social-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Balasaravanan S. Built with Laravel & Livewire</p>
        </div>
    </footer>

    <script>
    // Remove loading screen immediately
    (function() {
        var loader = document.getElementById('loading-screen');
        if (loader) {
            loader.style.opacity = '0';
            loader.style.pointerEvents = 'none';
            setTimeout(function() { loader.remove(); }, 500);
        }
    })();
    
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
    
    // Scroll Progress Bar
    const scrollProgress = document.getElementById('scroll-progress');
    const backToTop = document.getElementById('back-to-top');
    
    function updateScrollUI() {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        if (scrollProgress) {
            scrollProgress.style.width = scrollPercent + '%';
        }
        
        if (backToTop) {
            if (scrollTop > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        }
    }
    
    window.addEventListener('scroll', updateScrollUI, { passive: true });
    
    if (backToTop) {
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // Navbar scroll-shrink
    const navbar = document.getElementById('navbar');
    function updateNavScroll() {
        if (window.scrollY > 40) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    window.addEventListener('scroll', updateNavScroll, { passive: true });
    updateNavScroll();

    // Active nav link highlight on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a');

    function updateActiveNav() {
        const scrollY = window.scrollY + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', updateActiveNav, { passive: true });
    
    // Background Effects - Galaxy (Dark) & Sakura (Light)
    let sakuraActive = false;
    let sakuraInterval = null;
    
    function updateBackgroundEffects() {
        const galaxy = document.getElementById('galaxy-bg');
        const sakura = document.getElementById('sakura-container');
        const isDark = document.body.classList.contains('dark-mode');
        
        if (galaxy) galaxy.classList.toggle('active', isDark);
        if (sakura) sakura.classList.toggle('active', !isDark);
        
        if (isDark) {
            stopSakura();
        } else {
            startSakura();
        }
    }
    
    function createSakura() {
        const container = document.getElementById('sakura-container');
        if (!container || document.body.classList.contains('dark-mode')) return;
        
        if (container.children.length > 15) return;
        
        const petal = document.createElement('div');
        petal.className = 'sakura';
        petal.style.left = Math.random() * 100 + '%';
        petal.style.animationDuration = (Math.random() * 6 + 8) + 's';
        petal.style.opacity = Math.random() * 0.4 + 0.4;
        petal.style.width = (Math.random() * 6 + 10) + 'px';
        petal.style.height = petal.style.width;
        
        container.appendChild(petal);
        
        setTimeout(() => petal.remove(), 14000);
    }
    
    function startSakura() {
        if (sakuraActive) return;
        sakuraActive = true;
        createSakura();
        createSakura();
        createSakura();
        sakuraInterval = setInterval(createSakura, 3000);
    }
    
    function stopSakura() {
        sakuraActive = false;
        if (sakuraInterval) {
            clearInterval(sakuraInterval);
            sakuraInterval = null;
        }
    }
    
    // Initial background setup
    updateBackgroundEffects();
    
    // Watch for theme changes
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                updateBackgroundEffects();
            }
        });
    });
    
    observer.observe(document.body, { attributes: true });
    </script>
    {{-- Livewire Scripts --}}
    @livewireScripts
    {{-- Blade UI Kit Scripts --}}
    @bukScripts(true)

    {{-- NOTE: Theme is controlled by the pure-JS onclick on #theme-toggle-btn above.
         Alpine store removed — it was conflicting with the button handler on production. --}}

    <style>
    .nav-wrapper {
        display: flex !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    .page-content {
        display: block !important;
    }
    body {
        display: block !important;
    }
    </style>
</body>
</html>