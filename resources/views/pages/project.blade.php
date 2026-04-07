@extends('layouts.app')

@section('title', $project['title'] . ' — Balasaravanan S')
@section('og_title', $project['title'] . ' — Balasaravanan S')
@section('og_description', $project['summary'])
@section('og_image', asset($project['cover']))

@section('json_ld')
    {!! App\Services\SeoService::combinedSchema(
        App\Services\SeoService::projectSchema($project),
        App\Services\SeoService::breadcrumbSchema($project['title'], $project['slug'])
    ) !!}
@endsection

@section('content')

<style>
/* ── Project Detail Page ── */
.proj-detail {
    max-width: 1100px;
    margin: 0 auto;
    padding: 60px 80px 100px;
    position: relative;
    z-index: 1;
}

/* ── Back button ── */
.proj-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
    text-decoration: none;
    margin-bottom: 48px;
    padding: 8px 16px;
    border-radius: 30px;
    border: 1px solid var(--border);
    background: var(--surface);
    transition: all 0.3s;
    letter-spacing: 0.3px;
}
.proj-back:hover {
    color: var(--green-light);
    border-color: var(--green);
    background: var(--green-dim);
    transform: translateX(-3px);
}

/* ── Header ── */
.proj-header {
    margin-bottom: 48px;
}

.proj-category {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green-light);
    margin-bottom: 14px;
}

.proj-title {
    font-family: var(--font-display);
    font-size: 56px;
    font-weight: 900;
    line-height: 1.05;
    color: var(--text);
    margin-bottom: 20px;
}

.proj-summary {
    font-size: 18px;
    line-height: 1.7;
    color: var(--text-muted);
    max-width: 680px;
}

/* ── Meta chips row ── */
.proj-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 32px 0 0;
}

.proj-meta-chip {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12px;
    font-weight: 600;
    padding: 7px 14px;
    border-radius: 30px;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text-muted);
}

.proj-meta-chip svg { flex-shrink: 0; }

/* ── Cover image ── */
.proj-cover {
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
    margin: 48px 0;
    background: var(--surface);
    border: 1px solid var(--border);
    aspect-ratio: 16/7;
    position: relative;
}

.proj-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
}

.proj-cover:hover img { transform: scale(1.02); }

/* ── Two column layout ── */
.proj-body {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 60px;
    align-items: start;
}

/* ── Content blocks ── */
.proj-content h3 {
    font-family: var(--font-display);
    font-size: 22px;
    font-weight: 800;
    color: var(--text);
    margin: 40px 0 14px;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--border);
}

.proj-content h3:first-child { margin-top: 0; }

.proj-content p {
    font-size: 15px;
    line-height: 1.8;
    color: var(--text-muted);
    margin-bottom: 16px;
}

.proj-content ul {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
}

.proj-content ul li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 14px;
    line-height: 1.6;
    color: var(--text-muted);
}

.proj-content ul li::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--green);
    flex-shrink: 0;
    margin-top: 7px;
}

/* ── Sidebar ── */
.proj-sidebar {
    position: sticky;
    top: 100px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.proj-sidebar-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 22px;
    transition: border-color 0.3s;
}

.proj-sidebar-card:hover { border-color: rgba(var(--green-rgb, 34,197,94), 0.3); }

.sidebar-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--green);
    margin-bottom: 14px;
}

/* Tech stack chips */
.tech-stack {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
}

.tech-chip {
    font-size: 11px;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 20px;
    background: var(--green-dim);
    color: var(--green-light);
    border: 1px solid rgba(34,197,94,0.2);
    letter-spacing: 0.3px;
}

/* Role/outcome list */
.sidebar-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.sidebar-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.5;
}

.sidebar-list li::before {
    content: '✓';
    color: var(--green);
    font-weight: 700;
    font-size: 12px;
    flex-shrink: 0;
    margin-top: 1px;
}

/* CTA buttons in sidebar */
.proj-ctas {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.proj-cta-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 20px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    letter-spacing: 0.3px;
    transition: all 0.3s;
    font-family: var(--font-display);
}

.proj-cta-btn.primary {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: #fff;
    border: none;
}

