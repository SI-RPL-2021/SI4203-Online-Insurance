<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\view;

class DashboardController extends Controller
{
    public function home (){
        return view('dashboard/home');
    }
    public function claims (){
        $claims = Claim::all();
        return view('claims', ['claims' => $claims]);
    }
    public function subcriptions (){
        $subcriptions = Subcription::all();
        return view('subcriptions', ['subcriptions' => $subcriptions]);
    }
    public function policies (){
        $policies = Policy::all();
        return view('policies', ['policies' => $policies]);
    }
}
