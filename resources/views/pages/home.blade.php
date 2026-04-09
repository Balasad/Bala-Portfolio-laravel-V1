@extends('layouts.app')

@section('title', 'Balasaravanan S — UI/UX Designer & Laravel Developer')
@section('og_title', 'Balasaravanan S — Portfolio')
@section('og_description', 'UI/UX Designer and Full Stack Developer specializing in enterprise web applications with Laravel, Livewire, and modern design tools.')
@section('og_image', asset('images/og-cover.png'))

@section('content')

{{-- ── Hero Section ── --}}
<section class="hero">
    <div class="nebula" style="right: -100px; top: 0;"></div>

    <div class="hero-text">
        <p class="eyebrow anim-fade" style="--d:0.1s" data-aos="fade-up">UI/UX Designer · Laravel Developer · Creative Designer</p>
        <h1 class="anim-fade" style="--d:0.25s" data-aos="fade-up" data-aos-delay="100">Hi, I'm <span class="name">Balasaravanan S</span></h1>
        <p class="hero-desc anim-fade" style="--d:0.4s" data-aos="fade-up" data-aos-delay="200">UI/UX Designer and Web Developer based in Chennai — designing intuitive interfaces in Figma, building responsive apps with Laravel, and crafting immersive visuals in Blender & Illustrator.</p>
        <div class="hero-meta anim-fade" style="--d:0.55s" data-aos="fade-up" data-aos-delay="300">
            <span class="meta-chip">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Chennai, India
            </span>
            <span class="meta-chip">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                Available for Work
            </span>
            <span class="meta-chip">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                B.E. CSE
            </span>
        </div>
        <div class="hero-actions anim-fade" style="--d:0.7s" data-aos="fade-up" data-aos-delay="400">
            <a href="#work" class="btn">View My Work</a>
            <a href="{{ asset('Bala_Saravanan_Resume.pdf') }}" download class="btn-outline">Download CV</a>
        </div>
    </div>

    <div class="hero-image anim-slide-right" data-aos="fade-left" data-aos-delay="200">
        <img 
            src="{{ asset('images/profile.png') }}" 
            alt="Balasaravanan S — Profile"
            loading="eager"
            fetchpriority="high"
            decoding="async"
            class="w-full h-auto"
        >
    </div>
</section>

{{-- ── Statistics Section ── --}}
<section class="stats-section" id="stats">
    <div class="stats-container">
        <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
            <div class="stat-number" data-count="1">0</div>
            <div class="stat-label">Years Experience</div>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
            </div>
            <div class="stat-number" data-count="25">0</div>
            <div class="stat-label">Projects Completed</div>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            </div>
            <div class="stat-number" data-count="15">0</div>
            <div class="stat-label">Animations and Graphics</div>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
            </div>
            <div class="stat-number" data-count="10">0</div>
            <div class="stat-label">Technologies</div>
        </div>
    </div>
</section>

{{-- ── Portfolio / Arc Section ── --}}
<section class="portfolio" id="work" data-aos="fade-up">
    <p class="section-label" data-aos="fade-up" data-aos-delay="100">Selected Works</p>
    <h2 data-aos="fade-up" data-aos-delay="150">Featured Projects</h2>

    <div class="arc-section">
        <div class="arc-card">
            <div class="arc-stage" id="arc-stage">
                <canvas id="arc-cv"></canvas>
                <div class="nodes-layer" id="nodes-layer"></div>
            </div>
            <div class="arc-projects-area" id="arc-proj-area"></div>
        </div>
    </div>
</section>

