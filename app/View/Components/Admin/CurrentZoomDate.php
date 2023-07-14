<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CurrentZoomDate extends Component
{

    public $currentZoomDate;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->currentZoomDate = auth()->user()->zoomDates->where('active', true)->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.current-zoom-date');
    }
}
