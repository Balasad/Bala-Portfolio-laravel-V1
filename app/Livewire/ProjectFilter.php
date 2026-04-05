<?php

namespace App\Livewire;

use Livewire\Component;

class ProjectFilter extends Component
{
    public string $activeFilter = 'all';
    public array  $projects     = [];

    public function mount(array $projects = []): void
    {
        $this->projects = $projects;
    }

    public function setFilter(string $filter): void
    {
        // Whitelist valid values to prevent arbitrary state injection
        $allowed = ['all', 'design', 'development', 'mobile'];
        if (in_array($filter, $allowed, strict: true)) {
            $this->activeFilter = $filter;
        }
    }

    /**
     * Computed property — called as $this->filteredProjects in the view.
     * No Livewire dispatch needed; Alpine syncs via the $wire bridge.
     */
    public function getFilteredProjectsProperty(): array
    {
        if ($this->activeFilter === 'all') {
            return $this->projects;
        }

        return array_values(
            array_filter(
                $this->projects,
                fn($project) => in_array($this->activeFilter, $project['categories'] ?? [], strict: true)
            )
        );
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.project-filter');
    }
}
