{{-- resources/views/pages/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact — Balasaravanan S')
@section('og_title', 'Get in Touch — Balasaravanan S')
@section('og_description', 'Available for projects, collaborations, and freelance work. Reach out via email or contact form.')

@section('content')

{{-- ── Contact Section ── --}}
<section class="contact-section" id="contact">
    <div class="nebula" style="left: -150px; bottom: 10%;"></div>
    
    <p class="section-label">Get In Touch</p>
    <h2>Let's Work Together</h2>
    
    {{--
        FIX: Replaced the standalone Alpine/web3forms form with the Livewire ContactForm
        component. Benefits:
          • No third-party dependency (web3forms removed)
          • Mail sent via Laravel's mailer — configure via .env on Render
          • Honeypot spam protection + server-side rate limiting
          • Styled error/success messages instead of browser alert()
          • CSRF handled automatically by Livewire
    --}}
    <div class="contact-container">
        <div class="contact-info">
            <div class="info-card">
                <div class="info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <h3>Email</h3>
                <p>balasaravanan062@gmail.com</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <h3>Location</h3>
                <p>Chennai, India</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <h3>Status</h3>
                <p>Available for Projects</p>
            </div>
            
            <div class="social-links">
                <a href="https://linkedin.com/in/balasaravanan-s-366365235" class="social-link" aria-label="LinkedIn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                </a>
                <a href="https://github.com/Balasad" class="social-link" aria-label="GitHub">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                </a>
                <a href="https://x.com/Balasad_" class="social-link" aria-label="X (Twitter)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>
        </div>

        {{-- Livewire contact form — handles mail, validation, honeypot, rate limiting --}}
        <div class="contact-form-wrapper">
            @livewire('contact-form')
        </div>
    </div>
</section>

<style>
.contact-section {
    padding: 80px;
    position: relative;
    z-index: 1;
    content-visibility: auto;
    contain-intrinsic-size: 0 800px;
}

.contact-container {
    display: grid;
    grid-template-columns: 1fr 1.5fr;
    gap: 60px;
    max-width: 1200px;
    margin: 0 auto;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.info-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s;
}

body:not(.dark-mode) .info-card {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.info-card:hover {
    border-color: var(--green);
    transform: translateX(8px);
}

.info-icon {
    font-size: 28px;
    margin-bottom: 12px;
    color: var(--green);
}

.info-card h3 {
    font-size: 14px;
    color: var(--green-light);
    margin-bottom: 6px;
    font-weight: 600;
}

.info-card p {
    color: var(--text-muted);
    font-size: 15px;
}

.social-links {
    display: flex;
    gap: 12px;
    margin-top: 16px;
}

.social-link {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: var(--surface);
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted);
    transition: all 0.3s;
}

body:not(.dark-mode) .social-link {
    background: rgba(0, 0, 0, 0.04);
}

.social-link:hover {
    background: var(--green-dim);
    border-color: var(--green);
    color: var(--green-light);
    transform: translateY(-3px);
}

/* Livewire form wrapper — matches the old .contact-form card styling */
.contact-form-wrapper {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 40px;
}

body:not(.dark-mode) .contact-form-wrapper {
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 32px rgba(0,0,0,0.08);
}

@media (max-width: 1024px) {
    .contact-section { padding: 60px 40px; }
    .contact-container { grid-template-columns: 1fr; gap: 40px; }
}

@media (max-width: 768px) {
    .contact-section { padding: 40px 16px; }
    .contact-form-wrapper { padding: 24px; }
}
</style>

@endsection