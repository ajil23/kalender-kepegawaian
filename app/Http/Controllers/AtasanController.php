<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class AtasanController extends Controller
{
    
    public function atasanDashboard()
    {
        return view('atasan.index');
    }
    public function rekapitulasiCuti()
    {
        $datacuti = Cuti::all();
        return view('atasan.cuti_pegawai.view_rekapitulasi', compact('datacuti'));
    }
    public function cutiPribadi()
    {
        $datacuti = Cuti::all();
        return view('atasan.cuti_pribadi.view_cuti_pribadi', compact('datacuti'));
    }
    public function addCutiPribadi()
    {
       
        return view('atasan.cuti_pribadi.add_cuti_pribadi');
    }
    public function storeCutiPribadi(Request $request)
    {
       $cutipribadi = new Cuti();
       
    }
}
