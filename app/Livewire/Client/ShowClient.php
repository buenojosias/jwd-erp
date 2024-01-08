<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowClient extends Component
{
    public $client;
    public $services;
    public $receipts;

    #[On('client-updated')]
    public function refreshClient()
    {
        session()->flash('status', 'Cliente atualizado com sucesso.');
        $this->client->refresh();
    }

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->client->load('parent');
        $this->services = $client->services;
        $this->receipts = $client->receipts;
    }

    public function render()
    {
        return view('livewire.client.show-client');
    }
}
