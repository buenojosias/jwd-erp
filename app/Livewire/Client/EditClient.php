<?php

namespace App\Livewire\Client;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditClient extends Component
{
    public $indications = [];

    public $client_id;

    public $recommended_by;

    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|min:3')]
    public $reference;

    #[Validate('required|min:15|max:15')]
    public $whatsapp;

    #[Validate('nullable|min:14|max:15')]
    public $phone;

    #[Validate('nullable|email')]
    public $email;

    #[On('edit-modal')]
    public function loadIndications($client)
    {
        $this->indications = Client::query()->select('id', 'name')->orderBy('name')->get();
        $this->dispatch('loaded-indications', $client)->self();
    }

    #[On('loaded-indications')]
    public function loadClient($client)
    {
        $this->client_id = $client['id'];
        $this->recommended_by = $client['recommended_by'];
        $this->name = $client['name'];
        $this->reference = $client['reference'];
        $this->whatsapp = $client['whatsapp'];
        $this->phone = $client['phone'];
        $this->email = $client['email'];
    }

    public function submit()
    {
        $this->validate();
        $data = [
            'recommended_by' => $this->recommended_by,
            'name' => $this->name,
            'reference' => $this->reference,
            'whatsapp' => $this->whatsapp,
            'phone' => $this->phone,
            'email' => $this->email
        ];

        try {
            if (Client::query()->findOrFail($this->client_id)->update($data)) {
                $this->dispatch('client-updated');
            };
            // return $this->redirect('/clientes/'.$client->id, navigate: true);
        } catch (\Throwable $th) {
            dd('Erro ao salvar cliente', $th);
        }
    }

    public function render()
    {
        return view('livewire.client.edit-client');
    }
}
