<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatesList extends Component
{

    public $zoomDates;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->zoomDates = auth()->user()
            ->zoomDates()
            ->where('active', false)
            ->orderBy('date', 'desc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dates-list');
    }
}
