<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{

    public function home()
    {
        $Policies = Policy::all();
        return view('policies', ['policies' => $Policies]);
    }
    public function create(Request $req)
    {
        $file = $req->file('img');
        $destinationPath = 'uploads';
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        Policy::create([
            'name' => $req->name,
            'desc' => $req->desc,
            'tags' => $req->tags,
            'type' => 0,
            'img' => $filename,
            'premium' => $req->premium,
            'claimType' => $req->kategori
        ]);
        return redirect(route('dashboard.policies'));
    }
    public function delete(Request $req, $id)
    {
        Policy::destroy($id);
        return redirect(route('dashboard.policies'));
    }
    public function update(Request $req, $id)
    {
        $policy = Policy::find($id);

        $file = $req->file('img');
        $filename = $policy->filename;
        if ($file) {
            $destinationPath = 'uploads';
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
        }

        if ($policy) {
            $policy->name = $req->name;
            $policy->desc = $req->desc;
            $policy->tags = $req->tags;
            $policy->img = $filename;
            $policy->premium = $req->premium;
            $policy->claimType = $req->kategori;
            $policy->save();
        }
        return redirect(route('dashboard.policies'));
    }
    public function detail(Request $req, $id)
    {
        $policy = Policy::find($id);
        return view('policies-detail', ['policy' => $policy]);
    }
}
