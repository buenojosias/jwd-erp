<?php

namespace App\Livewire\Wallet;

use App\Models\Wallet;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ListWallet extends Component
{
    public $modal = false;

    public $selectedWallet;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('nullable|numeric')]
    public $balance = 0;

    public function render()
    {
        $wallets = Wallet::orderBy('name', 'asc')->get();

        return view('livewire.wallet.list-wallet', compact('wallets'));
    }

    public function loadWallet($id)
    {
        $this->selectedWallet = Wallet::find($id);

        $this->name = $this->selectedWallet->name;
        $this->balance = $this->selectedWallet->balance;

        $this->modal = true;
    }

    public function submit()
    {
        $data = $this->validate();

        if ($this->selectedWallet) {
            $saved = $this->selectedWallet->update($data);
        } else {
            $saved = Wallet::create($data);
        }

        if ($saved) {
            $this->modal = false;
            $this->clear();
        }
    }

    public function clear()
    {
        $this->selectedWallet = null;
        $this->name = '';
        $this->balance = 0;
    }
}
