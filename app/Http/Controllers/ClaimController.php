<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $subscriptions = Subscription::where('customer_id', $user->id)->where('status', 'active')->get();

        if ($subscriptions->count() == 0) {
            return redirect(route('policy.home'));
        }
        return view('claims', ['subscriptions' => $subscriptions]);
    }
    public function create(Request $req)
    {
        Claim::create([
            'status' => "pending",
            'note' => $req->note,
            'coverage' => 0,
            'claimantName' => $req->claimantName,
            'diagnosis' => $req->diagnosis,
            'hospitalizeDate' => $req->hospitalizeDate,
            'hospitalizeduration' => $req->hospitalizeduration,
            'medcareName' => $req->medcareName
            // 'claimType' => $req->claimType
        ]);
        return redirect(route('user.profile'));
    }
    public function delete(Request $req, $id)
    {
        Claim::destroy($id);
        return redirect(route('claims.home'));
    }
    public function update(Request $req, $id)
    {
        $claim = Claim::find($id);

        if ($claim) {
            $claim->status = $req->status;
            $claim->note = $req->note;
            $claim->coverage = $req->coverage;
            $claim->claimantName = $req->claimantName;
            $claim->diagnosis = $req->diagnosis;
            $claim->hospitalizeDate = $req->hospitalizeDate;
            $claim->hospitalizeduration = $req->hospitalizeduration;
            $claim->medcareName = $req->medcareName;
            $claim->save();
        }
        return redirect(route('claims.home'));
    }
    public function detail(Request $req, $id)
    {
        $claim = Claim::find($id);
        return view('claim', ['claim' => $claim]);
    }
}
