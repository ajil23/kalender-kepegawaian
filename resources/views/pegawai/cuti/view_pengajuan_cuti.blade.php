@extends('pegawai.pegawai_master')
@section('pegawai')

<div class="container-fluid">
     <!-- Page Heading -->
     <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Daftar Pengajuan Cuti</h1>
        </div>
        <a href="{{route('cuti.add')}}">
            <div class="btn btn-primary mb-4 mr-3">Tambah Pengajuan</div>
        </a>
    </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Tabel Pengajuan Cuti</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th><center>Nama</center></th>
                             <th><center>Tanggal Awal</center></th>
                             <th><center>Tanggal Akhir</center></th>
                             <th><center>Jenis Cuti</center></th>
                             <th><center>Keterangan</center></th>
                             <th><center>Status</center></th>
                             <th><center>Aksi</center></th>
                         </tr>
                     </thead>
                     <tbody>
                        <tr>
                            <td>1</td>
                            <td><center>as</center></td>
                            <td><center>gadfg</center></td>
                            <td><center>grarg</center></td>
                            <td><center>gad</center></td>
                            <td><center>gae</center></td>
                            <td><center>ad</center></td>
                            <td>
                                <center>
                                    <a href="#" class="btn btn-link">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <i class="fas fa-solid fa-eye"></i>
                                            Edit
                                        </button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                     </tbody>
                 </table>
                 <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
             </div>
         </div>
     </div>
</div>
@endsection
