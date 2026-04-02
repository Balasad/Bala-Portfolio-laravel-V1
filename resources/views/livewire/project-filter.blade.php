<div x-data="{ 
    activeFilter: 'all',
    filters: ['all', 'design', 'development', 'mobile'],
    
    setFilter(filter) {
        this.activeFilter = filter;
        $wire.setFilter(filter);
    }
}">
    <div class="flex flex-wrap gap-3 mb-8 justify-center">
        <template x-for="filter in filters" :key="filter">
            <button 
                @click="setFilter(filter)"
                :class="{ 'bg-green-500 text-white': activeFilter === filter }"
                class="px-5 py-2 rounded-full text-sm font-medium capitalize transition-all duration-300"
                :style="activeFilter === filter ? '' : 'background: var(--surface); color: var(--text-muted); border: 1px solid var(--border)'"
                x-text="filter"
            ></button>
        </template>
    </div>
    
    <div @filter-changed.window="activeFilter = $event.detail.filter">
        {{ $slot }}
    </div>
</div>
