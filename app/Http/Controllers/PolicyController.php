<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{

    // Customer-only

    public function list() {
        $policies = Policy::all();
        return view('pages.policies.index', ['policies' => $policies]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        return view('pages.policies.detail', ['policy' => $policy]);
    }

    // Admin-only

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = Policy::all();
        return view('dashboard.policies.index', ['policies' => $policies]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('img');
        $destinationPath = 'uploads';
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        Policy::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'tags' => $request->tags,
            'type' => 0,
            'img' => $filename,
            'premium' => $request->premium,
            'claimType' => $request->kategori
        ]);
        return redirect()->route('dashboard.policies.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.policies.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        return view('dashboard.policies.edit', ['policy' => $policy]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        Policy::destroy($policy->id);
        return redirect()->route('dashboard.policies.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $kantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        // $policy = Policy::find($id);

        // var_dump($request->except(['img']));


        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $path = Storage::put($policy->id, $file, 'public');
            $policy->img = $path;
        }


        $policy->update($request->except(['img']));

        // $file = $request->file('img');
        // if ($file) {
        //     $destinationPath = 'uploads';
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move($destinationPath, $filename);
        //     $policy->img = $filename;
        // }

        // if ($policy) {
        //     $policy->name = $request->name;
        //     $policy->desc = $request->desc;
        //     $policy->tags = $request->tags;
        //     $policy->premium = $request->premium;
        //     $policy->claimType = $request->kategori;
        //     $policy->save();
        // }
        return redirect()->route('dashboard.policies.index');
    }
}
