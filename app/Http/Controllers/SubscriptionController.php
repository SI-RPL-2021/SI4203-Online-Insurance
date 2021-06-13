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
    public function show(Subscription $subcription, $id)
    {
        $policy = Policy::find($id);
        return view('pages.subscriptions.detail', ['subscription' => $subcription, 'policy' => $policy]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $policy = Policy::find($req->policyId);
        $userId = Auth::user()->id;

        $data = $req->all();

        $data['startDate'] = null;
        $data['endDate'] = null;
        $data['status'] = 'pending';

        $data['maxCoverage'] = 0;
        $data['premium'] = 0;
        $data['claimType'] = $policy->claimType;
        $data['policy_id'] = $policy->id;
        $data['policy_name'] = $policy->name;
        $data['customer_id'] = $userId;

        Subscription::create($data);

        return redirect()->route('pages.profile');
    }

    // Admin-only

    public function index()
    {
        $subscriptionsPending = Subscription::where('status', 'pending')->get();
        $subscriptionsActive = Subscription::where('status', 'active')->get();
        $subscriptionsRejected = Subscription::where('status', 'rejected')->get();
        return view('dashboard.subscriptions.index', ['subscriptionsRejected' => $subscriptionsRejected, 'subscriptionsPending' => $subscriptionsPending, 'subscriptionsActive' => $subscriptionsActive]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subcription
     * @return \Illuminate\Http\Response
     */
    public function delete(Subscription $subcription)
    {
        Subscription::destroy($subcription->id);
        return redirect()->route('dashboard.subscriptions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        return view('dashboard.subscriptions.edit', ['subscription' => $subscription]);
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
