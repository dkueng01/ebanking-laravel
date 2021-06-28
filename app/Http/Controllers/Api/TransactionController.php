<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        return Transaction::all();
    }

    public function getAllUserTransactions(Request $request) {

        return Transaction::select("*")
            ->where('iban_send', $request->iban)
            ->orWhere('iban_receive', $request->iban)
            ->get();
    }

    public function createTransaction(Request $request) {
        Transaction::create([
            'iban_send' => $request->iban_send,
            'iban_receive' => $request->iban_receive,
            'amount' => $request->amount,
            'payment_reference' => $request->payment_reference,
            'usage' => $request->usage

        ]);

        Account::where('iban', $request->iban_receive)
            ->increment('balance', $request->amount);

        Account::where('iban', $request->iban_send)
            ->decrement('balance', $request->amount);
    }

    public function getTransactionFromSearch(Request $request) {
        return Transaction::where('iban_send', 'LIKE', '%'.$request->search.'%')
            ->orWhere('iban_receive', 'LIKE', '%'.$request->search.'%')
            ->orWhere('amount', 'LIKE', '%'.$request->search.'%')
            ->orWhere('payment_reference', 'LIKE', '%'.$request->search.'%')
            ->orWhere('usage', 'LIKE', '%'.$request->search.'%')
            ->orWhere('created_at', 'LIKE', '%'.$request->search.'%')->get();
    }

}
