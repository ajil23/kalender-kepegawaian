@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Rekapitulasi Pengajuan Cuti</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Rekapitulasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>NIK/NIP</center>
                                </th>
                                <th>
                                    <center>Tahunan</center>
                                </th>
                                <th>
                                    <center>Penting</center>
                                </th>
                                <th>
                                    <center>Melahirkan</center>
                                </th>
                                <th>
                                    <center>Besar</center>
                                </th>
                                <th>
                                    <center>Total</center>
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datacuti as $item => $cuti)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cuti->name }}</td>
                                    <td>{{ $cuti->nip }}</td>
                                    <td><center>{{ $cuti->tahunan }}</center></td>
                                    <td> <center>{{ $cuti->penting }} </center></td>
                                    <td> <center>{{ $cuti->melahirkan }}</center></td>
                                    <td> <center>{{ $cuti->besar }}</center></td>
                                   @php
                                       $total = $cuti->tahunan +  $cuti->penting + $cuti->melahirkan + $cuti->besar;
                                   @endphp
                                    <td>
                                        <center>{{$total}}</center>
                                    </td>
                                </tr>
                            @endforeach
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
