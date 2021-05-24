<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function profile(Request $req)
    {
        $user = Auth::user();

        // $policies = Policy::all();
        $subscriptions = Subscription::where('customer_id', $user->id)->get();
        $transactions = Transaction::where('customer_id', $user->id)->get();
        $total = DB::table('transactions')->where('customer_id', $user->id)->where('status', 'paid')->sum('amount');

        return view('profile', ['subscriptions' => $subscriptions, 'transactions' => $transactions, 'total' => $total]);
    }
}