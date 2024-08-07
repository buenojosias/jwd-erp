<?php

namespace App\Livewire\Financial;

use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\Service;
use App\Models\Wallet;
use Livewire\Component;

class IndexFinancial extends Component
{
    public function render()
    {
        $balance = Wallet::sum('balance');
        $wallets = Wallet::count();
        $invoices = Invoice::where('status', '!=', 'Paga')->count();
        //get sum of services where status == 'Concluído' and subtract sum of receipts
        $services = Service::where('status', 'Concluído')->sum('amount');
        $receipts = Receipt::sum('amount');
        $receivables = $services - $receipts;

        return view('livewire.financial.index-financial',
            compact('balance', 'wallets', 'invoices', 'receivables')
        );
    }
}
