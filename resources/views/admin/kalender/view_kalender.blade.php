@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
     <!-- Page Heading -->
     <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Pengaturan Kalender</h1>
        </div>
        <div class="text-end mb-2">
            <a href="#"><button type="button" class="btn btn-primary">Pengajuan Cuti</button></a>
        </div>
    </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Tabel Pelaksanaan</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Kegiatan</th>
                             <th>Progres</th>
                             <th>Realisasi</th>
                             <th>Dokumen Laporan</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>fd</td>
                            <td>sdf</td>
                            <td>Rp. 43</td>
                            <td>file</td>
                            <td colspan="2">
                               <a href="" class="btn btn-warning">Edit</a>
                               <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
</div>
@endsection
