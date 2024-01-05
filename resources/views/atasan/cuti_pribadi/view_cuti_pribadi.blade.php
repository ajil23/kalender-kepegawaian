@extends('atasan.atasan_master')
@section('atasan')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800"> Pengajuan Cuti Pribadi</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 ">
            <div class="card-header py-3 row">
                <h6 class="m-0 font-weight-bold text-primary col">Tabel Cuti Pribadi</h6>
                <a href="{{ route('add_cutipribadi_atasan.add') }}" class="btn btn-success co">Add Cuti Pribadi</a>
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
                                    <center>Tanggal Awal</center>
                                </th>
                                <th>
                                    <center>Tanggal Akhir</center>
                                </th>
                                <th>
                                    <center>Jenis Cuti</center>
                                </th>
                                <th>
                                    <center>Keterangan</center>
                                </th>
                                <th>
                                    <center>Status</center>
                                </th>
                                <th>
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datacuti as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <center>{{ $item->user->name }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $item->awal }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $item->akhir }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $item->jenis }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $item->keterangan }}</center>
                                    </td>
                                    <td>
                                        <center>
                                            @if ($item->status == 'Diajukan')
                                                <button class="btn btn-info">Diajukan</button>
                                            @elseIf($item->status == 'ditolak')
                                                <button class="btn btn-danger">ditolak</button>
                                            @elseIf($item->status == 'valid')
                                                <button class="btn btn-warning">valid</button>
                                            @else
                                                <button class="btn btn-danger">tidak valid</button>
                                            @endif
                                        </center>
                                    </td>
                                    {{-- <td><center>{{$item->status}}</center></td> --}}
                                    <td colspan="2">
                                        <center>
                                            <a href="{{ route('atasancuti.edit', $item->id) }}" class="btn btn-link">
                                                <button type="button" class="btn btn-info btn-sm">
                                                    <i class="fas fa-solid fa-pen"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('atasancuti.delete', $item->id) }}" class="btn btn-link">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-solid fa-trash"></i>
                                                </button>
                                            </a>
                                        </center>
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
