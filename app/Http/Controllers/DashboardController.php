<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\view;
use App\Models\Claim;
use App\Models\Policy;
use App\Models\Subscription;
use App\Models\Transaction;


class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard/home');
    }
    public function claims()
    {
        $claims = Claim::all();
        return view('dashboard/claims', ['claims' => $claims]);
    }
    public function subscriptions()
    {
        $subscriptions = Subscription::all();
        return view('dashboard/subscriptions', ['subscriptions' => $subscriptions]);
    }
    public function policies()
    {
        $policies = Policy::all();
        return view('dashboard/policies', ['policies' => $policies]);
    }
    public function transactions()
    {
        $transactions = Transaction::all();
        return view('dashboard/transactions', ['transactions' => $transactions]);
    }

    public function claimsDetail(Request $req, $id)
    {
        if ($id == 0) {
            return view('dashboard/claims-detail', ['claim' => []]);
        }
        $claim = Claim::find($id);
        return view('dashboard/claims-detail', ['claim' => $claim]);
    }

    public function policiesDetail(Request $req, $id)
    {
        if ($id == '0') {
            return view('dashboard/policies-detail', ['policy' => []]);
        }
        $policy = Policy::find($id);
        return view('dashboard/policies-detail', ['policy' => $policy]);
    }

    public function subscriptionsDetail(Request $req, $id)
    {
        if ($id == 0) {
            return view('dashboard/subscriptions-detail', ['subscription' => []]);
        }
        $subscription = Subscription::find($id);
        return view('dashboard/subscriptions-detail', ['subscription' => $subscription]);
    }

    public function transactionsDetail(Request $req, $id)
    {
        if ($id == 0) {
            return view('dashboard/transactions-detail', ['transaction' => []]);
        }
        $transaction = Transaction::find($id);
        return view('dashboard/transactions-detail', ['transaction' => $transaction]);
    }
}
