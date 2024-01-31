<?php

namespace App\Livewire\Service;

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
            ->orderBy(\DB::raw($this->order_by .' IS NULL, '. $this->order_by), $this->order)
            ->paginate();

        return view('livewire.service.list-service', compact('services'));
    }
}
