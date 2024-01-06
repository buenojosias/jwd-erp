<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ListClient extends Component
{
    use WithPagination;

    public $indications = [];
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

    public function submit()
    {
        $this->dispatch('client-created')->self();
        $this->clear();

        // $this->validate();
        // $data = [
        //     'recommended_by' => $this->recommended_by,
        //     'name' => $this->name,
        //     'reference' => $this->reference,
        //     'whatsapp' => $this->whatsapp,
        //     'phone' => $this->phone,
        //     'email' => $this->email
        // ];

        // try {
        //     $client = Client::query()->create($data);
        // } catch (\Throwable $th) {
        //     dd('Erro ao salvar cliente', $th);
        // }
    }

    public function loadIndications()
    {
        $this->indications = Client::query()->select('id', 'name')->orderBy('name')->get();
    }

    public function clear()
    {
        $this->reset();
    }

    public function render()
    {
        $clients = Client::query()->with('parent')->orderBy('name')->paginate(10);
        return view('livewire.clients.list-client', compact('clients'));
    }
}
