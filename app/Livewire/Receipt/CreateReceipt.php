<?php

namespace App\Livewire\Receipt;

use App\Models\Client;
use App\Models\Wallet;
use App\Services\TransactionService;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateReceipt extends Component
{
    // protected $transactionService;


    public $client;

    public $clients;

    public $wallets;

    #[Validate('required|numeric')]
    public $amount;

    #[Validate('required|date|before_or_equal:now')]
    public $date;

    #[Validate('required|exists:wallets,id')]
    public $wallet_id;

    #[Validate('nullable|string|max:255')]
    public $note;

    public function mount($client = null)
    {
        if ($client) {
            $this->client_id = $client->id;
        }
        $this->client = $client;
        $this->date = now()->format('Y-m-d');
        $this->wallets = Wallet::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    #[On('load-clients')]
    public function loadClients()
    {
        $this->clients = Client::query()
            ->select('id', 'name', 'reference')
            ->orderBy('name')
            ->get();
    }

    public function render()
    {
        return view('livewire.receipt.create-receipt');
    }

    public function save()
    {
        $this->validate();

        $transactionService = new TransactionService();

        $transaction = $transactionService->createTransaction([
            'wallet_id' => $this->wallet_id,
            'identifier_id' => 1,
            'description' => 'Pagamento recebido de ' . $this->client->name,
            'date' => $this->date,
            'amount' => $this->amount,
        ]);

        if ($transaction) {
            $this->client->receipts()->create([
                'transaction_id' => $transaction->id,
                'date' => $this->date,
                'amount' => $this->amount,
                'note' => $this->note,
            ]);
        } else {
            dd('Não foi possível criar a transação');
        }
    }
}