.proj-cta-btn.primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px var(--green-glow);
}

.proj-cta-btn.secondary {
    background: transparent;
    color: var(--text);
    border: 1px solid var(--border);
}

.proj-cta-btn.secondary:hover {
    background: var(--green-dim);
    border-color: var(--green);
    color: var(--green-light);
}

/* ── Gallery grid ── */
.proj-gallery {
    margin: 48px 0 0;
}

.proj-gallery h3 {
    font-family: var(--font-display);
    font-size: 22px;
    font-weight: 800;
    color: var(--text);
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--border);
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.gallery-grid img {
    width: 100%;
    aspect-ratio: 4/3;
    object-fit: cover;
    border-radius: 14px;
    border: 1px solid var(--border);
    transition: transform 0.4s, border-color 0.3s;
    cursor: pointer;
}

.gallery-grid img:hover {
    transform: scale(1.02);
    border-color: var(--green);
}

/* First image spans full width */
.gallery-grid img:first-child {
    grid-column: 1 / -1;
    aspect-ratio: 16/7;
}

/* ── Next project teaser ── */
.proj-next {
    margin-top: 80px;
    padding: 40px;
    border-radius: 20px;
    border: 1px solid var(--border);
    background: var(--bg-card);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    text-decoration: none;
    transition: all 0.35s;
    position: relative;
    overflow: hidden;
}

.proj-next::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--green-dim), transparent);
    opacity: 0;
    transition: opacity 0.35s;
    pointer-events: none;
}

.proj-next:hover { 
    border-color: var(--green); 
    transform: translateY(-3px);
    box-shadow: 0 12px 40px var(--green-glow);
}

.proj-next:hover::before { opacity: 1; }

.next-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--green);
    margin-bottom: 8px;
}

.next-title {
    font-family: var(--font-display);
    font-size: 24px;
    font-weight: 800;
    color: var(--text);
}

.next-arrow {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: var(--green-dim);
    border: 1px solid rgba(34,197,94,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--green-light);
    flex-shrink: 0;
    transition: all 0.3s;
}

.proj-next:hover .next-arrow {
    background: var(--green);
    color: #fff;
    transform: translateX(4px);
}

/* ── Responsive ── */
@media (max-width: 1024px) {
    .proj-detail { padding: 40px 40px 80px; }
    .proj-title { font-size: 42px; }
    .proj-body { grid-template-columns: 1fr; gap: 40px; }
    .proj-sidebar { position: static; }
}

@media (max-width: 768px) {
    .proj-detail { padding: 28px 16px 60px; }
    .proj-title { font-size: 32px; }
    .gallery-grid { grid-template-columns: 1fr; }
    .gallery-grid img:first-child { aspect-ratio: 16/9; }
    .proj-next { flex-direction: column; align-items: flex-start; }
}

/* ── Light theme overrides ── */
body:not(.dark-mode) .proj-sidebar-card {
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
}
body:not(.dark-mode) .proj-next {
    background: rgba(255, 255, 255, 0.95);
}

/* ── Lightbox ── */
.lightbox-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.92);
    backdrop-filter: blur(10px);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
}

.lightbox-overlay.open {
    opacity: 1;
    pointer-events: all;
}

.lightbox-overlay img {
    max-width: 90vw;
    max-height: 88vh;
    border-radius: 12px;
    box-shadow: 0 40px 80px rgba(0, 0, 0, 0.6);
    transform: scale(0.92);
    transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
}

.lightbox-overlay.open img { transform: scale(1); }

