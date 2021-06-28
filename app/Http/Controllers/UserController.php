<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
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

        return view('pages.profile', ['subscriptions' => $subscriptions, 'transactions' => $transactions, 'total' => $total, 'claims' => $claims, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function edit(User $user)
    {
        return view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->route('dashboard.agents.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'role', 'phone', 'status']));
        return redirect()->route('dashboard.agents.index');
    }
}
