<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $credentials = $req->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('pages.index');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function register(Request $req)
    {
        $credentials = $req->only(['name', 'email']);
        $credentials['password'] = Hash::make($req->password);
        $usr = User::find(1);

        if ($usr) {
            $credentials['role'] = 'customer';
            $credentials['verified'] = true;
        } else {
            $credentials['role'] = 'admin';
            $credentials['verified'] = true;
        }


        if (User::where('email', $credentials['email'])->exists()) {

            return back()->withErrors([
                'email' => 'Email already taken, please login...'
            ]);
        }

        User::create($credentials);

        return redirect()->route('pages.login');
    }

    function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('pages.index');
    }
}
