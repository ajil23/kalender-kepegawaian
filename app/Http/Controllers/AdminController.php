<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\CutiAtasan;
use App\Models\User;
use Carbon\Carbon;
use PhpParser\Node\Expr\Cast\String_;

class AdminController extends Controller
{
    public function pengajuanCuti()
    {
        $datacuti = Cuti::paginate(20);
        return view('admin.cuti_pegawai.view_cuti', ['datacuti' => $datacuti]);
    }
    public function pengajuanCutiAtasan()
    {
        $datacuti = CutiAtasan::all();
        return view('admin.cuti_atasan.view_cuti_atasan', ['datacuti' => $datacuti]);
    }
    public function validAtasan(string $id)
    {
        $datacuti = CutiAtasan::find($id);
        $datacuti->status = "disetujui";

        $tanggalAwal = Carbon::parse($datacuti->awal);
        $tanggalAkhir = Carbon::parse($datacuti->akhir);
        $selisihHari = $tanggalAkhir->diffInDays($tanggalAwal);
      
        $user = User::find( $datacuti->user_id);
        if ($datacuti->jenis == 'tahunan') {
            $user->tahunan += $selisihHari;
        }elseif ($datacuti->jenis == 'penting') {
            $user->penting += $selisihHari;
        }elseif ($datacuti->jenis == 'melahirkan') {
            $user->melahirkan += $selisihHari;
        }elseif ($datacuti->jenis == 'besar') {
            $user->besar += $selisihHari;
        }
        $user->save();
        $datacuti->update();
        return redirect()->route('pengajuan_atasan.view');
    }
    public function adminDashboard()
    {
        return view('admin.index');
    }


    public function detailAtasan($id)
    {
        $data = CutiAtasan::find($id);
        return view('admin.cuti_atasan.view_detail_cuti_atasan', compact('data'));
    }

    public function rekapitulasiCuti()
    {
        $datacuti = User::whereIn('role', [0, 2])->get();
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
    public function updatekalender(Request $request, $id)
    {
        $kalender = Kalender::find($id);
        if (!$kalender) {
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
        $booking = Kalender::find($id);
        if (!$booking) {
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

    public function viewTidakValid($id)
    {
        $data = CutiAtasan::find($id);
        return view('admin.cuti_atasan.view_form_tidak_valid_atasan', compact('data'));
    }
    public function storeTidakValid(Request $request, $id)
    {
        $data = CutiAtasan::find($id);
        $data->alasanvalid = $request->alasanvalid;
        $data->status = 'ditolak';
        $data->update();
        return redirect()->route('pengajuan_atasan.view');
    }

    public function detailCutiPegawai($id)
    {
        $data = Cuti::with('user', 'hubungan')->find($id);
        return view('admin.cuti_pegawai.view_detail_cuti_pegawai', compact('data'));
    }
    public function viewTidakValidPegawai($id)
    {
        $data = Cuti::find($id);
        return view('admin.cuti_pegawai.view_form_tidak_valid', compact('data'));
    }
    public function validPegawai(string $id)
    {
        $datacuti = Cuti::find($id);
        $datacuti->status = "disetujui";

        $tanggalAwal = Carbon::parse($datacuti->awal);
        $tanggalAkhir = Carbon::parse($datacuti->akhir);
        $selisihHari = $tanggalAkhir->diffInDays($tanggalAwal);
      
        $user = User::find( $datacuti->user_id);
        if ($datacuti->jenis == 'tahunan') {
            $user->tahunan += $selisihHari;
        }elseif ($datacuti->jenis == 'penting') {
            $user->penting += $selisihHari;
        }elseif ($datacuti->jenis == 'melahirkan') {
            $user->melahirkan += $selisihHari;
        }elseif ($datacuti->jenis == 'besar') {
            $user->besar += $selisihHari;
        }
        $user->save();
        $datacuti->update();
        return redirect()->route('pengajuan.view');
    }
    public function storeTidakValidPegawai(Request $request, $id)
    {
        $data = Cuti::find($id);
        $data->alasanvalid = $request->alasanvalid;
        $data->status = 'ditolak';
        $data->update();
        return redirect()->route('pengajuan.view');
    }
}
