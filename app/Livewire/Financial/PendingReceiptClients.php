<?php

namespace App\Livewire\Financial;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PendingReceiptClients extends Component
{
    public $onlyFinished = true;

    public function render()
    {
        $clients = Client::select('clients.*')
            ->when($this->onlyFinished, function ($query) {
                $query
                    ->selectSub(function ($query) {
                        $query->from('services')
                            ->selectRaw('COALESCE(SUM(CASE WHEN services.status = "Concluído" THEN services.amount ELSE 0 END), 0)')
                            ->whereColumn('services.client_id', 'clients.id');
                    }, 'total_services')
                    ->selectSub(function ($query) {
                        $query->from('receipts')
                            ->selectRaw('COALESCE(SUM(receipts.amount), 0)')
                            ->whereColumn('receipts.client_id', 'clients.id');
                    }, 'total_receipts')
                    ->selectRaw('COALESCE(
                        (SELECT COALESCE(SUM(CASE WHEN services.status = "Concluído" THEN services.amount ELSE 0 END), 0) FROM services WHERE services.client_id = clients.id)
                        -
                        (SELECT COALESCE(SUM(receipts.amount), 0) FROM receipts WHERE receipts.client_id = clients.id), 0) as amount_due')
                    ->havingRaw('amount_due > 0');
            })
            ->when(!$this->onlyFinished, function ($query) {
                $query
                    ->selectSub(function ($query) {
                        $query->from('services')
                            ->selectRaw('COALESCE(SUM(CASE WHEN services.status != "Cancelado" THEN services.amount ELSE 0 END), 0)')
                            ->whereColumn('services.client_id', 'clients.id');
                    }, 'total_services')
                    ->selectSub(function ($query) {
                        $query->from('receipts')
                            ->selectRaw('COALESCE(SUM(receipts.amount), 0)')
                            ->whereColumn('receipts.client_id', 'clients.id');
                    }, 'total_receipts')
                    ->selectRaw('COALESCE(
                    (SELECT COALESCE(SUM(CASE WHEN services.status != "Cancelado" THEN services.amount ELSE 0 END), 0) FROM services WHERE services.client_id = clients.id)
                    -
                    (SELECT COALESCE(SUM(receipts.amount), 0) FROM receipts WHERE receipts.client_id = clients.id), 0) as amount_due')
                    ->havingRaw('amount_due > 0');
            })
            ->get();

        // dd($clients->toArray());

        return view('livewire.financial.pending-receipt-clients', compact('clients'));
    }
}
