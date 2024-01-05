<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\CutiAtasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kalender;

class AtasanController extends Controller
{
    
    public function atasanDashboard()
    {
        return view('atasan.index');
    }
    public function rekapitulasiCuti()
    {
        $datacuti = User::where('role', 2);
        return view('atasan.cuti_pegawai.view_rekapitulasi', compact('datacuti'));
    }
    public function cutiPribadi()
    {
     
        $user = Auth::user()->id;
        $datacuti = CutiAtasan::where('user_id', $user)->get();
        return view('atasan.cuti_pribadi.view_cuti_pribadi', compact('datacuti'));
    }
    public function addCutiPribadi()
    {
        return view('atasan.cuti_pribadi.add_cuti_pribadi');
    }
    public function store(Request $request){
        $cuti = new CutiAtasan();
        $cuti -> nama = Auth::user()->name;
        $cuti -> user_id = Auth()->id();
        $cuti -> awal = $request -> awal;
        $cuti -> akhir = $request -> akhir;
        $cuti -> jenis = $request -> jenis;
        $cuti -> keterangan= $request ->keterangan;
        $cuti -> save();
        return redirect()->route('cutipribadi_atasan.view');
    }

    public function edit($id){
        $editCuti = CutiAtasan::find($id);
        return view('atasan.cuti_pribadi.edit_', compact('editCuti')); 
    }

    public function delete($id){
        $deleteData = CutiAtasan::find($id);
        $deleteData->delete();
        return redirect()->route('cutipribadi_atasan.view');
    }

    public function update(Request $request,  string $id){
        $cuti = CutiAtasan::find($id);
        $cuti -> nama = Auth::user()->name;
        $cuti -> user_id = Auth()->id();
        $cuti -> awal = $request -> awal;
        $cuti -> akhir = $request -> akhir;
        $cuti -> jenis = $request -> jenis;
        $cuti -> keterangan= $request ->keterangan;
        $cuti -> update();
        return redirect()->route('cutipribadi_atasan.view');
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
        return view('atasan.view_kalender', compact('events'));
    }

    public function cutiPegawai() {
        $user = Auth::user()->id;
        $datacuti = Cuti::with('hubungan')->whereHas('hubungan', function ($query) use ($user) {
            $query->where('id_atasan', $user);
        })->get();
        return view('atasan.cuti_pegawai.view_cuti_pegawai', compact('datacuti')); 
    }
    
}
