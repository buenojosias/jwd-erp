<?php

namespace App\Livewire\Service;

use App\Enums\ServiceStatus;
use App\Models\Service;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditService extends Component
{
    #[Locked]
    public $id;

    #[Validate('required|string')]
    public $title;

    #[Validate('nullable')]
    public $description;

    #[Validate('nullable|decimal:0,2')]
    public $amount;

    #[Validate('required')]
    public $status;

    #[Validate('required|date|before_or_equal:now')]
    public $requested_at;

    #[Validate('nullable|date|after_or_equal:requested_at')]
    public $start_date;

    #[Validate('nullable|date|after_or_equal:requested_at')]
    public $end_date;

    #[Validate('nullable|date|after_or_equal:start_date')]
    public $finished_at;

    public function mount($service)
    {
        $this->id = $service->id;
        $this->title = $service->title;
        $this->description = $service->description;
        $this->amount = $service->amount;
        $this->status = $service->status;
        $this->requested_at = $service->requested_at;
        $this->start_date = $service->start_date;
        $this->end_date = $service->end_date;
        $this->finished_at = $service->finished_at;
    }

    public function save()
    {
        $data = $this->validate();

        try {
            Service::query()
                ->find($this->id)
                ->update($data);
            $this->dispatch('service-updated');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.service.edit-service');
    }
}
