<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowClient extends Component
{
    public $client;
    public $services = [];
    public $receipts = [];

    public $outstandingBalance = 0;

    #[On('client-updated')]
    public function refreshClient()
    {
        session()->flash('status', 'Cliente atualizado com sucesso.');
        $this->client->refresh();
    }

    public function loadServices()
    {
        $this->services = $this->client->services;
    }

    public function loadReceipts()
    {
        $this->receipts = $this->client->receipts;
    }

    public function mount($client)
    {
        $this->client = Client::with('parent')
            ->withSum(['services' => fn ($query) => $query->where('status', 'Concluído')], 'amount')
            ->withSum('receipts', 'amount')
            ->findOrFail($client);

        $this->outstandingBalance = $this->client->services_sum_amount - $this->client->receipts_sum_amount;
    }

    public function render()
    {
        return view('livewire.client.show-client');
    }

    public function toggleHighlighted()
    {
        $this->client->update(['highlighted' => !$this->client->highlighted]);
    }

    public function toggleArchived()
    {
        $this->client->update(['archived' => !$this->client->archived]);
    }
}
