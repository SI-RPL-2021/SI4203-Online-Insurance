<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
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
        $subscription = Subscription::find($transaction->subscription_id);
        return view('transactions-detail', ['transaction' => $transaction, 'subscription' => $subscription]);
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
        return redirect(route('dashboard.transactions'));
    }
    public function update(Request $req, $id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $subscription = Subscription::find($transaction->subscription_id);
            $transaction->status = 'paid';
            $transaction->save();

            if ($subscription) {
                $subscription->endDate = date('Y-m-d', strtotime($subscription->endDate . '+ 30 days'));
                $subscription->status = 'active';
                // $transaction->amount = $req->amount;
                $transaction->paymentDate = date('Y-m-d');
                $subscription->save();
            }
        }
        return redirect(route('user.profile'));
    }
}
