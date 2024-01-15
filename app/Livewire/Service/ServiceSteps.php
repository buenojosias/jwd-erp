<?php

namespace App\Livewire\Service;

use App\Models\Service;
use App\Models\Step;
use Livewire\Component;

class ServiceSteps extends Component
{
    public $service;

    public function mount(Service $service)
    {
        $this->service = $service;
    }

    public function delete($step)
    {
        if (Step::query()->find($step)->delete()) {
            $this->dispatch('step-deleted');
        }
    }

    public function render()
    {
        $steps = $this->service->steps;

        return view('livewire.service.service-steps', compact('steps'));
    }
}
