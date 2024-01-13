<?php

namespace App\Livewire\Service;

use App\Models\Client;
use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateService extends Component
{
    public $client;
    public $clients;

    #[Validate('required|numeric')]
    public $client_id;

    #[Validate('required|string')]
    public $title;

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

    public function mount($client = null)
    {
        if($client) {
            $this->client_id = $client->id;
        }
        $this->client = $client;
    }

    #[On('load-clients')]
    public function loadClients()
    {
        $this->clients = Client::query()
            ->select('id', 'name', 'reference')
            ->orderBy('name')
            ->get();
    }

    public function save()
    {
        $this->validate();
        $data = [
            'client_id' => $this->client_id,
            'title' => $this->title,
            'description' => $this->description,
            'amount' => $this->amount,
            'status' => $this->status,
            'requested_at' => $this->requested_at,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'finished_at' => $this->finished_at,
        ];

        try {
            $service = Service::query()->create($data);
            session()->flash('status', 'Serviço cadastrado com sucesso.');
            $this->clear();
            return $this->redirect('/servicos/'.$service->id, navigate: true);
        } catch (\Throwable $th) {
            dd('Erro ao salvar serviço', $th);
        }
    }

    #[On('close')]
    public function clear()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.service.create-service');
    }
}
