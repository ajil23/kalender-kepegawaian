<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pengajuanCuti()
    {
        return view('admin.cuti_pegawai.view_cuti');
    }
    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function rekapitulasiCuti()
    {
        return view('admin.cuti_pegawai.view_rekapitulasi');
    }

    public function viewKalender()
    {
        $data = Kalender::all();
        $events = array();
        foreach ($data as $item) {
            $events[] = [
                'title' => $item->title,
                'start' => $item->start,
                'end' => $item->end,
            ];
        }
        return view('admin.kalender.view_kalender', compact('events'));
    }
    public function storeKalender()  {
        
    }

    public function settingCuti()
    {
        return view('admin.view_pengaturan_cuti');
    }
}
