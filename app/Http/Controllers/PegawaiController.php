<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalender;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
    }

    public function viewPengajuan(){
        return view('pegawai.cuti.view_pengajuan_cuti');
    }

    public function addPengajuan(){
        return view('pegawai.cuti.add_pengajuan_cuti');
    }

    public function viewkalender(){
        $data = Kalender::all();
        $events = array();
        foreach ($data as $item) {
            $events[] = [
                'id' => $item->id,
                'title' => $item->title,
                'start' => $item->start,
                'end' => $item->end,
            ];
        }
        return view('pegawai.view_kalender', compact('events'));
    }
}
