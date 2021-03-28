<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{

    public function home (){
        $Policies = Policy::all();
        return view('policies', ['policies' => $Policies]);
    }
    public function create (){
        Transaction::create([
            'name' => $req->name,
            'premium' => $req->premium,
            'desc' => $req->desc
        ]);
        return redirect(route('policies.home'));
    }
    public function delete (Request $req,$id){
        Policy::destroy($id);
        return redirect(route('policies.home'));
    }
    public function update (Request $req,$id){
        $Policy = Policy::find($id);

        if ($Policy) {
            $Policy->name = $req->name;
            $Policy->premium = $req->premium;
            $Policy->desc = $req->desc;
            $Policy->save();
        }
        return redirect(route('policies.home'));
    }
    public function detail (Request $req,$id){
        $Policy = Policy::find($id);
        return view('Policy', ['Policy' => $Policy]);
    }
}
