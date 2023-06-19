<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     *
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/users');
        }

        return view('auth.login')
            ->with('message', 'Usuário ou senha incorreto.');
    }

    /**
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
