<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function home ()
    {
        $subscriptions = Subscription::all();
        return view('subscriptions', ['subscriptions' => $subscriptions]);
    }
    public function detail (Request $req, $id)
    {
        $subscription = Subscription::find($id);
        return view('subscription', ['subscription' => $subscription]);
    }
    public function create ()
    {
        Subscription::create([
            'start_date' => $req->start_date,
            'end_date' => $req->end_date,
            'customer' => $req->customer,
            'status' => $req->customer
        ]);
        return redirect(route('subscriptions.home'));
    }
    public function delete (Request $req, $id)
    {
        Subscription::destroy($id);
        return redirect(route('subscriptions.home'));
    }
    public function update (Request $req, $id)
    {
        $subscription = Subscription::find($id);

        if ($transaction) {
            $subscription->start_date = $req->start_date;
            $subscription->end_date = $req->end_date;
            $subscription->customer = $req->customer;
            $subscription->status = $req->status;
            $subscription->save();
        }
        return redirect(route('subscriptions.home'));
    }
}
