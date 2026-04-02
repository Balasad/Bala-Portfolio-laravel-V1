<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
    <div class="text-center mb-2" 
         style="color: var(--text)"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
    >
        {{ $skill }}
    </div>
    
    <div class="relative w-full h-2 rounded-full overflow-hidden" style="background: var(--surface)">
        <div 
            class="absolute inset-y-0 left-0 rounded-full"
            style="background: linear-gradient(90deg, var(--green), var(--green-light))"
            :style="`width: {{ $level }}%`"
        ></div>
    </div>
    
    <div class="text-right mt-1 text-sm" style="color: var(--green-light)">
        {{ $level }}%
    </div>
</div>
