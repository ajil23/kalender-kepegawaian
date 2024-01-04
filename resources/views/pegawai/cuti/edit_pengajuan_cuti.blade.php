@extends('pegawai.pegawai_master')
@section('pegawai')

<div class="container-fluid">
     <!-- Page Heading -->
     <div class="row">
        <div class="col">
            <h1 class="h3 mb-3 text-gray-800">Edit Form Pengajuan Cuti</h1>
        </div>
    </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><center>Informasi Pegawai</center></h6>
         </div>
         <div class="card-body">
             <div class="row">
                <div class="col-xl col-md-6 mb-4">
                    <div class="col mr-2">
                        <div class="h6 font-weight-bold text-gray-800 mb-1">
                            <center>Identitas Pegawai</center>
                        </div>
                        <div class="text-small mb-0 text-gray-800">
                            Nama : Dianni Yusuf. S.Kom., M.Kom.
                            <br>
                            NIP/NIPPPK : 18401347509175
                            <br>
                            Golongan : IIC
                            <br>
                            Jabatan : Kepala Program Studi
                            <br>
                            Unit Kerja : Bisnis dan Informatika
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-6 mb-4">
                    <div class="col mr-2">
                        <div class="h6 font-weight-bold text-gray-800 mb-1">
                            <center>Identitas Atasan</center>
                        </div>
                        <div class="text-small mb-0 text-gray-800">
                            Nama : Dianni Yusuf. S.Kom., M.Kom.
                            <br>
                            NIP/NIPPPK : 18401347509175
                            <br>
                            Golongan : IIC
                            <br>
                            Jabatan : Kepala Program Studi
                            <br>
                            Unit Kerja : Bisnis dan Informatika
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><center>Cuti</center></h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('cuti.update', $editCuti->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Jenis Cuti</label>
                    <select class="form-control" aria-label="Default select example" name="jenis">
                        <option  value="{{$editCuti->jenis}}" selected >-- Pilih Jenis Cuti --</option>
                        <option value="tahunan">Cuti Tahunan</option>
                        <option value="penting">Cuti Penting</option>
                        <option value="besar">Cuti Besar</option>
                      </select>
                </div>              
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="awal" value="{{$editCuti->awal}}">
                        </div>
                        <div class="col">
                            <label for="akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="akhir" value="{{$editCuti->akhir}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Keterangan Cuti</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Keterangan Cuti" name="keterangan" value="{{$editCuti->keterangan}}">
                </div>  
                <button type="submit" class="btn btn-primary">Ajukan</button>
                <button type="button" onclick="history.back()" class="btn btn-danger">Batal</button>
            </form>
        </div>
    </div>
</div>
@endsection
