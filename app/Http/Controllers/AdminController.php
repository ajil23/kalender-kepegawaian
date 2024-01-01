<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;
use App\Models\Cuti;

class AdminController extends Controller
{
    public function pengajuanCuti()
    {
        $datacuti = Cuti::paginate(20);
        return view('admin.cuti_pegawai.view_cuti', ['datacuti' => $datacuti]);
    }
    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function detail(){
        return view('admin.cuti_pegawai.view_detail_cuti_pegawai');
    }

    public function rekapitulasiCuti()
    {
        $datacuti = Cuti::all();
        return view('admin.cuti_pegawai.view_rekapitulasi', ['datacuti' => $datacuti]);
    }

    public function viewKalender()
    {
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
        return view('admin.kalender.view_kalender', compact('events'));
    }
    public function storeKalender(Request $request)
    {
        $kalender = Kalender::create([
            'start' => $request->start_event,
            'title' => $request->title,
            'end' => $request->end_event,
        ]);
        return response()->json($kalender);
        
    }
    public function updatekalender(Request $request ,$id)
    {
        $kalender = Kalender::find($id);
        if(! $kalender) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $kalender->update([
            'start' => $request->start_event,
            'end' => $request->end_event,
        ]);
        return response()->json('Event updated');
    }
    public function kalenderDestroy($id)
    {
        $booking = Kalender ::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }

    public function settingCuti()
    {
        return view('admin.view_pengaturan_cuti');
    }
}
