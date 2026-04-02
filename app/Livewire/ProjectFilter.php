<?php

namespace App\Livewire;

use Livewire\Component;

class ProjectFilter extends Component
{
    public string $activeFilter = 'all';
    public array $projects = [];

    public function mount(array $projects = [])
    {
        $this->projects = $projects;
    }

    public function setFilter(string $filter)
    {
        $this->activeFilter = $filter;
        $this->dispatch('filterChanged', filter: $filter);
    }

    public function getFilteredProjectsProperty()
    {
        if ($this->activeFilter === 'all') {
            return $this->projects;
        }

        return array_filter($this->projects, fn($project) => 
            in_array($this->activeFilter, $project['categories'] ?? [])
        );
    }

    public function render()
    {
        return view('livewire.project-filter');
    }
}
