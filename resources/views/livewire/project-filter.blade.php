{{--
  ProjectFilter: Alpine handles the active-state UI locally.
  $wire.setFilter() calls the Livewire method only to update server-side state
  and trigger a re-render of the filtered project list.
--}}
<div
    x-data="{
        activeFilter: @entangle('activeFilter'),
        filters: [
            { value: 'all',         label: 'All' },
            { value: 'design',      label: 'Design' },
            { value: 'development', label: 'Development' },
            { value: 'mobile',      label: 'Mobile' },
        ]
    }"
>
    {{-- Filter tabs --}}
    <div
        class="flex flex-wrap gap-3 mb-8 justify-center"
        role="group"
        aria-label="Filter projects by category"
    >
        <template x-for="f in filters" :key="f.value">
            <button
                type="button"
                @click="$wire.setFilter(f.value)"
                :aria-pressed="activeFilter === f.value ? 'true' : 'false'"
                :class="activeFilter === f.value
                    ? 'bg-green-500 text-white'
                    : 'text-muted border'"
                class="px-5 py-2 rounded-full text-sm font-medium capitalize transition-all duration-300"
                :style="activeFilter === f.value
                    ? ''
                    : 'background: var(--surface); color: var(--text-muted); border: 1px solid var(--border)'"
                x-text="f.label"
            ></button>
        </template>
    </div>

    {{-- Project list — rendered server-side by Livewire --}}
    <div>
        @forelse ($this->filteredProjects as $project)
            <div wire:key="project-{{ $project['id'] ?? $loop->index }}">
                {{-- Render your project card partial here --}}
                @include('partials.project-card', ['project' => $project])
            </div>
        @empty
            <p class="text-center" style="color: var(--text-muted)">No projects found for this category.</p>
        @endforelse
    </div>
</div>
