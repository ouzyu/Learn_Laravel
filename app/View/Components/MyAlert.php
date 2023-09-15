<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MyAlert extends Component
{
    public string $type;
    public string $alertTitle;
    public function __construct(string $type, string $alertTitle)
    {
        $this->type = $type;
        $this->alertTitle = $alertTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-alert');
    }
}
