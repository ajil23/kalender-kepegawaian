<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $datacuti = Cuti::where('user_id', $user)->get();
        return view('atasan.cuti_pribadi.view_cuti_pribadi', compact('datacuti'));
    }
    public function addCutiPribadi()
    {
        return view('atasan.cuti_pribadi.add_cuti_pribadi');
    }
    public function store(Request $request){
        $cuti = new Cuti();
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
        $editCuti = Cuti::find($id);
        return view('atasan.cuti_pribadi.edit_', compact('editCuti')); 
    }

    public function delete($id){
        $deleteData = Cuti::find($id);
        $deleteData->delete();
        return redirect()->route('cutipribadi_atasan.view');
    }

    public function update(Request $request,  string $id){
        $cuti = Cuti::find($id);
        $cuti -> nama = Auth::user()->name;
        $cuti -> user_id = Auth()->id();
        $cuti -> awal = $request -> awal;
        $cuti -> akhir = $request -> akhir;
        $cuti -> jenis = $request -> jenis;
        $cuti -> keterangan= $request ->keterangan;
        $cuti -> update();
        return redirect()->route('cutipribadi_atasan.view');
    }
}
