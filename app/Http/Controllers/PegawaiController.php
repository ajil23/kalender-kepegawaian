<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalender;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index');
    }

    public function viewPengajuan(){
        $user = Auth::user()->id;
        $data = Cuti::where('user_id', $user)->get();
        return view('pegawai.cuti.view_pengajuan_cuti', ['data' => $data]);
    }

    public function addPengajuan(){
        return view('pegawai.cuti.add_pengajuan_cuti');
    }

    public function store(Request $request){
        $cuti = new Cuti();
        $cuti -> nama = Auth()->id();
        $cuti -> user_id = Auth()->id();
        $cuti -> awal = $request -> awal;
        $cuti -> akhir = $request -> akhir;
        $cuti -> jenis = $request -> jenis;
        $cuti -> keterangan= $request ->keterangan;
        $cuti -> save();
        return redirect()->route('cuti.view');
    }

    public function edit($id){
        $editCuti = Cuti::find($id);
        return view('pegawai.cuti.edit_pengajuan_cuti', compact('editCuti')); 
    }

    public function delete($id){
        $deleteData = Cuti::find($id);
        $deleteData->delete();
        return redirect()->route('cuti.view');
    }

    public function update(Request $request,  string $id){
        $cuti = Cuti::find($id);
        $cuti -> nama = Auth()->id();
        $cuti -> user_id = Auth()->id();
        $cuti -> awal = $request -> awal;
        $cuti -> akhir = $request -> akhir;
        $cuti -> jenis = $request -> jenis;
        $cuti -> keterangan= $request ->keterangan;
        $cuti -> update();
        return redirect()->route('cuti.view');
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
