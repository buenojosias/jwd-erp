<?php

namespace App\Livewire\Transaction;

use App\Models\Identifier;
use App\Models\Transaction;
use App\Models\Wallet;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTransaction extends Component
{
    use WithPagination;

    public $wallets = [];
    public $identifiers = [];

    public $filterModal = false;
    public $startDate = null;
    public $endDate = null;
    public $walletId = null;
    public $identifierId = null;
    public $flux = null;

    public $perPage = 10;

    public function render()
    {
        $transactions = Transaction::query()
            ->with('wallet', 'identifier')
            ->when($this->startDate, fn($query) => $query->where('date', '>=', $this->startDate))
            ->when($this->endDate, fn($query) => $query->where('date', '<=', $this->endDate))
            ->when($this->walletId, fn($query) => $query->where('wallet_id', $this->walletId))
            ->when($this->identifierId, fn($query) => $query->where('identifier_id', $this->identifierId))
            ->when($this->flux == 'in', fn($query) => $query->where('amount', '>=', 0))
            ->when($this->flux == 'out', fn($query) => $query->where('amount', '<', 0))
            ->paginate($this->perPage);

        return view('livewire.transaction.index-transaction', compact('transactions'));
    }

    public function modalOpened()
    {
        if (!$this->wallets || !$this->identifiers) {
            $this->wallets = Wallet::select(['id', 'name'])->orderBy('name', 'asc')->get();
            $this->identifiers = Identifier::select(['id', 'title'])->orderBy('title', 'asc')->get();
        }
    }

    public function resetFilter()
    {
        $this->reset(['startDate', 'endDate', 'walletId', 'identifierId', 'flux']);
        $this->filterModal = false;
    }
}
