<?php

namespace App\Livewire\Service;

use App\Enums\ServiceStatusEnum;
use App\Models\Service;
use Livewire\Component;

class ListService extends Component
{
    public $show_finished = false;
    public $status;

    public $order_by = 'end_date';
    public $order = 'desc';

    public function render()
    {
        $services = Service::query()
            ->with('client')
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->when(!$this->show_finished && !$this->status, function ($query) {
                $query->where('status', '!=', 'concluído');
            })
            ->orderBy($this->order_by, $this->order)
            ->paginate();

        // $services = $services->getCollection()->transform(function($service) {
        //     $service->color = ServiceStatusEnum::from($service->status->value)->color();
        //     return $service;
        // });

        return view('livewire.service.list-service', compact('services'));
    }
}
