<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $role = Auth::user()->role;
    
            if($role == '2'){
                return view('atasan.index');
            }
            elseif($role == '1'){
                return view('admin.index');
            }
            else{
                return view('pegawai.index');
            }
    }
}
