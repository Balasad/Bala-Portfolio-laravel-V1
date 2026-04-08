{{-- Lazy-loaded image with blur placeholder and WebP support --}}
<div class="relative inline-block overflow-hidden w-full" 
     x-data="{ loaded: false }"
     x-init="
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelector('img').src = entry.target.dataset.src;
                    entry.target.querySelector('img').classList.remove('blur-md');
                    loaded = true;
                    observer.unobserve(entry.target);
                }
            });
        }, { rootMargin: '50px' });
        observer.observe($el);
     ">
    
    {{-- Blur placeholder background --}}
    @if ($blur)
        <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-gray-900 blur-lg"></div>
    @endif
    
    {{-- Picture element with WebP + fallback --}}
    <picture class="block w-full">
        <source 
            data-srcset="{{ str_replace(['.jpg', '.png'], '.webp', $src) }}" 
            type="image/webp">
        <img 
            src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 630'%3E%3Crect fill='%231f2937' width='1200' height='630'/%3E%3C/svg%3E"
            data-src="{{ $src }}"
            alt="{{ $alt }}"
            @if ($width) width="{{ $width }}" @endif
            @if ($height) height="{{ $height }}" @endif
            class="w-full h-auto block transition-all duration-300 {{ $class ?? '' }} {{ $blur ? 'blur-md' : '' }}"
            loading="lazy"
            decoding="async">
    </picture>
</div>
