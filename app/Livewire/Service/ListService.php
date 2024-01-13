<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class ListService extends Component
{
    public function render()
    {
        $services = Service::query()
            ->with('client')
            ->get();

        return view('livewire.service.list-service', compact('services'));
    }
}