{{-- ── Experience Section ── --}}
<section class="experience" id="experience" data-aos="fade-up">
    <p class="section-label" data-aos="fade-up" data-aos-delay="100">Professional Background</p>
    <h2 data-aos="fade-up" data-aos-delay="150">UI/UX Designer & Full Stack Developer</h2>

    <div class="exp-timeline">
        <div class="exp-card reveal-card" data-aos="fade-up" data-aos-delay="300">
            <div class="exp-badge">CURRENT</div>
            <div class="exp-glow"></div>
            <div class="exp-header">
                <div class="exp-title">
                    <h3>E-commerce Platform — Current Project</h3>
                    <span class="company">Build from Scratch | 2026</span>
                </div>
            </div>
            <div class="exp-body">
                <p>Building a modern <strong>full-featured e-commerce platform</strong> from scratch using <strong>Laravel 12</strong>, <strong>Filament Admin</strong>, and reactive <strong>Livewire components</strong> — combining powerful backend administration with intuitive user experiences.</p>
                <ul>
                    <li>Architected <strong>admin dashboard</strong> with <strong>Filament</strong> for product management, order processing, inventory tracking, and analytics.</li>
                    <li>Implemented <strong>third-party authentication</strong> via <strong>Socialite</strong> (Google, GitHub, social login integrations).</li>
                    <li>Built reactive <strong>shopping cart & checkout</strong> with <strong>Livewire</strong> components for real-time interactions.</li>
                    <li>Configured automated <strong>backup strategy</strong> with <strong>Spatie Backup</strong> for data security and disaster recovery.</li>
                    <li>Develop responsive frontend with <strong>Alpine.js</strong> for enhanced interactivity and <strong>Tailwind CSS</strong> for modern design.</li>
                </ul>
                <div class="badge-row">
                    <span class="badge">Laravel 12</span>
                    <span class="badge">Filament</span>
                    <span class="badge">Livewire</span>
                    <span class="badge">Socialite</span>
                    <span class="badge">Alpine.js</span>
                    <span class="badge">Tailwind CSS</span>
                    <span class="badge">Spatie Backup</span>
                </div>
            </div>
        </div>

        <div class="exp-card reveal-card" data-aos="fade-up" data-aos-delay="400">
            <div class="exp-badge">PARALLEL</div>
            <div class="exp-glow"></div>
            <div class="exp-header">
                <div class="exp-title">
                    <h3>Enterprise ERP System — Active Development</h3>
                    <span class="company">Multi-tenant Architecture | March 2025 — Present</span>
                </div>
            </div>
            <div class="exp-body">
                <p>Building comprehensive <strong>Enterprise Resource Planning</strong> systems using <strong>Laravel 12</strong> and <strong>PHP 8.2</strong> — architecting scalable solutions for businesses of all sizes with proven stability and performance.</p>
                <ul>
                    <li>Developed <strong>17 integrated modules</strong>: CRM Pipeline, HR Management, Inventory, Finance, Support Tickets, and Vendor Management.</li>
                    <li>Built drag-and-drop <strong>Kanban pipeline</strong> for sales automation with real-time stage updates.</li>
                    <li>Implemented <strong>multi-tenancy architecture</strong> with role-based access control for 26+ organizations.</li>
                    <li>Created <strong>90+ RESTful controllers</strong> and <strong>400+ API routes</strong> with optimized database queries.</li>
                </ul>
                <div class="badge-row">
                    <span class="badge">Laravel 12</span>
                    <span class="badge">PHP 8.2</span>
                    <span class="badge">MySQL</span>
                    <span class="badge">CRM</span>
                    <span class="badge">Multi-tenancy</span>
                    <span class="badge">REST API</span>
                </div>
            </div>
        </div>

        <div class="exp-card active reveal-card" data-aos="fade-up" data-aos-delay="200">
            <div class="exp-badge">PRIMARY</div>
            <div class="exp-glow"></div>
            <div class="exp-header">
                <div class="exp-title">
                    <h3>UI/UX Designer & Digital Specialist</h3>
                    <span class="company">TeraMed Academy Platform | Digital Publishing</span>
                </div>
            </div>
            <div class="exp-body">
                <p>Designed intuitive, user-centered interfaces and created comprehensive visual systems while managing digital publishing workflows for major educational platforms.</p>
                <ul>
                    <li>Designed complete <strong>UI/UX in Figma</strong>, creating user-centered interface prototypes and design systems.</li>
                    <li>Developed custom icons and visual assets using <strong>Photoshop & Illustrator</strong> for brand consistency.</li>
                    <li>Converted PDF educational materials to structured Word documents using <strong>ABBYY FineReader OCR</strong>.</li>
                    <li>Performed quality assurance comparing OCR output against PDFs; prepared content for <strong>XML & EPUB publishing</strong> workflows.</li>
                </ul>
                <div class="badge-row">
                    <span class="badge">Figma</span>
                    <span class="badge">Photoshop</span>
                    <span class="badge">Illustrator</span>
                    <span class="badge">ABBYY FineReader</span>
                    <span class="badge">OCR</span>
                    <span class="badge">XML</span>
                    <span class="badge">EPUB</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── Skills Section (Livewire) ── --}}
@livewire('skills-section')

<style>
/* ════════════════════════════════════
   STATISTICS
════════════════════════════════════ */
.stats-section {
    position: relative;
    z-index: 1;
    padding: 40px 80px;
    content-visibility: auto;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    max-width: 1000px;
    margin: 0 auto;
    background: var(--bg-card);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    border: 1px solid var(--border);
    padding: 40px;
}

body:not(.dark-mode) .stats-container {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 32px rgba(0,0,0,0.08);
}

.stat-item {
    text-align: center;
    padding: 16px;
    position: relative;
}

.stat-item:not(:last-child)::after {
    content: '';
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 1px;
    height: 60%;
    background: var(--border);
}

.stat-icon {
    display: flex;
    justify-content: center;
    margin-bottom: 12px;
    color: var(--green);
}

