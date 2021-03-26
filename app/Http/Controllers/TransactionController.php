<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function home()
    {
        $transactions = Transaction::all();
        return view('transactions', ['transactions' => $transactions]);
    }
    public function detail(Request $req, $id)
    {

        $transaction = Transaction::find($id);
        return view('transactions', ['transaction' => $transaction]);
    }
    public function create(Request $req)
    {
        Transaction::create([
            'status' => $req->status,
            'amount' => $req->amount
        ]);
        return redirect(route('transactions.home'));
    }
    public function delete(Request $req, $id)
    {
        Transaction::destroy($id);
        return redirect(route('transactions.home'));
    }
    public function update(Request $req, $id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            $transaction->status = $req->status;
            $transaction->amount = $req->amount;
            $transaction->save();
        }
        return redirect(route('transactions.home'));
    }
}
