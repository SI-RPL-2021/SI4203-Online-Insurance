<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;


class ClaimController extends Controller
{
    public function home (){
        $claims = Claim::all();
        return view('claims', ['claims' => $claims]);
    }
    public function create (){
        Claim::create([
            'status' => $req->status,
            'note' => $req->note,
            'amount' => $req->amount
        ]);
        return redirect(route('claims.home'));
    }
    public function delete (Request $req, $id){
        Claim::destroy($id);
        return redirect(route('claims.home'));
    }
    public function update (Request $req, $id){
        $claim = Claim::find($id);

        if ($claim) {
            $claim->status = $req->status;
            $claim->note = $req->note;
            $claim->amount = $req->amount;
            $claim->save();
        }
        return redirect(route('claims.home'));
    }
    public function detail (Request $req, $id){
        $claim = Claim::find(id);
        return view('claim', ['claim' => $claim]);
    }
}
