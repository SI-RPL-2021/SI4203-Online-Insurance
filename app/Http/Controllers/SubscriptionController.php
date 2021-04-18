<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function home()
    {
        $subscriptions = Subscription::all();
        return view('subscriptions', ['subscriptions' => $subscriptions]);
    }

    public function checkout(Request $req, $id)
    {
        $policy = Policy::find($id);

        return view('checkout', ['policy' => $policy]);
    }
    public function detail(Request $req, $id)
    {
        $policy = Policy::find($id);
        return view('subscriptions-detail', ['policy' => $policy]);
    }
    public function create(Request $req)
    {
        $policy = Policy::find($req->policyId);
        Subscription::create([
            'startDate' => '',
            'endDate' => '',
            'customer' => Auth::user(),
            'status' => 'pending',
            'fullName' => $req->fullName,
            'birthdate' => $req->birthdate,
            'phone' => $req->phone,
            'address' => $req->address,
            'gender' => $req->gender,
            'policy' => $policy,
        ]);
        return redirect(route('profile'));
    }
    public function delete(Request $req, $id)
    {
        Subscription::destroy($id);
        return redirect(route('subscriptions.home'));
    }
    public function update(Request $req, $id)
    {
        $subscription = Subscription::find($id);

        if ($subscription) {
            $subscription->start_date = $req->start_date;
            $subscription->end_date = $req->end_date;
            $subscription->customer = $req->customer;
            $subscription->status = $req->status;
            $subscription->save();
        }
        return redirect(route('subscriptions.home'));
    }
}
