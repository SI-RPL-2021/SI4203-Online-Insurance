<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{

    // Customer-only

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $kantor = Kantor::all();
        return view('pages.kantor.index', ['kantor' => $kantor]);
    }


    // Admin-only
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kantor = Kantor::all();
        return view('dashboard.kantor.index', ['kantor' => $kantor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kantor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kantor::create($request->all());

        return redirect()->route('dashboard.kantor.index')->with('message', 'Berhasil menambahkan Kantor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function show(Kantor $kantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function edit(Kantor $kantor)
    {
        return view('dashboard.kantor.edit', ['kantor' => $kantor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kantor $kantor)
    {
        $kantor->update($request->all());
        return redirect()->route('dashboard.kantor.index')->with('message', 'Berhasil mengupdate Kantor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kantor  $kantor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kantor $kantor)
    {
        Kantor::destroy($kantor->id); 
        return redirect()->route('dashboard.kantor.index')->with('message', 'Berhasil menambahkan Kantor');
    }
}
