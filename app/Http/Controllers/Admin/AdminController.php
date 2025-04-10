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
            // Comprobar si la request es de tipo ajax
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('admin.dashboard'),
                ]);
            }

            return to_route('admin.dashboard');
        }
        return response()->json(['success' => false], 401);
        //return response()->json(['success' => false], 401);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return to_route('home');
    }
}
