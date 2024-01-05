<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalender;
use App\Models\Cuti;
use App\Models\Hubungan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
    }

    public function viewPengajuan()
    {
        $user = Auth::user()->id;
        $data = Cuti::where('user_id', $user)->get();
        return view('pegawai.cuti.view_pengajuan_cuti', ['data' => $data]);
    }

    public function addPengajuan()
    {
        $user = Auth::user()->id;
        $data = Hubungan::where('id_user', $user)->get();
        if ($data->isNotEmpty()) {
            $dataatasans = Hubungan::with('dataatasan')->where('id_user', $user)->first();
            $datapegwains = Hubungan::with('datapegawai')->where('id_user', $user)->first();
            return view('pegawai.cuti.add_pengajuan_cuti',compact('dataatasans','datapegwains'));
        }
        else {
            $atasan = User::where('role',2)->get();
            return view('pegawai.cuti.add_hubungan',compact('atasan'));
        }
    }

    public function storeHubungan(Request $request)
    {
        $hubungan = new Hubungan();
        $hubungan->id_user = Auth()->id();
        $hubungan->id_atasan = $request->id_atasan;
        $hubungan->save();
        return redirect()->route('cuti.add');
    }
    public function store(Request $request)
    {
        $cuti = new Cuti();
        $cuti->nama = Auth::user()->name;
        $cuti->user_id = Auth()->id();
        $cuti->awal = $request->awal;
        $cuti->akhir = $request->akhir;
        $cuti->jenis = $request->jenis;
        $cuti->keterangan = $request->keterangan;
        $cuti->hubungan_id = $request->id_hubungan;
        $cuti->save();
        return redirect()->route('cuti.view');
    }

    public function edit($id)
    {
        $user = Auth::user()->id;
        $dataatasans = Hubungan::with('dataatasan')->where('id_user', $user)->first();
        $datapegwains = Hubungan::with('datapegawai')->where('id_user', $user)->first();
        $editCuti = Cuti::find($id);
        return view('pegawai.cuti.edit_pengajuan_cuti', compact('editCuti','dataatasans','datapegwains'));
    }

    public function delete($id)
    {
        $deleteData = Cuti::find($id);
        $deleteData->delete();
        return redirect()->route('cuti.view');
    }

    public function update(Request $request,  string $id)
    {
        $cuti = Cuti::find($id);
        $cuti->nama = Auth()->id();
        $cuti->user_id = Auth()->id();
        $cuti->awal = $request->awal;
        $cuti->akhir = $request->akhir;
        $cuti->jenis = $request->jenis;
        $cuti->keterangan = $request->keterangan;
        $cuti->update();
        return redirect()->route('cuti.view');
    }

    public function viewkalender()
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
        return view('pegawai.view_kalender', compact('events'));
    }
}
