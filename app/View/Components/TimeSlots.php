<?php

namespace App\View\Components;

use App\Models\TimeSlot;
use Illuminate\View\Component;

class TimeSlots extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(

    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $timeSlots = TimeSlot::where('active',true)->get();

        return view('components.time-slots',compact('timeSlots'));
    }
}