.stat-number {
    font-family: var(--font-display);
    font-size: 42px;
    font-weight: 900;
    background: linear-gradient(135deg, var(--green-light), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 13px;
    color: var(--text-muted);
    font-weight: 500;
    letter-spacing: 0.5px;
}

@media (max-width: 768px) {
    .stats-section {
        padding: 24px 16px;
    }
    .stats-container {
        grid-template-columns: repeat(2, 1fr);
        padding: 24px;
        gap: 16px;
    }
    .stat-item::after {
        display: none;
    }
    .stat-number {
        font-size: 32px;
    }
}

/* ════════════════════════════════════
   HERO
════════════════════════════════════ */
.hero {
    display: flex;
    align-items: center;
    gap: 60px;
    min-height: 90vh;
}

.hero-text { flex: 1; z-index: 2; }

.eyebrow {
    font-size: 12px;
    font-weight: 500;
    color: var(--text-muted);
    letter-spacing: 0.3px;
    margin-bottom: 8px;
    word-break: break-word;
    overflow-wrap: break-word;
}

.hero-text h1 {
    font-size: clamp(28px, 7vw, 58px);
    font-weight: 900;
    line-height: 1.15;
    margin: 10px 0;
    word-break: break-word;
    overflow-wrap: break-word;
}

.hero-text .name {
    background: linear-gradient(90deg, var(--green-light), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-desc {
    color: var(--text-muted);
    line-height: 1.7;
    max-width: 520px;
    margin-bottom: 4px;
}

.hero-meta {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    gap: 10px;
    margin: 20px 0;
    min-width: 0;
}

.meta-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,0.05);
    border: 1px solid var(--border);
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 13px;
    white-space: nowrap;
    flex-shrink: 0;
}

body:not(.dark-mode) .meta-chip {
    background: rgba(0, 0, 0, 0.04);
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 16px;
    margin-top: 8px;
}

.btn-outline {
    border: 2px solid var(--green);
    padding: 9px 24px;
    border-radius: 30px;
    color: var(--text);
    text-decoration: none;
    font-weight: 700;
    font-size: 13px;
    transition: 0.3s;
    white-space: nowrap;
}
.btn-outline:hover { background: var(--green-dim); }

.hero-image {
    flex-shrink: 0;
    display: flex;
    justify-content: center;
}
.hero-image img {
    width: 420px;
    max-width: 100%;
    filter: drop-shadow(0 0 40px var(--green-glow));
    will-change: transform;   /* float animation — keep on GPU */
}

/* ════════════════════════════════════
   ARC PORTFOLIO
════════════════════════════════════ */
.arc-card {
    background: var(--bg-card);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    border: 1px solid var(--border);
    padding: 20px 0 60px;
    position: relative;
    overflow: hidden;
    contain: layout style;
}

body:not(.dark-mode) .arc-card {
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}

.arc-stage {
    position: relative;
    width: 100%;
    height: 400px;
    min-height: 400px;
    display: flex;
    justify-content: center;
    touch-action: pan-y;
}

#arc-cv {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
    will-change: contents;   /* hint browser this canvas repaints frequently */
}

.nodes-layer {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
}

.arc-node-bg {
    border-radius: 50%;
    background: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid rgba(0,0,0,0.1);
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

body.dark-mode .arc-node-bg {
    border: 2px solid rgba(255,255,255,0.2);
    box-shadow: 0 4px 20px rgba(0,0,0,0.5);
}

.arc-node-wrap.active .arc-node-bg {
    background: #ffffff;
    box-shadow: 0 0 30px var(--green-glow);
    border: 3px solid var(--green);
}

body.dark-mode .arc-node-wrap.active .arc-node-bg {
    box-shadow: 0 0 30px var(--green-glow);
}

.arc-node-label {
    position: absolute;
    top: 110%;
    left: 50%;
    transform: translateX(-50%);
    font-size: 11px;
    font-weight: 900;
    color: var(--text-muted);
    letter-spacing: 1px;
    white-space: nowrap;
    text-shadow: none;
}

.arc-proj-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 0 24px;
    animation: fadeInUp 0.6s;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.arc-proj-card {
    height: 200px;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--border);
    background: rgba(255,255,255,0.05);
}

body:not(.dark-mode) .arc-proj-card {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.arc-proj-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}
.arc-proj-card:hover img { transform: scale(1.05); }

/* ════════════════════════════════════
   EXPERIENCE
═══════════════════════════════════ */
.exp-timeline { display: flex; flex-direction: column; gap: 20px; }

.exp-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 40px;
    position: relative;
    overflow: hidden;
    transition: border-color 0.4s, transform 0.4s;
    contain: layout style;
}
.exp-card:hover { border-color: var(--green); transform: translateY(-5px); }

body:not(.dark-mode) .exp-card {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
}

