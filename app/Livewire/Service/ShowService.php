<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowService extends Component
{
    public $service;

    public $status;

    #[On('service-updated')]
    public function serviceUpdated()
    {
        $this->service->refresh();
        session()->flash('status', 'Serviço atualizado com sucesso.');
    }

    #[On('step-deleted')]
    public function stepDeleted()
    {
        session()->flash('status', 'Etapa removida com sucesso.');
    }

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->status = $service->status;
        $this->service->load('client');
    }

    public function changeStatus()
    {
        try {
            Service::query()->find($this->service->id)->update(['status' => $this->status]);
            $this->service->status = $this->status;
            session()->flash('status', 'Status alterado.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function cancel()
    {
        $this->status = $this->service->status;
    }

    public function render()
    {
        return view('livewire.service.show-service');
    }
}
