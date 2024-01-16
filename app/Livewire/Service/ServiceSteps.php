<?php

namespace App\Livewire\Service;

use App\Models\Service;
use App\Models\Step;
use Livewire\Attributes\On;
use Livewire\Component;
use WireUi\Traits\Actions;

class ServiceSteps extends Component
{
    use Actions;

    public $stepModal = false;

    public $service;

    public $steps;

    #[On('open-step-modal')]
    public function openStepModal()
    {
        $this->stepModal = true;
    }

    #[On('step-saved')]
    public function stepSaved()
    {
        $this->steps = $this->service->steps;
        $this->stepModal = false;
        $this->notification()->success(
            $description = 'Etapa salva com sucesso.'
        );
    }

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->steps = $this->service->steps;
    }

    public function delete($step)
    {
        if (Step::query()->find($step)->delete()) {
            $this->dispatch('step-deleted');
        }
    }

    public function render()
    {
        return view('livewire.service.service-steps');
    }
}
