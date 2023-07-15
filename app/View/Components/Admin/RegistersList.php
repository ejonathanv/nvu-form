<?php

namespace App\View\Components\Admin;

use Closure;
use App\Models\Register;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RegistersList extends Component
{

    public $registers;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $referral = auth()->user()->referral;
        $this->registers = Register::where('referral_id', $referral->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.registers-list');
    }
}
