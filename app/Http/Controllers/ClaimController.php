<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{

    // Customer-only

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $file = $request->file('dokumen');
        $destinationPath = 'dokumen';
        $filename = Auth::user()->id . '_'  . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        $subscription = Subscription::find($request->subscription_id);

        Claim::create([
            'status' => "pending",
            'coverage' => 0,
            'claimantName' => $request->claimantName,
            'diagnosis' => $request->diagnosis,
            'hospitalizeDate' => $request->hospitalizeDate,
            'hospitalizeDuration' => $request->hospitalizeDuration,
            'medcareName' => $request->medcareName,
            'dokumen' => $filename,
            'claimType' => 'Rawat Inap',
            'subscription_id' => $request->subscription_id,
            'customer_id' => Auth::user()->id,
            'policy_id' => $subscription->policy_id
        ]);
        return redirect()->route('pages.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function show(Claim $claim)
    {
        return view('pages.claims.detail', ['claim' => $claim]);
    }

    public function create()
    {
        $user = Auth::user();
        $subscriptions = Subscription::where('customer_id', $user->id)->where('status', 'active')->get();

        if ($subscriptions->count() === 0) {
            return redirect()->route('pages.policies.list');
        }
        return view('pages.claims.create', ['subscriptions' => $subscriptions]);
    }


    // Admin-only


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claims = Claim::all();
        return view('dashboard.claims.index', ['claims' => $claims]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function edit(Claim $claim)
    {
        return view('dashboard.claims.edit', ['claim' => $claim]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claim  $claim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claim $claim)
    {
        // Claim::destroy($claim->id);
        return redirect()->route('dashboard.claims.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claim  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claim $claim)
    {
        $claim = Claim::find($claim->id);

        if ($claim) {
            $claim->status = $request->status;
            $claim->note = $request->note;
            $claim->coverage = $request->coverage;
            $claim->claimantName = $request->claimantName;
            $claim->diagnosis = $request->diagnosis;
            $claim->hospitalizeDate = $request->hospitalizeDate;
            $claim->hospitalizeduration = $request->hospitalizeduration;
            $claim->medcareName = $request->medcareName;
            $claim->save();
        }
        return redirect()->route('dashboard.claims.index');
    }
}
