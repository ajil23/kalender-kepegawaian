<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function pegawaiDashboard()
    {
        return view('pegawai.index');
    }
}
