<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;


class HomeController extends Controller
{
    public function home()
    {
        $policies = Policy::all();

        return view('home', ['policies' => $policies]);
    }
}
