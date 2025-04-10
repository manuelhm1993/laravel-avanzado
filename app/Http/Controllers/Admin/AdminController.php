<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }

    public function login(): View
    {
        return view('admin.login.in');
    }

    public function logear(Request $request): RedirectResponse
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // Intenta hacer login con los datos recibidos y ya verifica el hash
        if(Auth::attempt($data))
        {
            return to_route('admin.dashboard');
        }
        else
        {
            return back()->with('error', 'Datos incorrectos');
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return to_route('home');
    }
}
