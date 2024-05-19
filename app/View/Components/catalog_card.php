<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class catalog_card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(

        public object $property
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.catalog_card');
    }
}
