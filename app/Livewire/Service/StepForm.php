<?php

namespace App\Livewire\Service;

use App\Models\Step;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StepForm extends Component
{
    public $step;

    #[Validate('required|numeric')]
    public $service_id;

    #[Validate('required')]
    public $title;

    #[Validate('nullable')]
    public $description;

    #[Validate('required')]
    public $status;

    #[Validate('nullable|date')]
    public $start_date;

    #[Validate('nullable|date')]
    public $end_date;

    public function mount($service) {
        $this->service_id = $service->id;
    }

    #[On('fill')]
    public function fill($step) {
        $this->step = $step;

        $this->title = $step['title'] ?? null;
        $this->description = $step['description'] ?? null;
        $this->status = $step['status'] ?? null;
        $this->start_date = $step['start_date'] ?? null;
        $this->end_date = $step['end_date'] ?? null;
    }

    public function save() {
        $data = $this->validate();
        if($this->step) {
            Step::query()->findOrFail($this->step['id'])->update($data);
            $this->dispatch('step-saved');
        } else {
            Step::query()->create($data);
            $this->dispatch('step-saved');
        }
    }

    public function render()
    {
        return view('livewire.service.step-form');
    }
}
