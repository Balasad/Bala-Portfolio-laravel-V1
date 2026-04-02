<?php

namespace App\Livewire;

use Livewire\Component;

class SkillCounter extends Component
{
    public string $skill;
    public int $level;
    public int $displayLevel = 0;
    public int $duration = 1500;

    public function mount(string $skill, int $level, int $duration = 1500)
    {
        $this->skill = $skill;
        $this->level = $level;
        $this->duration = $duration;
    }

    public function increment()
    {
        if ($this->displayLevel < $this->level) {
            $this->displayLevel++;
        }
    }

    public function render()
    {
        return view('livewire.skill-counter');
    }
}
