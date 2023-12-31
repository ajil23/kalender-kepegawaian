<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function redirectUser()
    {
        if (auth()->user()->hasRole('atasan')) {
            return redirect()->route('admin.dashboard');
        }
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->hasRole('pegawai')) {
            return redirect()->route('user.home');
        }
    }
}
