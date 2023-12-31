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

    public function viewKalender(){
        return view('admin.kalender.view_kalender');
    }

    public function settingCuti(){
        return view('admin.view_pengaturan_cuti');
    }
}
