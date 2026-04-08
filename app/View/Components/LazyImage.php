<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LazyImage extends Component
{
    public string $src;
    public string $alt;
    public ?string $class;
    public ?string $width;
    public ?string $height;
    public bool $blur;

    public function __construct(
        string $src,
        string $alt = 'Image',
        ?string $class = null,
        ?string $width = null,
        ?string $height = null,
        bool $blur = true,
    ) {
        $this->src = $src;
        $this->alt = $alt;
        $this->class = $class;
        $this->width = $width;
        $this->height = $height;
        $this->blur = $blur;
    }

    public function render()
    {
        return view('components.lazy-image');
    }
}
