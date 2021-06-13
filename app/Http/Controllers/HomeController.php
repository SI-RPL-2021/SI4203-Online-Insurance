<?php

namespace App\Http\Controllers;

use App\Models\Policy;


class HomeController extends Controller
{
    public function index()
    {
        $policies = Policy::all();

        return view('pages.index', ['policies' => $policies]);
    }
}