.lightbox-close {
    position: absolute;
    top: 24px;
    right: 24px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.lightbox-close:hover { background: rgba(255, 255, 255, 0.2); }

/* ── Page entry animation ── */
.proj-header,
.proj-cover,
.proj-body {
    animation: projFadeUp 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
}
.proj-cover    { animation-delay: 0.1s; }
.proj-body     { animation-delay: 0.2s; }

@keyframes projFadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="proj-detail">

    {{-- Back button --}}
    <a href="{{ url()->previous() === url()->current() ? route('home') : url()->previous() }}" class="proj-back">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
        Back
    </a>

    {{-- Header --}}
    <div class="proj-header">
        <p class="proj-category">{{ $project['category'] }}</p>
        <h1 class="proj-title">{{ $project['title'] }}</h1>
        <p class="proj-summary">{{ $project['summary'] }}</p>

        <div class="proj-meta">
            <span class="proj-meta-chip">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                {{ $project['year'] }}
            </span>
            <span class="proj-meta-chip">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                {{ $project['role'] }}
            </span>
            <span class="proj-meta-chip">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                {{ $project['duration'] }}
            </span>
        </div>
    </div>

    {{-- Cover image --}}
    <div class="proj-cover">
        <img src="{{ asset($project['cover']) }}" alt="{{ $project['title'] }} cover" loading="eager">
    </div>

    {{-- Body: content + sidebar --}}
    <div class="proj-body">

        {{-- Main content --}}
        <div class="proj-content">

            <h3>Problem</h3>
            <p>{{ $project['problem'] }}</p>

            <h3>Solution</h3>
            <p>{{ $project['solution'] }}</p>

            <h3>My Approach</h3>
            <ul>
                @foreach($project['approach'] as $point)
                    <li>{{ $point }}</li>
                @endforeach
            </ul>

            <h3>Key Outcomes</h3>
            <ul>
                @foreach($project['outcomes'] as $outcome)
                    <li>{{ $outcome }}</li>
                @endforeach
            </ul>

            {{-- Gallery --}}
            @if(!empty($project['gallery']))
            <div class="proj-gallery">
                <h3>Screenshots</h3>
                <div class="gallery-grid">
                    @foreach($project['gallery'] as $img)
                        <img src="{{ asset($img) }}" alt="{{ $project['title'] }} screenshot" loading="lazy" onclick="openLightbox(this.src)">
                    @endforeach
                </div>
            </div>
            @endif

        </div>

        {{-- Sidebar --}}
        <aside class="proj-sidebar">

            {{-- Tech stack --}}
            <div class="proj-sidebar-card">
                <p class="sidebar-label">Tech Stack</p>
                <div class="tech-stack">
                    @foreach($project['stack'] as $tech)
                        <span class="tech-chip">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            {{-- My role --}}
            <div class="proj-sidebar-card">
                <p class="sidebar-label">What I Did</p>
                <ul class="sidebar-list">
                    @foreach($project['contributions'] as $contrib)
                        <li>{{ $contrib }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Links --}}
            <div class="proj-sidebar-card">
                <p class="sidebar-label">Links</p>
                <div class="proj-ctas">
                    @if(!empty($project['live_url']))
                        <a href="{{ $project['live_url'] }}" target="_blank" rel="noopener" class="proj-cta-btn primary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                            View Live
                        </a>
                    @endif
                    @if(!empty($project['figma_url']))
                        <a href="{{ $project['figma_url'] }}" target="_blank" rel="noopener" class="proj-cta-btn secondary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"/><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"/><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"/><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"/><path d="M5 12.5A3.5 3.5 0 0 1 8.5 9H12v7H8.5A3.5 3.5 0 0 1 5 12.5z"/></svg>
                            Figma Prototype
                        </a>
                    @endif
                    @if(!empty($project['github_url']))
                        <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener" class="proj-cta-btn secondary">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                            GitHub
                        </a>
                    @endif
                </div>
            </div>

        </aside>
    </div>

    {{-- Next project --}}
    @if(!empty($next))
    <a href="{{ route('project', $next['slug']) }}" class="proj-next">
        <div>
            <p class="next-label">Next Project</p>
            <p class="next-title">{{ $next['title'] }}</p>
        </div>
        <div class="next-arrow">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </a>
    @endif

</div>

{{-- Lightbox --}}
<div class="lightbox-overlay" id="lightbox" onclick="closeLightbox()">
    <button class="lightbox-close" onclick="closeLightbox()">✕</button>
    <img id="lightbox-img" src="" alt="Preview">
</div>

<script>
function openLightbox(src) {
    const lb = document.getElementById('lightbox');
    document.getElementById('lightbox-img').src = src;
    lb.classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
</script>

@endsection