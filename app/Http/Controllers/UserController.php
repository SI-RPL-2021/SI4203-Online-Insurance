<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function profile(Request $req)
    {
        $user = Auth::user();

        // $policies = Policy::all();
        $subscriptions = Subscription::where('customer_id', $user->id)->get();
        $transactions = Transaction::where('customer_id', $user->id)->get();

        return view('profile', ['subscriptions' => $subscriptions, 'transactions' => $transactions]);
    }
}
