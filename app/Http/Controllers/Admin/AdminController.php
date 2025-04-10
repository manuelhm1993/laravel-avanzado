<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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

    public function logear(Request $request): RedirectResponse | JsonResponse
    {
        $credentials = $request->only('email', 'password');

        // Intenta hacer login con los datos recibidos y ya verifica el hash
        if (Auth::attempt($credentials)) {
            // Comprobar si la request espera un json, esto sustituye a ajax()
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('admin.dashboard'),
                ]);
            }

            return to_route('admin.dashboard');
        }

        // Comprobar si la request espera un json, esto sustituye a ajax()
        if ($request->expectsJson()) {
            return response()->json(['success' => false]);
        }
        
        return back()->with('error', 'Error al hacer login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return to_route('home');
    }
}
