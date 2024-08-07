<?php

namespace App\Livewire\Financial;

use App\Models\Identifier as IdentifierModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Identifier extends Component
{
    public $modal = false;

    public $selectedIdentifier;

    #[Validate('required|string|max:255')]
    public $title;


    public function render()
    {
        $identifiers = IdentifierModel::orderBy('title')->get();

        return view('livewire.financial.identifier', compact('identifiers'));
    }

    public function loadIdentifier($id)
    {
        $this->selectedIdentifier = IdentifierModel::find($id);

        $this->title = $this->selectedIdentifier->title;

        $this->modal = true;
    }

    public function submit()
    {
        $data = $this->validate();

        if ($this->selectedIdentifier) {
            $saved = $this->selectedIdentifier->update($data);
        } else {
            $saved = IdentifierModel::create($data);
        }

        if ($saved) {
            $this->modal = false;
            $this->clear();
        }
    }

    public function clear()
    {
        $this->selectedIdentifier = null;
        $this->title = '';
    }
}