.exp-glow {
    position: absolute;
    top: 0; right: 0;
    width: 200px; height: 200px;
    background: radial-gradient(circle, var(--green-dim), transparent 70%);
    opacity: 0.5;
    pointer-events: none;
}

.exp-badge {
    position: absolute;
    top: 16px;
    right: 24px;
    background: var(--green);
    color: white;
    padding: 4px 12px;
    border-radius: 8px;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    z-index: 5;
}

.exp-card:nth-child(3) .exp-badge {
    background: rgba(100, 116, 139, 0.8);
    color: rgba(255, 255, 255, 0.9);
}

.exp-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 25px;
}

.exp-title h3 { font-size: 22px; color: var(--green-light); }
.exp-title .company { font-size: 14px; color: var(--text-muted); margin-top: 4px; display: block; }

.exp-date {
    font-weight: 700;
    color: var(--text-muted);
    opacity: 0.8;
    font-size: 13px;
    white-space: nowrap;
}

.exp-body p { margin-bottom: 15px; line-height: 1.7; color: var(--text-muted); }

.exp-body ul { list-style: none; margin-bottom: 20px; }
.exp-body li {
    position: relative;
    padding-left: 22px;
    margin-bottom: 10px;
    color: var(--text);
    font-size: 15px;
    line-height: 1.6;
}
.exp-body li::before { content: '→'; position: absolute; left: 0; color: var(--green); }

.badge-row { display: flex; flex-wrap: wrap; gap: 8px; }
.badge {
    background: var(--green-dim);
    border: 1px solid var(--green);
    color: var(--green);
    padding: 5px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 700;
}

body:not(.dark-mode) .exp-body li {
    color: var(--text);
}

body:not(.dark-mode) .badge {
    background: var(--green-dim);
    color: var(--green);
}

/* ════════════════════════════════════
   RESPONSIVE — TABLET (≤ 1024px)
═══════════════════════════════════ */
@media (max-width: 1024px) {
    .hero { gap: 40px; }
    .hero-image img { width: 320px; }

    .arc-stage { height: 340px; }
    .arc-proj-grid { grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .arc-proj-card { height: 160px; }

    .exp-card { padding: 30px; }
    .exp-title h3 { font-size: 20px; }
}

/* ════════════════════════════════════
   RESPONSIVE — MOBILE (≤ 768px)
═══════════════════════════════════ */
@media (max-width: 768px) {
    /* Hero: stack vertically, centred */
    .hero {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 24px;
        min-height: unset;
        padding-top: 40px;
        padding-bottom: 48px;
        overflow: hidden;
    }

    /* Text container must not exceed viewport */
    .hero-text {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        min-width: 0;
    }

    /* clamp keeps name on one line and never overflows */
    .hero-text h1 {
        font-size: clamp(22px, 8vw, 38px);
        white-space: normal;
        word-break: break-word;
        overflow-wrap: break-word;
    }

    .hero-desc {
        font-size: 14px;
        max-width: 100%;
    }

    /* Image: above the text, smaller */
    .hero-image {
        width: 100%;
        justify-content: center;
        order: -1;
    }
    .hero-image img { width: 180px; }

    .hero-meta { 
        justify-content: center; 
        gap: 8px; 
        padding: 0 10px;
    }
    .meta-chip { 
        font-size: 11px; 
        padding: 5px 11px; 
    }

    .hero-actions { justify-content: center; }

    /* Arc */
    .arc-stage { height: 260px; }

    .arc-proj-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        padding: 0 12px;
    }
    .arc-proj-card { height: 130px; border-radius: 14px; }

    /* Experience */
    .exp-card { padding: 22px 18px; }

    .exp-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
        margin-bottom: 16px;
    }

    .exp-date { white-space: normal; font-size: 12px; }
    .exp-title h3 { font-size: 17px; }
    .exp-body li { font-size: 14px; }
}

/* ════════════════════════════════════
   RESPONSIVE — SMALL MOBILE (≤ 420px)
═══════════════════════════════════ */
@media (max-width: 420px) {
    .hero-image img { width: 150px; }

    .hero-meta {
        justify-content: center;
        gap: 6px;
    }
    .meta-chip {
        font-size: 10px;
        padding: 4px 8px;
    }
    .meta-chip svg {
        width: 12px;
        height: 12px;
    }

    .arc-stage { height: 220px; }
    .arc-proj-grid { gap: 8px; padding: 0 10px; }
    .arc-proj-card { height: 110px; border-radius: 12px; }

    .exp-card { padding: 18px 14px; }
}

/* ════════════════════════════════════
   ANIMATIONS
═══════════════════════════════════ */

/* ── 1. Page-load fade-up (hero text) ── */
.anim-fade {
    opacity: 0;
    transform: translateY(28px);
    animation: animFadeUp 0.75s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    animation-delay: var(--d, 0s);
}
@keyframes animFadeUp {
    to { opacity: 1; transform: translateY(0); }
}

