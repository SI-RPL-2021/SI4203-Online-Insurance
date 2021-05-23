<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Transaction;
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

        return redirect(route('user.profile'));
    }
    public function delete(Request $req, $id)
    {
        Subscription::destroy($id);
        return redirect(route('dashboard.subscriptions'));
    }
    public function update(Request $req, $id)
    {
        $subscription = Subscription::find($id);

        if ($subscription) {
            if ($req->status == 'active') {
                $transaction = Transaction::find($subscription->subscription_id);

                if (!$transaction) {
                    $startDate = date("Y-m-d");
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
            // $subscription->startDate = $req->date;
            // $subscription->endDate = $req->enddate;
            // $subscription->fullName = $req->fullName;
            // $subscription->birthdate = $req->birthdate;
            // $subscription->phone = $req->phone;
            // $subscription->address = $req->address;
            // $subscription->gender = $req->gender;
            // $subscription->maxCoverage = $req->maxCoverage;
            // $subscription->premium = $req->premium;
            // $subscription->policy_id = $policy->id;
            // $subscription->policy_name = $policy->name;
            // $subscription->customer_id = $userId;
            $subscription->save();
        }

        return redirect(route('dashboard.subscriptions'));
    }
}
