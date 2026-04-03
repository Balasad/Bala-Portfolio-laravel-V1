<div>
    <section class="skills-section" id="skills">
        <p class="section-label" data-aos="fade-up" data-aos-delay="100">Tech Stack</p>
        <h2 data-aos="fade-up" data-aos-delay="150">Skills & Expertise</h2>
        
        <div class="skills-grid">
            @foreach($skillCategories as $index => $category)
                <div class="skill-category" data-aos="fade-up" data-aos-delay="{{ 200 + ($index * 100) }}">
                    <div class="skill-category-header">
                        {!! $category['icon_svg'] !!}
                        <h3>{{ $category['title'] }}</h3>
                    </div>
                    <div class="skill-icons-grid">
                        @foreach($category['skills'] as $skill)
                            <div class="skill-icon-card" wire:key="skill-{{ $loop->parent->index }}-{{ $loop->index }}">
                                <div class="skill-icon-wrapper">
                                    {!! $skill['icon_svg'] !!}
                                </div>
                                <span class="skill-icon-label">{{ $skill['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="tech-badges" data-aos="fade-up" data-aos-delay="600">
            @foreach($techBadges as $badge)
                <span class="tech-badge" wire:key="badge-{{ $badge }}">
                    {{ $badge }}
                </span>
            @endforeach
        </div>
    </section>
</div>

<style>
    .skills-section {
        position: relative;
        z-index: 1;
        padding: 80px 80px;
        content-visibility: auto;
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        margin-bottom: 50px;
    }

    .skill-category {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 32px;
        backdrop-filter: blur(12px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .skill-category:hover {
        border-color: var(--green);
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(34, 197, 94, 0.2);
    }

    body:not(.dark-mode) .skill-category {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 8px 32px rgba(0,0,0,0.08);
    }

    body:not(.dark-mode) .skill-category:hover {
        box-shadow: 0 20px 60px rgba(34, 197, 94, 0.15);
    }

    .skill-category-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border);
    }

    .skill-category-header svg {
        width: 24px;
        height: 24px;
        color: var(--green);
        flex-shrink: 0;
    }

    .skill-category-header h3 {
        font-family: var(--font-display);
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
        margin: 0;
    }

    .skill-icons-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .skill-icon-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding: 20px 12px;
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 16px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: default;
    }

    .skill-icon-card:hover {
        background: var(--green-dim);
        border-color: var(--green);
        transform: scale(1.05) translateY(-4px);
        box-shadow: 0 10px 30px var(--green-glow);
    }

    body:not(.dark-mode) .skill-icon-card {
        background: rgba(0, 0, 0, 0.03);
    }

    body:not(.dark-mode) .skill-icon-card:hover {
        background: rgba(34, 197, 94, 0.08);
        border-color: var(--green);
        box-shadow: 0 10px 30px rgba(34, 197, 94, 0.15);
    }

    .skill-icon-wrapper {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg-card);
        border-radius: 14px;
        border: 1px solid var(--border);
        transition: all 0.3s;
    }

    .skill-icon-card:hover .skill-icon-wrapper {
        background: var(--green);
        border-color: var(--green);
        transform: rotate(-5deg) scale(1.1);
    }

    body:not(.dark-mode) .skill-icon-card:hover .skill-icon-wrapper {
        background: var(--green);
        border-color: var(--green);
    }

    .skill-icon-wrapper svg {
        width: 26px;
        height: 26px;
        color: var(--text-muted);
        transition: all 0.3s;
    }

    .skill-icon-card:hover .skill-icon-wrapper svg {
        color: #ffffff;
        transform: scale(1.1);
    }

    .skill-icon-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text);
        text-align: center;
        line-height: 1.3;
    }

    .tech-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        justify-content: center;
    }

    .tech-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-muted);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .tech-badge::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--green-dim), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tech-badge:hover {
        background: var(--green-dim);
        border-color: var(--green);
        color: var(--green-light);
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 12px 30px var(--green-glow);
    }

    body:not(.dark-mode) .tech-badge {
        background: rgba(0, 0, 0, 0.04);
    }

    body:not(.dark-mode) .tech-badge:hover {
        background: rgba(34, 197, 94, 0.1);
        border-color: var(--green);
        color: var(--green);
        box-shadow: 0 12px 30px rgba(34, 197, 94, 0.15);
    }

    .tech-badge:hover::before {
        opacity: 1;
    }

    @media (max-width: 1024px) {
        .skills-section {
            padding: 60px 40px;
        }
    }

    @media (max-width: 768px) {
        .skills-section {
            padding: 40px 16px;
        }
        
        .skills-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .skill-category {
            padding: 24px;
        }

        .skill-icons-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .skill-icon-card {
            padding: 16px 8px;
        }

        .skill-icon-wrapper {
            width: 48px;
            height: 48px;
        }

        .skill-icon-wrapper svg {
            width: 24px;
            height: 24px;
        }

        .skill-icon-label {
            font-size: 11px;
        }
        
        .tech-badge {
            padding: 10px 16px;
            font-size: 13px;
        }
    }

    @media (max-width: 420px) {
        .skill-icons-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        
        .skill-icon-card {
            padding: 14px 8px;
        }

        .skill-icon-wrapper {
            width: 44px;
            height: 44px;
        }

        .skill-icon-wrapper svg {
            width: 22px;
            height: 22px;
        }
    }
</style>