/* ── 2. Hero image slides in from right ── */
.anim-slide-right {
    opacity: 0;
    transform: translateX(60px);
    animation: animSlideRight 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.3s forwards;
}
@keyframes animSlideRight {
    to { opacity: 1; transform: translateX(0); }
}

/* ── 3. Scroll reveal — for cards/elements (NOT full sections) ── */
.reveal-card {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.75s cubic-bezier(0.22,1,0.36,1),
                transform 0.75s cubic-bezier(0.22,1,0.36,1);
}
.reveal-card.revealed {
    opacity: 1;
    transform: translateY(0);
}

/* ── 4. Profile image float ── */
.hero-image img {
    animation: floatImg 5s ease-in-out infinite;
}
@keyframes floatImg {
    0%, 100% { transform: translateY(0px);   }
    50%       { transform: translateY(-14px); }
}

/* ── 5. Green name gradient shimmer ── */
.hero-text .name {
    background: linear-gradient(90deg,
        var(--green-light) 0%,
        #86efac         30%,
        var(--green)     60%,
        var(--green-light) 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: nameShimmer 3s linear infinite;
}
@keyframes nameShimmer {
    to { background-position: 200% center; }
}

/* ── 6. Badge shimmer sweep ── */
.badge {
    position: relative;
    overflow: hidden;
}
.badge::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(105deg,
        transparent 40%,
        rgba(255,255,255,0.15) 50%,
        transparent 60%);
    transform: translateX(-100%);
    animation: badgeSweep 2.5s ease-in-out infinite;
}
@keyframes badgeSweep {
    0%   { transform: translateX(-100%); }
    60%  { transform: translateX(200%); }
    100% { transform: translateX(200%); }
}

/* ── 7. Meta chips pop-in staggered ── */
.meta-chip {
    opacity: 0;
    transform: scale(0.85);
    animation: chipPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards;
}
.meta-chip:nth-child(1) { animation-delay: 0.75s; }
.meta-chip:nth-child(2) { animation-delay: 0.9s; }
.meta-chip:nth-child(3) { animation-delay: 1.05s; }
@keyframes chipPop {
    to { opacity: 1; transform: scale(1); }
}

/* ── 8. Navbar link underline slide ── */
.nav-links a {
    position: relative;
}
.nav-links a::after {
    content: '';
    position: absolute;
    bottom: -3px; left: 0;
    width: 0; height: 2px;
    background: var(--green-light);
    border-radius: 2px;
    transition: width 0.3s cubic-bezier(0.22,1,0.36,1);
}
.nav-links a:hover::after { width: 100%; }

/* ── 9. Btn pulse glow on hover ── */
.btn {
    position: relative;
    overflow: hidden;
}
.btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center,
        rgba(255,255,255,0.2), transparent 70%);
    opacity: 0;
    transition: opacity 0.3s;
}
.btn:hover::before { opacity: 1; }

/* ── 10. Experience card active green border pulse ── */
.exp-card.active {
    border-color: rgba(34, 197, 94, 0.3);
    animation: cardBorderPulse 3s ease-in-out infinite;
}
@keyframes cardBorderPulse {
    0%, 100% { border-color: rgba(34,197,94,0.2); box-shadow: none; }
    50%       { border-color: rgba(34,197,94,0.5); box-shadow: 0 0 30px rgba(34,197,94,0.08); }
}

/* ── 11. Section label letter tracking animation ── */
.section-label {
    display: inline-block;
    opacity: 0;
    letter-spacing: 6px;
    transition: opacity 0.6s ease, letter-spacing 0.6s ease;
}
.section-label.label-visible {
    opacity: 1;
    letter-spacing: 3px;
}

/* ── 12. Custom cursor glow — uses transform only (no left/top) to avoid reflow ── */
#cursor-glow {
    pointer-events: none;
    position: fixed;
    top: 0; left: 0;
    width: 320px;
    height: 320px;
    border-radius: 50%;
    background: radial-gradient(circle,
        rgba(34,197,94,0.07) 0%,
        transparent 70%);
    will-change: transform;
    z-index: 0;
    mix-blend-mode: screen;
}

