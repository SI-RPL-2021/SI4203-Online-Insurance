<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function hitung($a, $b)
    {
        return $a * $b;
    }
}
