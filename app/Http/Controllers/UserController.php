<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function profile(Request $req)
    {
        $policies = Policy::all();

        return view('profile', ['policies' => $policies]);
    }
}
