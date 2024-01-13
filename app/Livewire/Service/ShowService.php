<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class ShowService extends Component
{
    public $service;

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->service->load('client');
    }

    public function render()
    {
        return view('livewire.service.show-service');
    }
}
