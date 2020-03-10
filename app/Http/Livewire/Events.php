<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class Events extends Component
{
    const PAGINATION = 10;

    public function render()
    {
        $events = Event::whereDate('end_date', '>=', Carbon::now())->paginate(self::PAGINATION);

        return view('livewire.events', ['events' => $events]);
    }
}
