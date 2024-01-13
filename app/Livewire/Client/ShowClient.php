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

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->client->load('parent');
    }

    public function render()
    {
        return view('livewire.client.show-client');
    }
}
