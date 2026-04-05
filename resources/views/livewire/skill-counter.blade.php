{{--
  SkillCounter: fully Alpine-driven — no Livewire polling, no server round-trips.
  x-intersect triggers the count-up animation once when the element enters the viewport.
--}}
<div
    x-data="{
        displayed: 0,
        target: {{ $level }},
        animate() {
            const duration = 1200;
            const start    = performance.now();
            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                // Ease-out cubic
                const eased = 1 - Math.pow(1 - progress, 3);
                this.displayed = Math.round(eased * this.target);
                if (progress < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        }
    }"
    x-intersect.once="animate()"
    role="meter"
    aria-valuenow="{{ $level }}"
    aria-valuemin="0"
    aria-valuemax="100"
    :aria-valuenow="displayed"
    aria-label="{{ $skill }} proficiency"
>
    <div class="text-center mb-2" style="color: var(--text)">
        {{ $skill }}
    </div>

    <div class="relative w-full h-2 rounded-full overflow-hidden" style="background: var(--surface)" aria-hidden="true">
        <div
            class="absolute inset-y-0 left-0 rounded-full transition-none"
            style="background: linear-gradient(90deg, var(--green), var(--green-light))"
            :style="'width: ' + displayed + '%'"
        ></div>
    </div>

    <div class="text-right mt-1 text-sm" style="color: var(--green-light)" aria-hidden="true">
        <span x-text="displayed"></span>%
    </div>
</div>