/* ── 13. Arc proj cards staggered on load ── */
.arc-proj-card {
    animation: none; /* reset — JS adds class */
}
.arc-proj-card.proj-in {
    animation: projCardIn 0.5s cubic-bezier(0.22,1,0.36,1) forwards;
    opacity: 0;
}
@keyframes projCardIn {
    from { opacity: 0; transform: translateY(20px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

/* ── Accessibility: honour system reduce-motion preference ── */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    .hero-image img { animation: none !important; }
    .starfield      { animation: none !important; }
    .nebula         { animation: none !important; }
    #cursor-glow    { display: none !important; }
}

</style>

<script>
(function () {
    const tools = [
        {
            id: 'ai',
            label: 'Illustrator',
            icon: "{{ asset('icons/illustrator.png') }}",
            iconPink: "{{ asset('icons/illustrator-pink.png') }}",
            projects: [
                { img: "{{ asset('images/illustrator/image_1.png') }}", link: "/project/erp-hris-module" },
                { img: "{{ asset('images/illustrator/image_2.png') }}", link: "#" },
                { img: "{{ asset('images/illustrator/image_3.png') }}", link: "#" },
            ]
        },
        {
            id: 'ps',
            label: 'Photoshop',
            icon: "{{ asset('icons/photoshop.png') }}",
            iconPink: "{{ asset('icons/photoshop-pink.png') }}",
            projects: [
                { img: "{{ asset('images/photoshop/poster_1.png') }}", link: "/project/crm-system" },
                { img: "{{ asset('images/photoshop/poster.png') }}", link: "#" },
                { img: "{{ asset('images/photoshop/poster.png') }}", link: "#" },
            ]
        },
        {
            id: 'blender',
            label: 'Blender',
            icon: "{{ asset('icons/blender.png') }}",
            iconPink: "{{ asset('icons/blender-pink.png') }}",
            projects: [
                { img: "{{ asset('images/blender/watch.png') }}", link: "/project/luxury-watch-render" },
                { img: "{{ asset('images/blender/space.png') }}", link: "#" },
                { img: "{{ asset('images/blender/flower.png') }}", link: "#" },
            ]
        },
        {
            id: 'ae',
            label: 'After Effects',
            icon: "{{ asset('icons/aftereffects.png') }}",
            iconPink: "{{ asset('icons/after-effects-pink.png') }}",
            projects: [
                { img: "{{ asset('images/3d.png') }}", link: "#" },
                { img: "{{ asset('images/3d.png') }}", link: "#" },
                { img: "{{ asset('images/3d.png') }}", link: "#" },
            ]
        },
        {
            id: 'figma',
            label: 'Figma',
            icon: "{{ asset('icons/figma.png') }}",
            iconPink: "{{ asset('icons/figma-pink.png') }}",
            projects: [
                { img: "{{ asset('images/figma/image_1.png') }}", link: "/project/crm-system" },
                { img: "{{ asset('images/figma/image_12.png') }}", link: "/project/erp-hris-module" },
                { img: "{{ asset('images/figma/image_13.png') }}", link: "#" },
            ]
        },
    ];

    let activeIdx  = 2;
    let rotation   = 0;
    let targetRot  = 0;
    let isDragging = false;
    let lastX      = 0;
    let rafID      = null;
    let _lastW = 0, _lastH = 0;

    const stage = document.getElementById('arc-stage');
    const layer = document.getElementById('nodes-layer');
    const cv    = document.getElementById('arc-cv');

    /* ── Force layout before drawing ── */
    function forceLayout() {
        void stage.offsetWidth;
        void cv.offsetWidth;
    }

    /* ── Pre-size canvas after layout is ready ── */
    function primeCanvas() {
        forceLayout();
        const W = stage.offsetWidth || stage.parentElement.offsetWidth;
        const H = stage.offsetHeight;
        if (!W || !H) {
            requestAnimationFrame(primeCanvas);
            return;
        }
        const dpr = window.devicePixelRatio || 1;
        cv.width  = W * dpr;
        cv.height = H * dpr;
        _lastW = W; _lastH = H;
    }

    /* ── Wait for DOM + images to be ready ── */
    function init() {
        forceLayout();
        primeCanvas();
        draw();
        renderProjects();
        startAnimation();
    }

    if (document.readyState === 'complete') {
        init();
    } else {
        window.addEventListener('load', init, { once: true });
    }

    /* ── RAF loop ── */
    function startAnimation() {
        function animate() {
            const delta = targetRot - rotation;
            rotation += delta * 0.1;
            if (Math.abs(delta) > 0.01 || isDragging) draw();
            rafID = requestAnimationFrame(animate);
        }
        animate();
    }

    function draw() {
        const W   = stage.offsetWidth;
        const H   = stage.offsetHeight;
        const dpr = window.devicePixelRatio || 1;

        /* Skip if stage has no size yet */
        if (!W || !H || W < 50 || H < 50) return;

        if (W !== _lastW || H !== _lastH) {
            cv.width  = W * dpr;
            cv.height = H * dpr;
            _lastW = W; _lastH = H;
        }
        const ctx = cv.getContext('2d');
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        ctx.clearRect(0, 0, W, H);

        const centerX  = W / 2;
        const centerY  = H * 1.5;
        const radius   = H * 1.15;
        const nodeSize = W < 480 ? 52 : W < 768 ? 62 : 75;

        layer.innerHTML = '';

        tools.forEach((t, i) => {
            const baseAngle    = 220 + (i * (100 / (tools.length - 1)));
            const angle        = (baseAngle + rotation) * (Math.PI / 180);
            const x            = centerX + radius * Math.cos(angle);
            const y            = centerY + radius * Math.sin(angle);
            const distFromApex = Math.abs((baseAngle + rotation) - 270);
            const scale        = Math.max(0.4, 1.4 - (distFromApex / 65));
            const opacity      = Math.max(0, 1.1 - (distFromApex / 60));

            const wrap = document.createElement('div');
            wrap.className = `arc-node-wrap ${distFromApex < 10 ? 'active' : ''}`;
            wrap.style.cssText = `position:absolute;left:${x}px;top:${y}px;opacity:${opacity};transform:translate(-50%,-50%) scale(${scale});cursor:pointer;z-index:20;`;

            const bg = document.createElement('div');
            bg.className  = 'arc-node-bg';
            bg.style.width = bg.style.height = nodeSize + 'px';
            const isDarkMode = document.body.classList.contains('dark-mode');
            const iconSrc = isDarkMode ? t.icon : t.iconPink;
            bg.innerHTML  = `<img src="${iconSrc}" style="width:65%;height:65%;object-fit:contain;" alt="${t.label}" loading="eager">`;

            const lbl = document.createElement('span');
            lbl.className   = 'arc-node-label';
            lbl.textContent = t.label;

            wrap.appendChild(bg);
            wrap.appendChild(lbl);
            wrap.addEventListener('click', () => {
                targetRot = 270 - baseAngle;
                if (activeIdx !== i) { activeIdx = i; renderProjects(); }
            });
            layer.appendChild(wrap);
        });

        /* Arc guide line */
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 210 * Math.PI / 180, 330 * Math.PI / 180);
        ctx.strokeStyle = 'rgba(34,197,94,0.15)';
        ctx.lineWidth   = 2;
        ctx.stroke();
    }

    /* Initial draw for dark mode (default) */
    draw();

    /* ── Drag / Touch ── */
    const startDrag = (x) => { isDragging = true; lastX = x; };
    const moveDrag  = (x) => { if (!isDragging) return; targetRot += (x - lastX) * 0.3; lastX = x; };
    const endDrag   = () => {
        if (!isDragging) return;
        isDragging = false;
        const closest = tools.reduce((best, _, i) => {
            const a = 220 + (i    * (100 / (tools.length - 1)));
            const b = 220 + (best * (100 / (tools.length - 1)));
            return Math.abs(270 - (a + targetRot)) < Math.abs(270 - (b + targetRot)) ? i : best;
        }, 0);
        targetRot = 270 - (220 + (closest * (100 / (tools.length - 1))));
        if (activeIdx !== closest) { activeIdx = closest; renderProjects(); }
    };

    stage.addEventListener('mousedown',  e => startDrag(e.pageX));
    window.addEventListener('mousemove', e => moveDrag(e.pageX), { passive: true });
    window.addEventListener('mouseup',   endDrag);
    stage.addEventListener('touchstart', e => { e.preventDefault(); startDrag(e.touches[0].pageX); }, { passive: false });
    stage.addEventListener('touchmove',  e => { e.preventDefault(); moveDrag(e.touches[0].pageX);  }, { passive: false });
    stage.addEventListener('touchend',   endDrag);

    /* ── Render project cards ── */
    function renderProjects() {
        const t    = tools[activeIdx];
        const area = document.getElementById('arc-proj-area');
        const frag = document.createDocumentFragment();
        const grid = document.createElement('div');
        grid.className = 'arc-proj-grid';

        t.projects.forEach(p => {
            const link = document.createElement('a');
            link.href = p.link || '#';
            link.style.textDecoration = 'none';
            link.style.display = 'block';

            const card = document.createElement('div');
            card.className = 'arc-proj-card';
            card.setAttribute('data-aos', 'zoom-in');
            const img = document.createElement('img');
            img.src      = p.img;
            img.alt      = t.label + ' project';
            img.loading  = 'lazy';
            img.decoding = 'async';
            img.width    = 400;
            img.height   = 200;
            img.className = 'glightbox';
            img.setAttribute('data-gallery', t.id);
            card.appendChild(img);
            link.appendChild(card);
            grid.appendChild(link);
        });

        frag.appendChild(grid);
        area.innerHTML = '';
        area.appendChild(frag);
    }

    /* ── Throttled resize ── */
    let resizeRAF = null;
    window.addEventListener('resize', () => {
        if (resizeRAF) cancelAnimationFrame(resizeRAF);
        resizeRAF = requestAnimationFrame(draw);
    }, { passive: true });

    /* ── Theme change detection ── */
    let lastThemeState = document.body.classList.contains('dark-mode');
    
    function checkThemeChange() {
        const currentDark = document.body.classList.contains('dark-mode');
        if (currentDark !== lastThemeState) {
            lastThemeState = currentDark;
            draw();
        }
    }
    
    /* Use MutationObserver for reliable theme change detection */
    const themeObserver = new MutationObserver(checkThemeChange);
    themeObserver.observe(document.body, { attributes: true, attributeFilter: ['class'] });

    /* Also poll as fallback for Alpine.js changes */
    setInterval(checkThemeChange, 200);

})();
</script>

<script>

/* ════════════════════════════════════
   ANIMATION JS
════════════════════════════════════ */
(function () {
    /* Run non-critical setup in idle time */
    const idle = window.requestIdleCallback || (cb => setTimeout(cb, 1));

    /* ── Animated Statistics Counters ── */
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.stat-number[data-count]');
                counters.forEach(counter => {
                    const target = parseInt(counter.dataset.count);
                    const duration = 2000;
                    const start = performance.now();
                    
                    function updateCounter(currentTime) {
                        const elapsed = currentTime - start;
                        const progress = Math.min(elapsed / duration, 1);
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(easeOut * target);
                        counter.textContent = current + '+';
                        
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target + '+';
                        }
                    }
                    
                    requestAnimationFrame(updateCounter);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    const statsSection = document.getElementById('stats');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }

    /* ── Cursor glow — RAF throttled, GPU transform ── */
    const glow = document.createElement('div');
    glow.id = 'cursor-glow';
    document.body.appendChild(glow);
    let mouseX = 0, mouseY = 0, cursorRAF = null;
    window.addEventListener('mousemove', e => {
        mouseX = e.clientX; mouseY = e.clientY;
        if (!cursorRAF) {
            cursorRAF = requestAnimationFrame(() => {
                glow.style.transform = `translate(calc(${mouseX}px - 50%), calc(${mouseY}px - 50%))`;
                cursorRAF = null;
            });
        }
    }, { passive: true });

    /* ── Scroll reveal — cards only (deferred to idle) ── */
    idle(() => {
    const revealEls = document.querySelectorAll('.reveal-card');
    const observer  = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('revealed');
                }, idx * 80);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealEls.forEach(el => observer.observe(el));

    /* ── Section label reveal when section enters view ── */
    document.querySelectorAll('.section-label').forEach(label => {
        const lo = new IntersectionObserver(([e]) => {
            if (e.isIntersecting) {
                label.classList.add('label-visible');
                lo.disconnect();
            }
        }, { threshold: 0.1 });
        lo.observe(label);
    });

    /* ── Typing cursor on eyebrow ── */
    const eyebrow = document.querySelector('.eyebrow');
    if (eyebrow) {
        const text = eyebrow.textContent;
        eyebrow.textContent = '';
        eyebrow.style.borderRight = '2px solid var(--green-light)';
        eyebrow.style.whiteSpace = 'nowrap';
        eyebrow.style.overflow = 'hidden';
        eyebrow.style.display = 'inline-block';
        let i = 0;
        const type = () => {
            if (i < text.length) {
                eyebrow.textContent += text[i++];
                setTimeout(type, 38);
            } else {
                // blink then remove cursor
                setTimeout(() => { eyebrow.style.borderRight = 'none'; }, 1200);
            }
        };
        setTimeout(type, 600);
    }

    /* ── Stagger arc project cards: observer on arc-proj-area ── */
    const arcArea = document.getElementById('arc-proj-area');
    if (arcArea) {
        const mo = new MutationObserver(() => {
            requestAnimationFrame(() => {
                arcArea.querySelectorAll('.arc-proj-card:not(.proj-in)').forEach((card, i) => {
                    card.style.animationDelay = (i * 0.1) + 's';
                    card.classList.add('proj-in');
                });
            });
        });
        mo.observe(arcArea, { childList: true, subtree: false });
    }

    /* ── h2 word-by-word reveal ── */
    document.querySelectorAll('h2').forEach(h2 => {
        const words = h2.innerHTML.split(' ');
        h2.innerHTML = words.map((w, i) =>
            `<span class="h2-word" style="display:inline-block;opacity:0;transform:translateY(20px);transition:opacity 0.5s ${i*0.08}s,transform 0.5s ${i*0.08}s">${w}</span>`
        ).join(' ');

        const h2obs = new IntersectionObserver(([e]) => {
            if (e.isIntersecting) {
                h2.querySelectorAll('.h2-word').forEach(w => {
                    w.style.opacity  = '1';
                    w.style.transform = 'translateY(0)';
                });
                h2obs.disconnect();
            }
        }, { threshold: 0.15 });
        h2obs.observe(h2);
    });

    }); // end idle

})();

</script>

@endsection