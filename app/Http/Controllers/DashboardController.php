<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return view('dashboard', ['message' => 'Selamat datang, Admin!']);
        } elseif ($role === 'operator') {
            return view('dashboard', ['message' => 'Selamat datang, Operator!']);
        }

        abort(403);
    }
}
