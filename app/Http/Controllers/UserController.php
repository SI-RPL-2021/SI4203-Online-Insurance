<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function profile()
    {
        $user = Auth::user();

        $subscriptions = Subscription::where('customer_id', $user->id)->get();
        $transactions = Transaction::where('customer_id', $user->id)->get();
        $claims = Claim::where('customer_id', $user->id)->get();
        $total = DB::table('transactions')->where('customer_id', $user->id)->where('status', 'paid')->sum('amount');

        return view('pages.profile', ['subscriptions' => $subscriptions, 'transactions' => $transactions, 'total' => $total, 'claims' => $claims]);
    }
}