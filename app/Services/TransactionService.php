<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Wallet;

class TransactionService

{
    public function createTransaction($data, $operation = 'out')
    {
        if(! $wallet = Wallet::find($data['wallet_id']))
            return false;

        $balanceBefore = $wallet->balance;
        $balanceAfter = $operation == 'out' ? $balanceBefore - $data['amount'] : $balanceBefore + $data['amount'];
        $data['balance_before'] = $balanceBefore;
        $data['balance_after'] = $balanceAfter;

        if(! $wallet->update(['balance' => $balanceAfter]))
            return false;

        if($transaction = Transaction::create($data))
            return $transaction;

        return false;
    }

    public function getTransaction($id)
    {
        return Transaction::find($id);
    }

    public function updateTransaction($id, $data)
    {
        return Transaction::find($id)->update($data);
    }

    public function deleteTransaction($id)
    {
        return Transaction::find($id)->delete();
    }
}
