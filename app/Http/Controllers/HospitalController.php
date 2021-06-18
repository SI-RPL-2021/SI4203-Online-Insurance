<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{

    // Customer-only

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return view('pages.hospitals.detail', ['hospital' => $hospital]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $hospitals = Hospital::all();
        return view('pages.hospitals.index', ['hospitals' => $hospitals]);
    }


    // Admin-only
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return view('dashboard.hospitals.index', ['hospitals' => $hospitals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hospitals.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hospital::create($request->all());

        return redirect()->route('dashboard.hospitals.index')->with('message', 'Berhasil menambahkan Rumah Sakit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        $hospital->update($request->all());
        return redirect()->route('dashboard.hospitals.index')->with('message', 'Berhasil mengupdate Rumah Sakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        Hospital::destroy($hospital->id); 
        return redirect()->route('dashboard.hospitals.index')->with('message', 'Berhasil menambahkan Rumah Sakit');
        // return redirect()->route('hospitals.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        return view('dashboard.hospitals.edit', ['hospital' => $hospital]);
    }

}
