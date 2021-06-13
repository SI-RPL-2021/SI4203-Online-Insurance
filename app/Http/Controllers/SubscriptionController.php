<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    // Customer-only

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subcription)
    {
        return view('pages.subscriptions.detail', ['subscription' => $subcription]);
    }


    // Admin-only

    public function index()
    {
        $subscriptionsPending = Subscription::where('status', 'pending')->get();
        $subscriptionsActive = Subscription::where('status', 'active')->get();
        $subscriptionsRejected = Subscription::where('status', 'rejected')->get();
        return view('dashboard.subscriptions.index', ['subscriptionsRejected' => $subscriptionsRejected, 'subscriptionsPending' => $subscriptionsPending, 'subscriptionsActive' => $subscriptionsActive]);
    }

    public function create(Request $req)
    {
        $policy = Policy::find($req->policyId);
        $userId = Auth::user()->id;

        Subscription::create([
            'startDate' => null,
            'endDate' => null,
            'status' => 'pending',
            'fullName' => $req->fullName,
            'birthdate' => $req->birthdate,
            'phone' => $req->phone,
            'address' => $req->address,
            'gender' => $req->gender,
            'maxCoverage' => 0,
            'premium' => 0,
            'claimType' => $policy->claimType,
            'policy_id' => $policy->id,
            'policy_name' => $policy->name,
            'customer_id' => $userId
        ]);

        return redirect()->route('pages.profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subcription
     * @return \Illuminate\Http\Response
     */
    public function delete(Subscription $subcription, $id)
    {
        Subscription::destroy($id);
        return redirect()->route('dashboard.subscriptions.index');
    }

    public function update(Request $req, $id)
    {
        $subscription = Subscription::find($id);

        if ($subscription) {
            if ($req->status == 'active') {
                $transaction = Transaction::find($subscription->subscription_id);

                if (!$transaction) {
                    $startDate = date("Y-m-d");
                    $subscription->startDate = date("Y-m-d", strtotime($startDate . ' + 5 days'));
                    Transaction::create([
                        'status' => "pending",
                        'amount' => $req->premium,
                        'customerName' => $subscription->fullName,
                        'startDate' => $startDate,
                        'endDate' => date("Y-m-d", strtotime($startDate . ' + 30 days')),
                        // 'paymentDate' => "",
                        // 'paymentMethod' => "",
                        'customer_id' => $subscription->customer_id,
                        'subscription_id' => $subscription->id,
                        'policy_id' => $subscription->policy_id
                    ]);
                }
                $subscription->status = $req->status;
                $subscription->premium = $req->premium;
                $subscription->maxCoverage = $req->maxCoverage;
            } else if ($req->status == 'rejected') {
                $subscription->status = $req->status;
            } else {
                $subscription->status = $req->status;
                $subscription->premium = $req->premium;
                $subscription->maxCoverage = $req->maxCoverage;
            }
            $subscription->save();
        }

        return redirect()->route('dashboard.subscriptions.index');
    }
}
