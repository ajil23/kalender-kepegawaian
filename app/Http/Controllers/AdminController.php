<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pengajuanCuti(){
        return view('admin.cuti_pegawai.view_cuti');
    }

    public function rekapitulasiCuti(){
        return view('admin.cuti_pegawai.view_rekapitulasi');
    }
}
