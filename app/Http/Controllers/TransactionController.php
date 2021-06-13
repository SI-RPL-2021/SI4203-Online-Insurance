<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    // Customer-only


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */

    public function show(Transaction $transaction)
    {
        $subscription = Subscription::find($transaction->subscription_id);
        return view('pages.transactions.detail', ['transaction' => $transaction, 'subscription' => $subscription]);
    }

    // Admin-only

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('dashboard.transactions.index', ['transactions' => $transactions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('dashboard.transactions.edit', ['transaction' => $transaction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $req)
    {
        Transaction::create([
            'status' => $req->status,
            'amount' => $req->amount
        ]);
        return redirect()->route('dashboard.transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */

    public function destroy(Transaction $transaction)
    {
        return redirect()->route('dashboard.transactions.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Transaction $transaction)
    {
        $subscription = Subscription::find($transaction->subscription_id);
        // $transaction = $request->all();
        $transaction->status = 'paid';
        $transaction->save();

        if ($subscription) {
            $subscription->endDate = date('Y-m-d', strtotime($subscription->endDate . '+ 30 days'));
            $subscription->status = 'active';
            $transaction->paymentDate = date('Y-m-d');
            $subscription->save();
        }
        return redirect()->route('pages.transactions.detail', $transaction->id);
    }
}
