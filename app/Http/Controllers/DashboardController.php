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
    public function home ()
    {
        return view('dashboard/home');
    }
    public function claims (){
        $claims = Claim::all();
        return view('dashboard/claims', ['claims' => $claims]);
    }
    public function subscriptions (){
        $subscriptions = Subscription::all();
        return view('dashboard/subscriptions', ['subscriptions' => $subscriptions]);
    }
    public function policies (){
        $policies = Policy::all();
        return view('dashboard/policies', ['policies' => $policies]);
    }
    public function transactions (){
        $transactions = Transaction::all();
        return view('dashboard/transactions', ['transactions' => $transactions]);
    }
}
