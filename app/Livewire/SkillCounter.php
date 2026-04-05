<?php

namespace App\Livewire;

use Livewire\Component;

/**
 * SkillCounter — purely Alpine-driven progress bar.
 *
 * The PHP component only passes $skill and $level to the view.
 * All animation is handled client-side by Alpine.js, so there are
 * zero extra server round-trips for what is purely a visual effect.
 */
class SkillCounter extends Component
{
    public string $skill;
    public int    $level;

    public function mount(string $skill, int $level): void
    {
        $this->skill = $skill;
        $this->level = $level;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.skill-counter');
    }
}
